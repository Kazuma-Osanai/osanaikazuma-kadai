<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Shop\Models\Mail_Class\Rokumaru_Mail;

class ShopController extends Controller
{
    function clear_cart() {
        require_once('..\app\shop\models\common.php');
        session_start();
        clearSession();
        return view('shop/clear_cart');
    }


    function kazu_change() {
        session_start();
		session_regenerate_id(true);

        require_once('..\app\shop\models\common.php');

		$post=sanitize($_POST);
		$flag_mozi = true;
		$flag_kazu = true;
		$max = $post['max'];

		for($i = 0; $i < $max; $i++) {
			if(preg_match("/\A[0-9]+\z/",$post['kazu'.$i]) == 0) {
				$flag_mozi = false;
				return view('shop/kazu_change',array(
                    'flag_mozi' => $flag_mozi,
                    'flag_kazu' => $flag_kazu
                ));
			}

			if($post['kazu'.$i]<1 || 10<$post['kazu'.$i]) {
				$flag_kazu = false;
				return view('shop/kazu_change',array(
                    'flag_mozi' => $flag_mozi,
                    'flag_kazu' => $flag_kazu
                ));
			}
			$kazu[] = $post['kazu'.$i];
		}

		$cart = $_SESSION['cart'];

		for($i = $max;0 <= $i;$i--) {
			if(isset($_POST['sakujo'.$i]) == true) {
				array_splice($cart,$i,1);
				array_splice($kazu,$i,1);
			}
		}

		$_SESSION['cart'] = $cart;
		$_SESSION['kazu'] = $kazu;

        return redirect('shop_cartlook');
    }


    function member_login_check() {
        try {
            require_once('..\app\shop\models\common.php');
			
			$post = sanitize($_POST);
			$member_email = $post['email'];
			$member_pass = $post['pass'];
			$member_pass = md5($member_pass);

            $rec = DB::table('dat_member') -> where([['email',$member_email],['password',$member_pass]]) -> select('code','name') -> first();
			if($rec == true) {
				session_start();
				$_SESSION['member_login'] = 1;
				$_SESSION['member_code'] = $rec -> code;
				$_SESSION['member_name'] = $rec -> name;

				header('Location: shop_list');
				exit();
			}
		}
		catch(Exception $e) {
			displayError();
		}
        return view('shop/member_login_check',['rec' => $rec]);
    }


    function member_login() {
        return view('shop/member_login');
    }
    

    function member_logout() {
        require_once('..\app\shop\models\common.php');

        session_start();
        clearSession();

        return view('shop/member_logout');
    }


    function shop_cartin() {
        session_start();
		session_regenerate_id(true);

		try {
            require_once('..\app\shop\models\common.php');
			$pro_code = $_GET['procode'];
			$flag = true;
			//もし$_SESSIONにカートが入って入れば配列をコピーする
			if(isset($_SESSION['cart']) == true) {
				$cart = $_SESSION['cart'];
				$kazu = $_SESSION['kazu'];
				if(in_array($pro_code,$cart) == true) {
					$flag = false;
					return view('shop/shop_cartin',array('flag' => $flag));
				}
			}
					$cart[] = $pro_code;
					$kazu[] = 1;
					$_SESSION['cart'] = $cart;
					$_SESSION['kazu'] = $kazu;
		}
		catch(Exception $e) {
			displayError();
		}
        return view('shop/shop_cartin',array('flag' => $flag));
    }
    

    function shop_cartlook() {
        session_start();
		session_regenerate_id(true);

		try {
            require_once('..\app\shop\models\common.php');

			if(isset($_SESSION['cart']) == true) {
				$cart = $_SESSION['cart'];
				$kazu = $_SESSION['kazu'];
				$max = count($cart);
			} else {
				$max = 0;
			}

			$flag = true;
			//カートに何も入っていないときNG判定
			if($max == 0) {
				$flag = false;
				return view('shop/shop_cartlook',array(
                    'flag' => $flag,
                    'max' => $max
                ));
			}

			foreach($cart as $key => $val) {
				$data[0] = $val;
                $rec = DB::table('mst_product')->where('code',$data)->first();
                $pro_name[] = $rec -> name;
                $pro_price[] = $rec -> price;
                $pro_gazou[] = $rec -> gazou;
			}
		}
		catch(Exception $e)
		{
			displayError();
		}
        return view('shop/shop_cartlook', array(
			'max' => $max,
			'pro_name' => $pro_name,
			'pro_price' => $pro_price,
			'pro_gazou' => $pro_gazou,
			'kazu' => $kazu,
			'flag' => $flag
		));
    }
    

    function shop_form_check() {
        require_once('..\app\shop\models\common.php');

		$post = sanitize($_POST);

		$onamae = $post['onamae'];
		$email = $post['email'];
		$postal1 = $post['postal1'];
		$postal2 = $post['postal2'];
		$address = $post['address'];
		$tel = $post['tel'];
		$chumon = $post['chumon'];
		$pass = $post['pass'];
		$pass2 = $post['pass2'];
		$danjo = $post['danjo'];
		$birth = $post['birth'];

		$okflg = true;

		$flag_onamae = true;
		$flag_email = true;
		$flag_postal1 = true;
		$flag_postal2 = true;
		$flag_address = true;
		$flag_tel = true;
		$flag_pass1 = true;
		$flag_pass2 = true;

		if($onamae == '') {
			$flag_onamae = false;
			$okflg = false;
		}


		if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email) == 0) {
			$flag_email = false;
			$okflg = false;
		}


		if(preg_match('/\A[0-9]+\z/',$postal1) == 0) {
			$flag_postal1 = false;
			$okflg = false;
		}

		if(preg_match('/\A[0-9]+\z/',$postal2) == 0) {
			$flag_postal2 = false;
			$okflg = false;
		}


		if($address == '') {
			$flag_address = false;
			$okflg = false;
		}

		if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel) == 0) {
			$flag_tel = false;
			$okflg = false;
		}

	
		//会員登録の情報
		if($chumon == 'chumontouroku') {
			if($pass == '') {
				$flag_pass1 = false;
				$okflg = false;
			}

			if($pass != $pass2) {
				$flag_pass2 = false;
				$okflg = false;
			}
		}
        return view('shop/shop_form_check',array (
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
			'tel' => $tel,
			'chumon' => $chumon,
			'pass' => $pass,
			'pass2' => $pass2,
			'danjo' => $danjo,
			'birth' => $birth,
			'flag_onamae' => $flag_onamae,
			'flag_email' => $flag_email,
			'flag_postal1' => $flag_postal1,
			'flag_postal2' => $flag_postal2,
			'flag_address' => $flag_address,
			'flag_tel' => $flag_tel,
			'flag_pass1' => $flag_pass1,
			'flag_pass2' => $flag_pass2,
			'okflg' => $okflg,
		));
    }
    

    function shop_form_done() {
        session_start();
        session_regenerate_id(true);
    
        try {
            require_once('..\app\shop\models\common.php');
            require_once('..\app\shop\models\mail_class.php');

            $post = sanitize($_POST);

            $onamae = $post['onamae'];
            $email = $post['email'];
            $postal1 = $post['postal1'];
            $postal2 = $post['postal2'];
            $address = $post['address'];
            $tel = $post['tel'];
            $chumon = $post['chumon'];
            $pass = $post['pass'];
            $danjo = $post['danjo'];
            $birth = $post['birth'];
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
            $max = count($cart);

            for($i = 0;$i < $max;$i++) {

                $rec = DB::table('mst_product')->where('code',$cart[$i])->select('name','price')->first();
                $name = $rec -> name;
                $price = $rec -> price;
                $kakaku[] = $price;
                $suryo = $kazu[$i];
                $syokei = $price * $suryo;
                $mailData[$i] = array($name, $price, $suryo, $syokei);
            }
            DB::unprepared('LOCK TABLES dat_sales WRITE,dat_sales_product WRITE,dat_member WRITE');

            //会員登録
            $lastmembercode = 0;
            if($chumon == 'chumontouroku') {
                if($danjo == 'dan') {
                    $danjo = 1;
                } else {
                    $danjo = 2;
                }

                $lastmembercode = DB::table('dat_member')
                    ->insertGetId(
                        [
                            'password' => md5($pass),
                            'name' => $onamae,
                            'email' => $email,
                            'postal1' => $postal1,
                            'postal2' => $postal2,
                            'address' => $address,
                            'tel' => $tel,
                            'danjo' => $danjo,
                            'born' => $birth
                        ]
                    );
            }

            //注文データをdat_salesに追加する
            $lastcode = DB::table('dat_sales')
                    ->insertGetId(
                        [
                            'code_member' => $lastmembercode,
                            'name' => $onamae,
                            'email' => $email,
                            'postal1' => $postal1,
                            'postal2' => $postal2,
                            'address' => $address,
                            'tel' => $tel,
                        ]
                    );

            for($i = 0;$i < $max;$i++) {
                DB::table('dat_sales_product')
                    ->insertGetId(
                        [
                            'code_sales' => $lastcode,
                            'code_product' => $cart[$i],
                            'price' => $kakaku[$i],
                            'quantity' => $kazu[$i],
                        ]
                    );
            }

            DB::unprepared('UNLOCK TABLES');

            //メール送信
            $title = 'ご注文ありがとうございます。';
            $header = 'From:info@rokumarunouen.co.jp';
            $rokumaru_mail = new Rokumaru_Mail($header);
            $rokumaru_mail->makeMail($title,$onamae,$mailData,$chumon);
            $rokumaru_mail->sendMail($email);

            $title = 'お客様からご注文がありました。';
            $header = 'From:'.$email;
            $rokumaru_mail = new Rokumaru_Mail($header);
            $rokumaru_mail->makeMail($title,$onamae,$mailData,$chumon);
            $email = 'info@rokumarunouen.co.jp';
            $rokumaru_mail->sendMail($email);

        } catch(Exception $e) {
            displayError();
        }
        return view('shop/shop_form_done',array (
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
			'tel' => $tel,
		));
    }


    function shop_form() {
        return view('shop/shop_form');
    }
    

    function shop_kantan_check() {
        session_start();
		session_regenerate_id(true);

        require_once('..\app\shop\models\common.php');

		$code = $_SESSION['member_code'];

        $rec = DB::table('dat_member')->where('code',$code)->select('name','email','postal1','postal2','address','tel')->first();

		$onamae = $rec -> name;
		$email = $rec -> email;
		$postal1 = $rec -> postal1;
		$postal2 = $rec -> postal2;
		$address = $rec -> address;
		$tel = $rec -> tel;

        return view('shop/shop_kantan_check', array (
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
		    'tel' => $tel,
		));
    }
    

    function shop_kantan_done() {
        session_start();
		session_regenerate_id(true);

		try {
            require_once('..\app\shop\models\common.php');
            require_once('..\app\shop\models\mail_class.php');

			$post = sanitize($_POST);

			$onamae = $post['onamae'];
			$email = $post['email'];
			$postal1 = $post['postal1'];
			$postal2 = $post['postal2'];
			$address = $post['address'];
			$tel = $post['tel'];

			$cart = $_SESSION['cart'];
			$kazu = $_SESSION['kazu'];
			$max = count($cart);
		
			for($i = 0;$i < $max;$i++) {
                $rec = DB::table('mst_product')->where('code',$cart[$i])->select('name','price')->first();
                $name = $rec -> name;
                $price = $rec -> price;
                $kakaku[] = $price;
                $suryo = $kazu[$i];
                $syokei = $price * $suryo;
                $mailData[$i] = array($name, $price, $suryo, $syokei);
			}

			DB::unprepared('LOCK TABLES dat_sales WRITE,dat_sales_product WRITE,dat_member WRITE');

			$lastmembercode = $_SESSION['member_code'];
            //注文データをdat_salesに追加する
            $lastcode = DB::table('dat_sales')
                    ->insertGetId(
                        [
                            'code_member' => $lastmembercode,
                            'name' => $onamae,
                            'email' => $email,
                            'postal1' => $postal1,
                            'postal2' => $postal2,
                            'address' => $address,
                            'tel' => $tel,
                        ]
                    );

            for($i = 0;$i < $max;$i++) {
                DB::table('dat_sales_product')
                    ->insertGetId(
                        [
                            'code_sales' => $lastcode,
                            'code_product' => $cart[$i],
                            'price' => $kakaku[$i],
                            'quantity' => $kazu[$i],
                        ]
                    );
            }

            DB::unprepared('UNLOCK TABLES');

			//メール送信
			$title = 'ご注文ありがとうございます。';
			$header = 'From:info@rokumarunouen.co.jp';
			$rokumaru_mail = new Rokumaru_Mail($header);
			$rokumaru_mail->makeMail($title,$onamae,$mailData);
			$rokumaru_mail->sendMail($email);

			$title = 'お客様からご注文がありました。';
			$header = 'From:'.$email;
			$rokumaru_mail = new Rokumaru_Mail($header);
			$rokumaru_mail->makeMail($title,$onamae,$mailData);
			$email = 'info@rokumarunouen.co.jp';
			$rokumaru_mail->sendMail($email);

		} catch(Exception $e) {
			displayError();
		}
        return view('shop/shop_kantan_done', array (
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
			'tel' => $tel,
		));
    }


    function shop_list() {
        require_once('..\app\shop\models\common.php');

		session_start();
		session_regenerate_id(true);
	
		try {
			$rec = DB::table('mst_product')->select('code','name','price')->get();
		} catch(Exception $e) {
			displayError();
		}
        return view('shop/shop_list',['rec' => $rec]);
    }
    

    function shop_product() {
        require_once('..\app\shop\models\common.php');

		session_start();
		session_regenerate_id(true);

		try {
			$pro_code = $_GET['procode'];
            $rec = DB::table('mst_product')->where('code',$pro_code)->select('name','price','gazou')->first();

            $pro_name = $rec -> name;
			$pro_price = $rec -> price;
			$pro_gazou_name = $rec -> gazou;

			//変数に画像を入れる(表示する準備)
			if($pro_gazou_name == "") {
				$disp_gazou = '';
			} else {
				$disp_gazou = 'ok';
			}

		} catch(Exception $e) {
			displayError();
		}
        return view('shop/shop_product',array (
            'pro_code' => $pro_code, 
            'pro_name' => $pro_name, 
            'pro_price' => $pro_price, 
            'disp_gazou' => $disp_gazou,
            'pro_gazou_name' => $pro_gazou_name
        ));
    }
}

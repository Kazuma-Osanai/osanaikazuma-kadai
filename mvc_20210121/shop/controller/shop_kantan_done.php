<?php

	function handle($params){
		session_start();
		session_regenerate_id(true);

		try
		{

			require_once('./models/common.php');
			
			require_once('./models/mail_class.php');

			$post=sanitize($_POST);

			$onamae=$post['onamae'];
			$email=$post['email'];
			$postal1=$post['postal1'];
			$postal2=$post['postal2'];
			$address=$post['address'];
			$tel=$post['tel'];

			$cart= $_SESSION['cart'];
			$kazu= $_SESSION['kazu'];
			$max=count($cart);


			//DB接続
			$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
			$user='root';
			$password='';
			$dbh=new PDO($dsn,$user,$password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$mailData='';
			for($i=0;$i<$max;$i++)
			{
				//SQL
				$sql='SELECT name,price FROM mst_product WHERE code=?';
				$stmt=$dbh->prepare($sql);
				//$iのレコードの0の要素(code)を$dataに入れる
				$data[0]=$cart[$i];
				$stmt->execute($data);

				$rec=$stmt->fetch(PDO::FETCH_ASSOC);

				$name=$rec['name'];
				$price=$rec['price'];
				$kakaku[]=$price;
				$suryo=$kazu[$i];
				$syokei=$price * $suryo;

				$mailData[$i] = array($name, $price, $suryo, $syokei);

			}

			$sql='LOCK TABLES dat_sales WRITE,dat_sales_product WRITE,dat_member WRITE';
			$stmt=$dbh->prepare($sql);
			$stmt->execute();

			//会員登録
			$lastmembercode=$_SESSION['member_code'];


			//注文データをdat_salesに追加する
			$sql='INSERT INTO dat_sales(code_member,name,email,postal1,postal2,address,tel) VALUES(?,?,?,?,?,?,?)';
			$stmt=$dbh->prepare($sql);
			//配列をクリア(初期化)
			$data=array();
			$data[]=$lastmembercode;
			$data[]=$onamae;
			$data[]=$email;
			$data[]=$postal1;
			$data[]=$postal2;
			$data[]=$address;
			$data[]=$tel;
			$stmt->execute($data);

			//AUTO_INCREMENTでもっとも最近に発番された番号を取得
			$sql='SELECT LAST_INSERT_ID()';
			$stmt=$dbh->prepare($sql);
			$stmt->execute();
			$rec=$stmt->fetch(PDO::FETCH_ASSOC);
			$lastcode=$rec['LAST_INSERT_ID()'];

			for($i=0;$i<$max;$i++)
			{
				$sql='INSERT INTO dat_sales_product(code_sales,code_product,price,quantity) VALUES(?,?,?,?)';
				$stmt=$dbh->prepare($sql);
				$data=array();
				$data[]=$lastcode;
				$data[]=$cart[$i];
				$data[]=$kakaku[$i];
				$data[]=$kazu[$i];
				$stmt->execute($data);
			}

			$sql='UNLOCK TABLES';
			$stmt=$dbh->prepare($sql);
			$stmt->execute();

			//DB切断
			$dbh=null;


			//メール送信
			$title='ご注文ありがとうございます。';
			$header='From:info@rokumarunouen.co.jp';
			$rokumaru_mail = new Rokumaru_Mail($header);
			$rokumaru_mail->makeMail($title,$onamae,$mailData);
			$rokumaru_mail->sendMail($email);

			$title='お客様からご注文がありました。';
			$header='From:'.$email;
			$rokumaru_mail = new Rokumaru_Mail($header);
			$rokumaru_mail->makeMail($title,$onamae,$mailData);
			$email = 'info@rokumarunouen.co.jp';
			$rokumaru_mail->sendMail($email);



		}
		catch(Exception $e)
		{
			displayError();
		}

		return array(
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
			'tel' => $tel,
		);
	} 

?>

<?php

	function sanitize($before)
	{
		foreach($before as $key=>$value)
		{
			$after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
		}
		return $after;

	}

    //(1) sesstion_start()がClearSession()に入っていないとセッションIDがないので、セッションIDがない状態でclearSessionを実行するとif文のtrueが実行されず処理が短く済むため。
    function clearSession() {
        $_SESSION=array();
        if(isset($_COOKIE[session_name()])==true)
        {
	        setcookie(session_name(),'',time()-42000,'/');
        }
        session_destroy();
        
    }

    //(2),(3) 修正ファイル
    //pro_add_done.php,     pro_delete_done.php,    pro_dalete.php         
    //pro_disp.php,         pro_edit_done.php,      pro_edit.php
    //pro_list.php,         shop_list.php,          shop_product.php
    //staff_add_done.php,   staff_delete.php,       staff_disp.php
    //staff_edit_done.php,  staff_edit.php,         staff_list.php

    //追加修正ファイル
    //shop_kantan_check.php, member_login_check.php
    function executeSql($sql,$data) {

        //DB接続
        $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
        $user='root';
        $password='';
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //SQL
        $stmt=$dbh->prepare($sql);

        $i=0;
        $data_array=null;
        foreach($data as $value){
            $data_array[$i] = $value;
            $i++;
        }

                
        $stmt->execute($data_array);

        return $stmt;


    }


    //(4) 修正ファイル
    //pro_add_done.php,     pro_delete_done.php,    pro_dalete.php         
    //pro_disp.php,         pro_edit_done.php,      pro_edit.php
    //pro_list.php,         shop_product.php,       member_login_check.php
    //shop_cartin.php,      shop_cartlook.php,      shop_form_done.php
    //shop_kantan_done.php, shop_list.php,          shop_product.php
    //staff_add_done.php,   staff_delete_done.php,  staff_delete.php
    //staff_disp.php        staff_edit_done.php,    staff_edit.php
    //staff_list.php,       staff_login_check.php
    function displayError() {
        //(5)catchでこの関数を指定しており、処理される所が同じなためここだけの修正で良い。
        print '処理が正常に実行できませんでした。お手数ですが、最初から操作をやり直して下さい。<br />';
        print '<br />';

        //(6)
        print '<a href="member_login.html">会員ログインへ戻る</a><br />';
        exit();
    }

	

?>
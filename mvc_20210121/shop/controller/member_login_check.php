<?php

	function handle($params){
		try
		{
			require_once('./models/common.php');
			
			$post=sanitize($_POST);
			$member_email=$post['email'];
			$member_pass=$post['pass'];

			$member_pass=md5($member_pass);
			$data[]=$member_email;
			$data[]=$member_pass;
			$stmt = executeSql($sql='SELECT code,name FROM dat_member WHERE email=? AND password=?',$data);

			$dbh=null;

			$rec=$stmt->fetch(PDO::FETCH_ASSOC);

			if($rec==true)
			{
				session_start();
				$_SESSION['member_login']=1;
				$_SESSION['member_code']=$rec['code'];
				$_SESSION['member_name']=$rec['name'];

				header('Location: shop_list');
				exit();
			}

		}
		catch(Exception $e)
		{
			displayError();
		}


		return array('rec'=>$rec);
	}
?>

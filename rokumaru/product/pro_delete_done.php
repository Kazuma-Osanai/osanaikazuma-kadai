<?php

	session_start();
	session_regenerate_id(true);
	if(isset($_SESSION['login'])==false)
	{
		print 'ログインされていません。<br />';
		print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
		exit();
	}
	else
	{
		print $_SESSION['staff_name'];
		print 'さんがログイン中<br />';
		print '<br />';
	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta charset="UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>

		<?php

		try
		{

			require_once('../common/common.php');

			$pro_code=$_POST['code'];
			$pro_gazou_name=$_POST['gazou_name'];

			$stmt = executeSql($sql='DELETE FROM mst_product  WHERE code=?',$data=array($pro_code));

			//DB切断
			$dbh=null;

			if($pro_gazou_name!='')
			{
				unlink('./gazou/'.$pro_gazou_name);
			}


		}
		catch(Exception $e)
		{
			displayError();
		}

		?>

		削除しました。<br />
		<br />
		<a href="pro_list.php">戻る</a>


	</body>
</html>

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

				$pro_code=$_GET['procode'];

				$stmt = executeSql($sql='SELECT name,gazou FROM mst_product WHERE code=?',$data=array($pro_code));


				$rec=$stmt->fetch(PDO::FETCH_ASSOC);
				$pro_name=$rec['name'];
				$pro_gazou_name=$rec['gazou'];

				//DB切断
				$dbh=null;

				if($pro_gazou_name=='')
				{
					$disp_gazou='';
				}
				else
				{
					$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
				}

			}
			catch(Exception $e)
			{
				displayError();
			}

		?>

		商品削除<br />
		<br />
		商品コード<br />
		<?php print $pro_code; ?>
		<br />
		商品名<br />
		<?php print $pro_name; ?>
		<br />
		<?php print $disp_gazou; ?>
		<br />
		この商品を削除してよろしいですか？<br />
		<br />
		<form method="post" action="pro_delete_done.php">
		<input type="hidden" name="code" value="<?php print $pro_code; ?>">
		<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="OK">



	</body>
</html>

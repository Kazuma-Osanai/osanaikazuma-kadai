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

				$stmt = executeSql($sql='SELECT code,name,price FROM mst_product WHERE 1',$data=array());

				//DB切断
				$dbh=null;

				print '商品一覧 <br /><br />';

				print '<form method="post" action="pro_branch.php">';
				while(true)
				{
					$rec = $stmt->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					print '<input type="radio" name="procode" value="'.$rec['code'].'">';
					print $rec['name'].'---';
					print $rec['price'].'円';
					print '<br />';
				}
				print '<input type="submit" name="disp" value="参照">';
				print '<input type="submit" name="add" value="追加">';
				print '<input type="submit" name="edit" value="修正">';
				print '<input type="submit" name="delete" value="削除">';
				print '</form>';

			}
			catch(Exception $e)
			{
				displayError();
			}

		?>

		<br />
		<a href="../staff_login/staff_top.php">トップメニューへ</a><br />


	</body>
</html>

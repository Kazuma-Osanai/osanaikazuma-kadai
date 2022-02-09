<?php

	require_once('../common/common.php');

	session_start();
	session_regenerate_id(true);
	if(isset($_SESSION['member_login'])==false)
	{
		print 'ようこそゲスト様　';
		print '<a href="member_login.html">会員ログイン</a><br />';
		print '<br />';
	}
	else
	{
		print 'ようこそ';
		print $_SESSION['member_name'];
		print '様　';
		print '<a href="member_logout.php">ログアウト</a><br />';
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

				$stmt = executeSql($sql='SELECT code,name,price FROM mst_product WHERE 1',$data=array());

				//DB切断
				$dbh=null;

				print '商品一覧 <br /><br />';

				while(true)
				{
					$rec = $stmt->fetch(PDO::FETCH_ASSOC);
					if($rec==false)
					{
						break;
					}
					print '<a href="shop_product.php?procode='.$rec['code'].'">';
					print $rec['name'].'---';
					print $rec['price'].'円';
					print '</a>';
					print '<br />';
				}

				print '<br />';
				print '<a href="shop_cartlook.php">カートを見る</a><br />';

			}
			catch(Exception $e)
			{
				displayError();
			}

		?>


	</body>
</html>

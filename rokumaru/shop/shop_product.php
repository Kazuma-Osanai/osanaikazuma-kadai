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

				$pro_code=$_GET['procode'];

				$stmt = executeSql($sql='SELECT name,price,gazou FROM mst_product WHERE code=?',$data=array($pro_code));


				$rec=$stmt->fetch(PDO::FETCH_ASSOC);
				$pro_name=$rec['name'];
				$pro_price=$rec['price'];
				$pro_gazou_name=$rec['gazou'];

				//DB切断
				$dbh=null;

				//変数に画像を入れる(表示する準備)
				if($pro_gazou_name=="")
				{
					$disp_gazou='';
				}
				else
				{
					$disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
				}

				print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br /><br />';

			}
			catch(Exception $e)
			{
				displayError();
			}

		?>

		商品情報参照<br />
		<br />
		商品コード<br />
		<?php print $pro_code; ?>
		<br />
		商品名<br />
		<?php print $pro_name; ?>
		<br />
		価格<br />
		<?php print $pro_price; ?>
		<br />
		<?php print $disp_gazou; ?>
		<br />
		<br />
		<form>
			<input type="button" onclick="history.back()" value="戻る">
		</form>



	</body>
</html>

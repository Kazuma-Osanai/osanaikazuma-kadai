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
					$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
				}

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

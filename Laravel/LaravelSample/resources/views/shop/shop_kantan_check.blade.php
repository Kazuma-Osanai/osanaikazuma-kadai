<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv = "content-type" charset = "UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>

	<?php 
		if(isset($_SESSION['member_login']) == false) {
			print 'ログインされていません。<br />';
			print '<a href = "shop_list.php">商品一覧へ</a>';
			exit();
		}
	?>

	お名前 <br />
	<?php print $onamae; ?>
	<br /><br />

	メールアドレス <br />
	<?php print $email; ?>
	<br /><br />

	郵便番号 <br />
	<?php print $postal1; ?>-<?php print $postal2; ?>
	<br /><br />

	住所 <br />
	<?php print $address; ?>
	<br /><br />

	電話番号 <br />
	<?php print $tel; ?>
	<br /><br />
		
	<form method = "post" action = "shop_kantan_done">
		@csrf
		<?php
			print '<input type = "hidden" name = "onamae" value = "'.$onamae.'">';
			print '<input type = "hidden" name = "email" value = "'.$email.'">';
			print '<input type = "hidden" name = "postal1" value = "'.$postal1.'">';
			print '<input type = "hidden" name = "postal2" value = "'.$postal2.'">';
			print '<input type = "hidden" name = "address" value = "'.$address.'">';
			print '<input type = "hidden" name = "tel" value = "'.$tel.'">';
		?>
		<input type = "button" onclick = "history.back()" value = "戻る">
		<input type = "submit" value = "OK"><br />
	</form>


	</body>
</html>

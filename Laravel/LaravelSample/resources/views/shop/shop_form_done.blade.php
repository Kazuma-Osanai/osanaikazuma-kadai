<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv = "content-type" charset = "UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>

		<?php print $onamae ?>様<br />
		ご注文ありがとうございました。<br />
		<?php print $email ?>にメールを送りましたのでご確認ください。<br />
		商品は以下の住所に発送させていただきます。<br />
		<?php print $postal1 ?>-<?php print $postal2 ?><br />
		<?php print $address ?><br />
		<?php print $tel ?><br />

		<br />
		<a href = "shop_list">商品画面へ</a>
	</body>
</html>

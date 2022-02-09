<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta charset = "UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>
		<?php
			if($flag_mozi == false) {
				print '数量に誤りがあります。';
				print '<a href="shop_cartlook">カートに戻る</a>';;
			} 

			if($flag_kazu == false) {
				print '数量は必ず1個以上、10個までです。';
				print '<a href="shop_cartlook">カートに戻る</a>';
			}
		?>

	</body>
</html>

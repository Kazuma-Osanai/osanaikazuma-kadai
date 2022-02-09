<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta charset = "UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>
		<?php 
			if(isset($_SESSION['member_login']) == false) {
				print 'ようこそゲスト様　';
				print '<a href = "member_login">会員ログイン</a><br />';
				print '<br />';
			} else {
				print 'ようこそ';
				print $_SESSION['member_name'];
				print '様　';
				print '<a href = "member_logout">ログアウト</a><br />';
				print '<br />';
			}
		?>

		商品一覧
		<br />
		<br />
		<?php
			foreach($rec as $vals) {
				print '<a href = "shop_product?procode='.$vals -> code.'">';
				print $vals -> name.'---';
				print $vals -> price.'円';
				print '</a>';
				print '<br />';
			}
		?>
		<br />
		<a href = "shop_cartlook">カートを見る</a><br />
	
	</body>
</html>

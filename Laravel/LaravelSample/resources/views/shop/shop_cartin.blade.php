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

	<?php
		if($flag == false) {
			print 'その商品はすでにカートに入っています。<br />';
			print '<a href = "shop_list">商品一覧に戻る</a>';
		} else {
			print 'カートに追加しました。<br />';
			print '<br />';
			print '<a href = "shop_list">商品一覧に戻る</a>';
		}
	?>

</body>
</html>

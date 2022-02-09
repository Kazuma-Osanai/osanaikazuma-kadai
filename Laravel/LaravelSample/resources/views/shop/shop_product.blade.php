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
		<?php print '<a href = "shop_cartin?procode='.$pro_code.'">カートに入れる</a><br /><br />'; ?>
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
		<?php 
			if($disp_gazou == 'ok') {
				print '<img src = "../product/gazou/'.$pro_gazou_name.'">'; 
			}
		?>
		<br />
		<br />
		<form>
			@csrf
			<input type = "button" onclick = "history.back()" value = "戻る">
		</form>
	</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta charset="UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>

	<?php 
		if(isset($_SESSION['member_login'])==false)
			{
			print 'ようこそゲスト様　';
			print '<a href="member_login">会員ログイン</a><br />';
			print '<br />';
		}
		else
		{
			print 'ようこそ';
			print $_SESSION['member_name'];
			print '様　';
			print '<a href="member_logout">ログアウト</a><br />';
			print '<br />';
		}
	?>

	<?php 
		if($flag==false)
		{
			print 'カートに商品が入っていません。<br />';
			print '<br />';
			print '<a href="shop_list">商品一覧へ戻る</a>';
		}
	?>

	<?php
		if($max > 0)
		{
	?>
			カートの中身<br />
			<br />
			<form method="post" action="kazu_change">

			<table border="1">
				<tr>
				<td>商品</td>
				<td>商品画像</td>
				<td>価格</td>
				<td>数量</td>
				<td>小計</td>
				<td>削除</td>
				</tr>

				
				<?php 
					for($i=0;$i<$max;$i++)
					{
				?>
				<tr>
					<td><?php print $pro_name[$i];?></td>
					<td><?php print '<img src="../product/gazou/'.$pro_gazou[$i].'">'; ?></td>
					<td><?php print $pro_price[$i];?>円</td>
					<td><input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
					<td><?php print $pro_price[$i]*$kazu[$i]; ?>円</td>
					<td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
					</tr>
				<?php
					}
				?>
			</table>

			<input type="hidden" name="max" value="<?php print $max ?>">
			<input type="submit" value="数量変更"><br />
			<input type="button" onclick="history.back()" value="戻る">

			</form>

			<br />
			<a href="shop_form">ご購入手続きへ進む</a><br />
			

			<?php
				if(isset($_SESSION["member_login"])==true)
				{
					print '<a href="shop_kantan_check">会員かんたん注文へ進む</a><br />';
				} 
			?>
		<?php 
			}
		?>

	</body>
</html>

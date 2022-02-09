<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="content-type" charset="UTF-8">
		<title>ろくまる農園</title>
	</head>
	<body>

		<?php
			if($flag_onamae==false)
			{
				print 'お名前が入力されていません。<br /><br />';
			}
			else
			{
				print 'お名前<br />';
				print $onamae;
				print '<br /><br />';
			}
	
	
			if($flag_email==false)
			{
				print 'メールアドレスを正確に入力してください。<br /><br />';
			}
			else
			{
				print 'メールアドレス<br />';
				print $email;
				print '<br /><br />';
			}
	
	
			if($flag_postal1==false)
			{
				print '郵便番号は半角数字で入力してください。<br /><br />';
			}
			else
			{
				print '郵便番号<br />';
				print $postal1;
				print '-';
				print $postal2;
				print '<br /><br />';
			}
	
			if($flag_postal2==false)
			{
				print '郵便番号は半角数字で入力してください。<br /><br />';
			}
	
	
			if($flag_address==false)
			{
				print '住所が入力されていません。<br /><br />';
			}
			else
			{
				print '郵便番号<br />';
				print $address;
				print '<br /><br />';
			}
	
			if($flag_tel==false)
			{
				print '電話番号を正確に入力してください。<br /><br />';
			}
			else
			{
				print '電話番号<br />';
				print $tel;
				print '<br /><br />';
			}
		?>

		<?php
			if($chumon=='chumontouroku')
			{
				if($flag_pass1==false)
				{
					print 'パスワードが入力されていません。<br /><br />';
				}
	
				if($flag_pass2==false)
				{
					print 'パスワードが一致しません。<br /><br />';
				}
	
				print '性別 <br />';
				if($danjo=='dan')
				{
					print '男性';
				}
				else
				{
					print '女性';
				}
	
				print '<br /><br />';
	
				print '生まれ年 <br />';
				print $birth;
				print '年代';
				print '<br /><br />';
	
			}
		?>


		<?php
			if($okflg==true)
			{
				print '<form method="post" action="shop_form_done">';
				print '<input type="hidden" name="onamae" value="'.$onamae.'">';
				print '<input type="hidden" name="email" value="'.$email.'">';
				print '<input type="hidden" name="postal1" value="'.$postal1.'">';
				print '<input type="hidden" name="postal2" value="'.$postal2.'">';
				print '<input type="hidden" name="address" value="'.$address.'">';
				print '<input type="hidden" name="tel" value="'.$tel.'">';
				print '<input type="hidden" name="chumon" value="'.$chumon.'">';
				print '<input type="hidden" name="pass" value="'.$pass.'">';
				print '<input type="hidden" name="danjo" value="'.$danjo.'">';
				print '<input type="hidden" name="birth" value="'.$birth.'">';
				print '<input type="button" onclick="history.back()" value="戻る">';
				print '<input type="submit" value="OK"><br />';
				print '</form>';
			}
			else
			{
				print '<form>';
				print '<input type="button" onclick="history.back()" value="戻る">';
				print '</form>';
			}
		?>

	</body>
</html>

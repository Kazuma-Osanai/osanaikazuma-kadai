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
				

				$post=sanitize($_POST);
				$pro_code=$post['code'];
				$pro_name=$post['name'];
				$pro_price=$post['price'];
				$pro_gazou_name_old=$post['gazou_name_old'];
				$pro_gazou_name=$post['gazou_name'];


				$data_array[]=$pro_name;
				$data_array[]=$pro_price;
				$data_array[]=$pro_gazou_name;
				$data_array[]=$pro_code;

				$stmt = executeSql($sql='UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?',$data=$data_array);


				//DB切断
				$dbh=null;

				//古い画像があれば削除
				if($pro_gazou_name_old!=$pro_gazou_name)
				{
					if($pro_gazou_name_old!='')
					{
						unlink('./gazou/'.$pro_gazou_name_old);
					}
				}

				print '修正しました。 <br />';

			}
			catch(Exception $e)
			{
				displayError();
			}

		?>

		<a href="pro_list.php">戻る</a>


	</body>
</html>

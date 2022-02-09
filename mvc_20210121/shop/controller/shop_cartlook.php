<?php
	function handle($params){
		session_start();
		session_regenerate_id(true);

		try
		{
			require_once('./models/common.php');

			if(isset($_SESSION['cart'])==true)
			{
				$cart=$_SESSION['cart'];
				$kazu=$_SESSION['kazu'];
				$max=count($cart);
			}
			else
			{
				$max=0;
			}

			$flag = true;
			//カートに何も入っていないときNG判定
			if($max==0)
			{
				$flag = false;
				return array('flag' => $flag, 'max' => $max);
				exit();
			}

			//DB接続
			$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
			$user='root';
			$password='';
			$dbh=new PDO($dsn,$user,$password);
			$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			foreach($cart as $key => $val)
			{
				$sql='SELECT code,name,price,gazou FROM mst_product WHERE code=?';
				$stmt=$dbh->prepare($sql);
				$data[0]=$val;
				$stmt->execute($data);

				$rec=$stmt->fetch(PDO::FETCH_ASSOC);

				$pro_name[]=$rec['name'];
				$pro_price[]=$rec['price'];
				$pro_gazou[]=$rec['gazou'];
			}

			$dbh=null;



		}
		catch(Exception $e)
		{
			displayError();
		}


		return array(
			'max' => $max,
			'pro_name' => $pro_name,
			'pro_price' => $pro_price,
			'pro_gazou' => $pro_gazou,
			'kazu' => $kazu,
			'flag' => $flag
		);
	}
?>

<?php
	function handle($params){
        require_once('./models/common.php');

		session_start();
		session_regenerate_id(true);


		try
		{

			$pro_code=$_GET['procode'];

			$stmt = executeSql($sql='SELECT name,price,gazou FROM mst_product WHERE code=?',$data=array($pro_code));


			$rec=$stmt->fetch(PDO::FETCH_ASSOC);
			$pro_name=$rec['name'];
			$pro_price=$rec['price'];
			$pro_gazou_name=$rec['gazou'];

			//DB切断
			$dbh=null;

			//変数に画像を入れる(表示する準備)
			if($pro_gazou_name=="")
			{
				$disp_gazou='';
			}
			else
			{
				$disp_gazou='ok';
			}

		}
		catch(Exception $e)
		{
			displayError();
		}

		return array(
			'pro_code' => $pro_code, 
			'pro_name' => $pro_name, 
			'pro_price' => $pro_price, 
			'disp_gazou' => $disp_gazou,
			'pro_gazou_name' => $pro_gazou_name
		);
	}
?>

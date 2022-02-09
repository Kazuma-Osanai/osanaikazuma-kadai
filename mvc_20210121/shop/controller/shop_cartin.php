<?php
	function handle($params){
		session_start();
		session_regenerate_id(true);

		try
		{
			
			require_once('./models/common.php');
			$pro_code=$_GET['procode'];

			$flag = true;
				
			//もし$_SESSIONにカートが入って入れば配列をコピーする
			if(isset($_SESSION['cart'])==true)
			{
				$cart=$_SESSION['cart'];
				$kazu=$_SESSION['kazu'];
				
				if(in_array($pro_code,$cart)==true)
				{
					
					$flag = false;
					return array('flag' => $flag);
					
					exit();
				}
			}
					$cart[]=$pro_code;
					$kazu[]=1;
					$_SESSION['cart']=$cart;
					$_SESSION['kazu']=$kazu;
				

		}
		catch(Exception $e)
		{
			displayError();
		}
		return array('flag' => $flag);
	}

?>
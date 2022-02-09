<?php
	function handle($params){
		session_start();
		session_regenerate_id(true);

        require_once('./models/common.php');


		$post=sanitize($_POST);
		$flag_mozi=true;
		$flag_kazu=true;

		$max=$post['max'];
		for($i=0;$i<$max;$i++)
		{
			if(preg_match("/\A[0-9]+\z/",$post['kazu'.$i])==0)
			{
				$flag_mozi=false;
				return array('flag_mozi' => $flag_mozi,'flag_kazu' => $flag_kazu);
				exit();
			}

			if($post['kazu'.$i]<1 || 10<$post['kazu'.$i])
			{
				$flag_kazu=false;
				return array('flag_mozi' => $flag_mozi,'flag_kazu' => $flag_kazu);
				exit();
			}
			$kazu[]=$post['kazu'.$i];
		}

		$cart=$_SESSION['cart'];

		for($i=$max;0<=$i;$i--)
		{
			if(isset($_POST['sakujo'.$i])==true)
			{
				array_splice($cart,$i,1);
				array_splice($kazu,$i,1);
			}
		}

		$_SESSION['cart']=$cart;
		$_SESSION['kazu']=$kazu;

		header('Location: shop_cartlook');
		return array(
			'$flag_mozi' => $$flag_mozi,
			'$flag_kazu' => $$flag_kazu
		);
		exit();
	}
?>

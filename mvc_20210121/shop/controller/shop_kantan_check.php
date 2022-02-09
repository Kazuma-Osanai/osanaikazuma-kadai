<?php
	function handle($params){
		session_start();
		session_regenerate_id(true);


        require_once('./models/common.php');

		$code=$_SESSION['member_code'];


		$stmt = executeSql($sql='SELECT name,email,postal1,postal2,address,tel FROM dat_member WHERE code=?',$data=array($code));

		$rec=$stmt->fetch(PDO::FETCH_ASSOC);

		$dbh=null;

		$onamae=$rec['name'];
		$email=$rec['email'];
		$postal1=$rec['postal1'];
		$postal2=$rec['postal2'];
		$address=$rec['address'];
		$tel=$rec['tel'];

		return array(
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
			'tel' => $tel,
		);
	}

?>

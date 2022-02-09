<?php
	function handle($params){
        require_once('./models/common.php');

		$post=sanitize($_POST);

		$onamae=$post['onamae'];
		$email=$post['email'];
		$postal1=$post['postal1'];
		$postal2=$post['postal2'];
		$address=$post['address'];
		$tel=$post['tel'];
		$chumon=$post['chumon'];
		$pass=$post['pass'];
		$pass2=$post['pass2'];
		$danjo=$post['danjo'];
		$birth=$post['birth'];

		$okflg=true;

		$flag_onamae=true;
		$flag_email=true;
		$flag_postal1=true;
		$flag_postal2=true;
		$flag_address=true;
		$flag_tel=true;
		$flag_pass1=true;
		$flag_pass2=true;

		if($onamae=='')
		{
			$flag_onamae=false;
			$okflg=false;
		}


		if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0)
		{
			$flag_email=false;
			$okflg=false;
		}


		if(preg_match('/\A[0-9]+\z/',$postal1)==0)
		{
			$flag_postal1=false;
			$okflg=false;
		}

		$result_postal2 = null;
		if(preg_match('/\A[0-9]+\z/',$postal2)==0)
		{
			$flag_postal2=false;
			$okflg=false;
		}


		if($address=='')
		{
			$flag_address=false;
			$okflg=false;
		}

		if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel)==0)
		{
			$flag_tel=false;
			$okflg=false;
		}

	
		//会員登録の情報
		if($chumon=='chumontouroku')
		{
			if($pass=='')
			{
				$flag_pass1=false;
				$okflg=false;
			}

			if($pass!=$pass2)
			{
				$flag_pass2=false;
				$okflg=false;
			}
		}




		return array(
			'onamae' => $onamae,
			'email' => $email,
			'postal1' => $postal1,
			'postal2' => $postal2,
			'address' => $address,
			'tel' => $tel,
			'chumon' => $chumon,
			'pass' => $pass,
			'pass2' => $pass2,
			'danjo' => $danjo,
			'birth' => $birth,

			'flag_onamae' => $flag_onamae,
			'flag_email' => $flag_email,
			'flag_postal1' => $flag_postal1,
			'flag_postal2' => $flag_postal2,
			'flag_address' => $flag_address,
			'flag_tel' => $flag_tel,
			'flag_pass1' => $flag_pass1,
			'flag_pass2' => $flag_pass2,

			'okflg' => $okflg,
		);
	}
?>
<?php
	function handle($params){
        require_once('./models/common.php');

		session_start();
		session_regenerate_id(true);
	
		try
		{

			$stmt = executeSql($sql='SELECT code,name,price FROM mst_product WHERE 1',$data=array());

			//DB切断
			$dbh=null;

		}
		catch(Exception $e)
		{
			displayError();
		}
	return array('rec'=>$stmt);
}
?>
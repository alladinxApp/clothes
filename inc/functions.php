<?
	function dateFormat($date,$format){
		$newdate = null;
		if(empty($date) || $date == '0000-00-00 00:00:00'){
			$newdate = null;
		}else{
			$newdate = date($format,strtotime($date));
		}
		
		return $newdate;
	}
	function genRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';    

		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters))];
		}

		return date("YmdHi") . $string;
	}
	function exportRowData($data,$headertype,$filename){
		header("Content-type: application/octet-stream");
		
		switch($headertype){
			case "excel":
				header("Content-type: application/vnd.ms-excel");
				break;
			default:
				break;
		}
		
		header( "Content-disposition: filename=" . $filename );
		print "$data";
	}
	function formatNum($pano,$noOfDigit){
		$length = strlen($pano);
		$dif = $noOfDigit - $length;
		
		$digit = null;
		for($i = 1; $i<=$dif; $i++){
			$digit .= '0';
		}
		
		return $digit.$pano;
	}
	function getNewCtrlNo($type){
		// SET FMS DB
		$cs_db = new DBConfig;
		$cs_db->setClothesDB();

		// SET CONTROL NO
		$ctrlno = new Table;
		$ctrlno->setSQLType($cs_db->getSQLType());
		$ctrlno->setInstance($cs_db->getInstance());
		$ctrlno->setView("controlnomaster");
		$ctrlno->setParam("WHERE type = '$type' ORDER BY id");
		$ctrlno->doQuery("query");
		$row_ctrlno = $ctrlno->getLists();
		
		// CLOSING FMS DB
		$cs_db->DBClose();

		$noOfDigit = $row_ctrlno[0]['noOfDigit'];
		$ctrlCode = $row_ctrlno[0]['code'];
		$lastseqno = $row_ctrlno[0]['lastDigit'] + 1;

		$newnum = formatNum($lastseqno,$noOfDigit);
		return $ctrlCode.$newnum;
	}
	function UpdateCtrlNo($type){
		// SET FMS DB
		$cs_db = new DBConfig;
		$cs_db->setClothesDB();

		// SET CONTROL NO
		$upd_ctrlno = new Table;
		$upd_ctrlno->setSQLType($cs_db->getSQLType());
		$upd_ctrlno->setInstance($cs_db->getInstance());
		$upd_ctrlno->setTable("controlnomaster");
		$upd_ctrlno->setValues("lastDigit = (lastDigit + 1)");
		$upd_ctrlno->setParam("WHERE type = '$type'");
		$upd_ctrlno->doQuery("update");
		
		// CLOSING FMS DB
		$cs_db->DBClose();
	}
?>
<?
	// ADD NEW LABOR TO EMPLOYEE
	if(isset($_POST['ARSave']) && !empty($_POST['ARSave']) && $_POST['ARSave'] == 1){
		$id = $_GET['id'];
		$amount = str_replace(",","",$_POST['txtAmount']);
		$bal = str_replace(",","",$_POST['txtBalance']);
		$tender = str_replace(",","",$_POST['txtTender']);
		$rem = $_POST['txtRemarks'];
		$url = BASE_URL . "dailycollection_add.php?id=" . $id;

		// GET CONTROL NO
		$newNum = getNewCtrlNo("ACCOUNTS_RECEIVABLE");

		if(!empty($bal)){
			$rbal = ($bal - $tender);
		}else{
			$rbal = $amount;
		}

		if($rbal <= 0){
			$close = ",status = 2";
			$modified = ",modifiedDate = '$today',modifiedBy = '$userid'";
			$statdesc = ',status';
			$statval = ",'1'";
			$modidesc = ",modifiedDate,modifiedBy";
			$modival = ",'$today','$userid'";
			$url = BASE_URL . "dailycollections.php";
		}

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE AR
		$updarmst = new Table();
		$updarmst->setSQLType($csdb->getSQLType());
		$updarmst->setInstance($csdb->getInstance());
		$updarmst->setTable("armaster");
		$updarmst->setValues("status = 1, modifiedDate = '$today', modifiedBy = '$userid'");
		$updarmst->setParam("WHERE billingReferenceNo = '$id'");
		$updarmst->doQuery("update");

		// INSERT NEW AR
		$armst = new Table();
		$armst->setSQLType($csdb->getSQLType());
		$armst->setInstance($csdb->getInstance());
		$armst->setTable("armaster");
		$armst->setField("ARNo,billingReferenceNo,amount,tender,balance,remarks,createdDate,createdBy $statdesc $modidesc");
		$armst->setValues("'$newNum','$id','$amount','$tender','$rbal','$rem','$today','$userid' $statval $modival");
		$armst->doQuery("save");

		// INSERT NEW AR
		$billmst = new Table();
		$billmst->setSQLType($csdb->getSQLType());
		$billmst->setInstance($csdb->getInstance());
		$billmst->setTable("billingmaster");
		$billmst->setValues("balance = (balance - $tender) $close $modified");
		$billmst->setParam("WHERE billingReferenceNo = '$id'");
		$billmst->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NO
		UpdateCtrlNo("ACCOUNTS_RECEIVABLE");

		$alert = new MessageAlert();
		$alert->setMessage("AR successfully received.");
		$alert->setURL($url);
		$alert->Alert();
	}
	// END ADD NEW LABOR TO EMPLOYEE
?>
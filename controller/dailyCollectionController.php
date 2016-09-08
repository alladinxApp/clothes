<?
	// ADD NEW LABOR TO EMPLOYEE
	if(isset($_POST['ARSave']) && !empty($_POST['ARSave']) && $_POST['ARSave'] == 1){
		$id = $_GET['id'];
		$amount = str_replace(",","",$_POST['txtTender']);
		$bal = str_replace(",","",$_POST['txtBalance']);
		$url = BASE_URL . "dailycollection_add.php?id=" . $id;

		// GET CONTROL NO
		$newNum = getNewCtrlNo("ACCOUNTS_RECEIVABLE");

		$rbal = ($bal - $amount);

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		if($rbal <= 0){
			$close = ",status = 2";
			$statdesc = ',status';
			$statval = ",'1'";
			$url = BASE_URL . "dailycollections.php";
		}

		// UPDATE AR
		$updarmst = new Table();
		$updarmst->setSQLType($csdb->getSQLType());
		$updarmst->setInstance($csdb->getInstance());
		$updarmst->setTable("armaster");
		$updarmst->setValues("status = 1");
		$updarmst->setParam("WHERE billingReferenceNo = '$id'");
		$updarmst->doQuery("update");

		// INSERT NEW AR
		$armst = new Table();
		$armst->setSQLType($csdb->getSQLType());
		$armst->setInstance($csdb->getInstance());
		$armst->setTable("armaster");
		$armst->setField("ARNo,billingReferenceNo,amount,tender,balance,createdDate,createdBy $statdesc");
		$armst->setValues("'$newNum','$id','$amount','$bal','$rbal','$today','$userid' $statval");
		$armst->doQuery("save");

		// INSERT NEW AR
		$billmst = new Table();
		$billmst->setSQLType($csdb->getSQLType());
		$billmst->setInstance($csdb->getInstance());
		$billmst->setTable("billingmaster");
		$billmst->setValues("balance = (balance - $amount) $close");
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
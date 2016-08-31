<?
	// SAVE BILLING
	if(isset($_POST['billingSaved']) && !empty($_POST['billingSaved']) && $_POST['billingSaved'] == 1){
		$id = $_GET['id'];
		// GET CONTROL NO
		$newNum = getNewCtrlNo("BILLING");
		$downpayment = str_replace(",","",$_POST['txtDownPayment']);
		$amntrec = str_replace(",","",$_POST['txtAmountReceived']);
		$ttlamount = str_replace(",","",$_POST['txtAmount']);
		$bal = str_replace(",","",$_POST['txtBalance']);
		$change = str_replace(",","",$_POST['txtChange']);

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW BILLING
		$billing = new Table();
		$billing->setSQLType($csdb->getSQLType());
		$billing->setInstance($csdb->getInstance());
		$billing->setTable("billingmaster");
		$billing->setField("billingReferenceNo,billedDate,jobOrderReferenceNo,downPayment,amountReceived,totalAmount,balance,createdBy");
		$billing->setValues("'$newNum','$today','$id','$downpayment','$amntrec','$ttlamount','$bal','$userid'");
		$billing->doQuery("save");

		// UPDATE JO
		$updjo = new Table();
		$updjo->setSQLType($csdb->getSQLType());
		$updjo->setInstance($csdb->getInstance());
		$updjo->setTable("jobordermaster");
		$updjo->setValues("status = 2");
		$updjo->setParam("WHERE jobOrderReferenceNo = '$id'");
		$updjo->doQuery("update");

		// UPDATE CONTROL NO
		UpdateCtrlNo("BILLING");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("New billing successfully saved.");
		$alert->setURL(BASE_URL . "billings.php");
		$alert->Alert();
	}
	// END SAVE BILLING
	// EDIT BILLING
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET BILLING
		$billingmst = new Table();
		$billingmst->setSQLType($csdb->getSQLType());
		$billingmst->setInstance($csdb->getInstance());
		$billingmst->setView("billingmaster_v");
		$billingmst->setParam("WHERE billingReferenceNo = '$id'");
		$billingmst->doQuery("query");
		$row_billingmst = $billingmst->getLists();

		$joNo = $row_billingmst[0]['jobOrderReferenceNo'];

		// SET DELIVERY
		$deliverymst = new Table();
		$deliverymst->setSQLType($csdb->getSQLType());
		$deliverymst->setInstance($csdb->getInstance());
		$deliverymst->setView("deliverymaster_v");
		$deliverymst->setParam("WHERE jobOrderReferenceNo = '$joNo'");
		$deliverymst->doQuery("query");
		$row_deliverymst = $deliverymst->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT BILLING
	// UPDATE BILLING
	if(isset($_POST['billingPosted']) && !empty($_POST['billingPosted']) && $_POST['billingPosted'] == 1){
		$id = $_GET['id'];
		// GET CONTROL NO
		$newNum = getNewCtrlNo("ACCOUNTS_RECEIVABLE");
		$ttlamount = str_replace(",","",$_POST['txtAmount']);

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE BILLING
		$billingmst = new Table();
		$billingmst->setSQLType($csdb->getSQLType());
		$billingmst->setInstance($csdb->getInstance());
		$billingmst->setTable("billingmaster");
		$billingmst->setValues("status = 1, postedDate = '$today'");
		$billingmst->setParam("WHERE billingReferenceNo = '$id'");
		$billingmst->doQuery("update");

		// INSERT NEW BILLING
		$ar = new Table();
		$ar->setSQLType($csdb->getSQLType());
		$ar->setInstance($csdb->getInstance());
		$ar->setTable("armaster");
		$ar->setField("ARNo,billingReferenceNo,amount,createdDate,createdBy");
		$ar->setValues("'$newNum','$id','$ttlamount','$today','$userid'");
		$ar->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NO
		UpdateCtrlNo("ACCOUNTS_RECEIVABLE");

		$alert = new MessageAlert();
		$alert->setMessage("Billing successfully posted.");
		$alert->setURL(BASE_URL . "billings.php");
		$alert->Alert();
	}
	// END UPDATE BILLING
?>
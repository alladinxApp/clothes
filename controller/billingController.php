 <?
	// SAVE BILLING
	if(isset($_POST['billingSaved']) && !empty($_POST['billingSaved']) && $_POST['billingSaved'] == 1){
		$id = $_GET['id'];
		// GET CONTROL NO
		$newNum = getNewCtrlNo("BILLING");
		$ttlamount = str_replace(",","",$_POST['txtAmount']);
		$txtDownPayment = 0;

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		if($_POST['txtDownPayment'] > 0){
			$txtDownPayment = str_replace(",","",$_POST['txtDownPayment']);
			$estrefno = $_POST['txtEstRefNo'];
			
			// UPDATE EST
			$updest = new Table();
			$updest->setSQLType($csdb->getSQLType());
			$updest->setInstance($csdb->getInstance());
			$updest->setTable("estimatemaster");
			$updest->setValues("isAppliedDP = 1");
			$updest->setParam("WHERE quoteReferenceNo = '$estrefno'");
			$updest->doQuery("update");
		}

		// INSERT NEW BILLING MST
		$billingmst = new Table();
		$billingmst->setSQLType($csdb->getSQLType());
		$billingmst->setInstance($csdb->getInstance());
		$billingmst->setTable("billingmaster");
		$billingmst->setField("billingReferenceNo,billedDate,jobOrderReferenceNo,downPayment,totalAmount,balance,createdBy");
		$billingmst->setValues("'$newNum','$today','$id','$txtDownPayment','$ttlamount','$ttlamount','$userid'");
		$billingmst->doQuery("save");

		foreach($_REQUEST['chkDeliveryCode'] as $val){
			$delivery = explode("#",$val);
			$dCode = $delivery[0];
			$amount = $delivery[1];
			
			// INSERT NEW BILLING DTL
			$billingdtl = new Table();
			$billingdtl->setSQLType($csdb->getSQLType());
			$billingdtl->setInstance($csdb->getInstance());
			$billingdtl->setTable("billingdetail");
			$billingdtl->setField("billingReferenceNo,deliveryCode,Amount");
			$billingdtl->setValues("'$newNum','$dCode','$amount'");
			$billingdtl->doQuery("save");
		}

		$chkdeliveries = new Table();
		$chkdeliveries->setSQLType($csdb->getSQLType());
		$chkdeliveries->setInstance($csdb->getInstance());
		$chkdeliveries->setView("deliverymaster_v");
		$chkdeliveries->setParam("WHERE jobOrderReferenceNo = '$id' AND status = 0");
		$chkdeliveries->doQuery("query");
		$num_chkdeliveries = $chkdeliveries->getNumRows();

		if($num_chkdeliveries == 0){
			// UPDATE JO
			$updjo = new Table();
			$updjo->setSQLType($csdb->getSQLType());
			$updjo->setInstance($csdb->getInstance());
			$updjo->setTable("jobordermaster");
			$updjo->setValues("status = 2");
			$updjo->setParam("WHERE jobOrderReferenceNo = '$id'");
			$updjo->doQuery("update");
		}
		
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

		// SET BILLING MST
		$billingmst = new Table();
		$billingmst->setSQLType($csdb->getSQLType());
		$billingmst->setInstance($csdb->getInstance());
		$billingmst->setView("billingmaster_v");
		$billingmst->setParam("WHERE billingReferenceNo = '$id'");
		$billingmst->doQuery("query");
		$row_billingmst = $billingmst->getLists();

		$joNo = $row_billingmst[0]['jobOrderReferenceNo'];

		// SET BILLING DTL
		$billingdtl = new Table();
		$billingdtl->setSQLType($csdb->getSQLType());
		$billingdtl->setInstance($csdb->getInstance());
		$billingdtl->setView("billingdetail_v");
		$billingdtl->setParam("WHERE billingReferenceNo = '$id'");
		$billingdtl->doQuery("query");
		$row_billingdtl = $billingdtl->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT BILLING
	// UPDATE BILLING
	if(isset($_POST['billingPosted']) && !empty($_POST['billingPosted']) && $_POST['billingPosted'] == 1){
		$id = $_GET['id'];
		$amount = str_replace(",","",$_POST['txtAmount']);

		// GET CONTROL NO
		$newNum = getNewCtrlNo("ACCOUNTS_RECEIVABLE");

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

		// INSERT NEW AR
		$armst = new Table();
		$armst->setSQLType($csdb->getSQLType());
		$armst->setInstance($csdb->getInstance());
		$armst->setTable("armaster");
		$armst->setField("ARNo,billingReferenceNo,amount,balance,createdDate,createdBy");
		$armst->setValues("'$newNum','$id','$amount','$amount','$today','$userid'");
		$armst->doQuery("save");

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
	// SEARCH BILLING
	if(isset($_POST['billingSearch']) && !empty($_POST['billingSearch']) && $_POST['billingSearch'] == 1){
		$billNo = "";
		$xDate = "";
		$stat = "";

		// TRANSACTION DATE
		if(!empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtFrom'],"Y-m-d");
			$dtto = dateFormat($_POST['txtTo'],"Y-m-d");
			$xDate = " AND billedDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else if(!empty($_POST['txtFrom']) && empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtFrom'],"Y-m-d");
			$dtto = dateFormat($_POST['txtFrom'],"Y-m-d");
			$xDate = " AND billedDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else if(empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtTo'],"Y-m-d");
			$dtto = dateFormat($_POST['txtTo'],"Y-m-d");
			$xDate = " AND billedDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else{ }

		// DELIVERY NO
		if(isset($_POST['txtBillingNo']) && !empty($_POST['txtBillingNo'])){
			$billCode = $_POST['txtBillingNo'];
			$billNo = " AND billingReferenceNo = '$billCode'";
		}

		// STATUS
		if(isset($_POST['txtStatus']) && !empty($_POST['txtStatus']) || $_POST['txtStatus'] != ""){
			$status = $_POST['txtStatus'];
			$stat = " AND status = '$status'";
		}

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET BILLING
		$billingmst = new Table();
		$billingmst->setSQLType($csdb->getSQLType());
		$billingmst->setInstance($csdb->getInstance());
		$billingmst->setView("billingmaster_v");
		$billingmst->setParam("WHERE 1 $billNo $xDate $stat ORDER BY billedDate");
		$billingmst->doQuery("query");
		$row_billingmst = $billingmst->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END SEARCH BILLING
?>
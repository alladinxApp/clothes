<?
	$id = $_GET['id'];

	$billid = $id != "" ? " AND billingReferenceNo = '$id'" : "";

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET BILLING MST
	$billingmst = new Table();
	$billingmst->setSQLType($csdb->getSQLType());
	$billingmst->setInstance($csdb->getInstance());
	$billingmst->setView("billingmaster_v");
	$billingmst->setParam("WHERE status IN(1) AND balance > 0 $billid");
	$billingmst->doQuery("query");
	$row_billingmst = $billingmst->getLists();

	if(!empty($id)){
		// SET BILLING DTL
		$billingdtl = new Table();
		$billingdtl->setSQLType($csdb->getSQLType());
		$billingdtl->setInstance($csdb->getInstance());
		$billingdtl->setView("billingdetail_v");
		$billingdtl->setParam("WHERE billingReferenceNo = '$id'");
		$billingdtl->doQuery("query");
		$row_billingdtl = $billingdtl->getLists();
	}

	// SET AR MST
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setView("armaster_v");
	$armst->setParam("WHERE billingReferenceNo = '$id' AND tender > 0");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<?
	$id = $_GET['id'];

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERIES
	$deliveries = new Table();
	$deliveries->setSQLType($csdb->getSQLType());
	$deliveries->setInstance($csdb->getInstance());
	$deliveries->setView("deliverymaster_v");
	$deliveries->setParam("WHERE jobOrderReferenceNo = '$id'");
	$deliveries->doQuery("query");
	$row_deliveries = $deliveries->getLists();

	// SET JOB ORDERS
	$joborders = new Table();
	$joborders->setSQLType($csdb->getSQLType());
	$joborders->setInstance($csdb->getInstance());
	$joborders->setView("jobordermaster_v");
	$joborders->setParam("WHERE jobOrderReferenceNo = '$id'");
	$joborders->doQuery("query");
	$row_joborders = $joborders->getLists();

	$dpamnt = 0;
	if($row_joborders[0]['downPayment'] > 0){
		$dpamnt = $row_joborders[0]['downPayment'];
	}

	// SET BILLING
	$billingmst = new Table();
	$billingmst->setSQLType($csdb->getSQLType());
	$billingmst->setInstance($csdb->getInstance());
	$billingmst->setView("billingmaster_v");
	$billingmst->setParam("WHERE status IN(0)");
	$billingmst->doQuery("query");
	$row_billingmst = $billingmst->getLists();
	
	// CLOSE DB
	$csdb->DBClose();
?>
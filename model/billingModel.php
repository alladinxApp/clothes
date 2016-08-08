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
	$deliveries->setParam("WHERE jobOrderReferenceNo = '$id' AND status = 1");
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
	if($row_joborders[0]['downPayment'] > 0 && $row_joborders[0]['isAppliedDP'] == 0){
		$dpamnt = $row_joborders[0]['downPayment'];
	}
	
	// CLOSE DB
	$csdb->DBClose();
?>
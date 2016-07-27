<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB ORDERS
	$joborders = new Table();
	$joborders->setSQLType($csdb->getSQLType());
	$joborders->setInstance($csdb->getInstance());
	$joborders->setView("jobordermaster_v");
	$joborders->setParam("WHERE status = '0' ORDER BY createdDate DESC");
	$joborders->doQuery("query");
	$row_joborders = $joborders->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
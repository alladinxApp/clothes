<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERIES
	$joborders = new Table();
	$joborders->setSQLType($csdb->getSQLType());
	$joborders->setInstance($csdb->getInstance());
	$joborders->setView("jobordermaster_v");
	$joborders->setParam("WHERE status = '1' ORDER BY createdDate");
	$joborders->doQuery("query");
	$row_joborders = $joborders->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB TYPE
	$jobtype = new Table();
	$jobtype->setSQLType($csdb->getSQLType());
	$jobtype->setInstance($csdb->getInstance());
	$jobtype->setView("jobTypeMaster_V");
	$jobtype->setParam("ORDER BY description");
	$jobtype->doQuery("query");
	$row_jobtype = $jobtype->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
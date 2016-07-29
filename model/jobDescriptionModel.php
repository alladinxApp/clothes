<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB DESCRIPTION
	$jobdescription = new Table();
	$jobdescription->setSQLType($csdb->getSQLType());
	$jobdescription->setInstance($csdb->getInstance());
	$jobdescription->setView("jobdescriptionmaster_v");
	$jobdescription->setParam("ORDER BY description");
	$jobdescription->doQuery("query");
	$row_jobdescription = $jobdescription->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
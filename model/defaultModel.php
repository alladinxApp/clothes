<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET ESTIMATES
	$estimates = new Table();
	$estimates->setSQLType($csdb->getSQLType());
	$estimates->setInstance($csdb->getInstance());
	$estimates->setView("estimatemaster_v");
	$estimates->setParam("WHERE status = '0'");
	$estimates->doQuery("query");
	$num_estimates = $estimates->getNumRows();

	// SET JOB ORDERS
	$joborders = new Table();
	$joborders->setSQLType($csdb->getSQLType());
	$joborders->setInstance($csdb->getInstance());
	$joborders->setView("jobordermaster_v");
	$joborders->setParam("WHERE status = '0'");
	$joborders->doQuery("query");
	$num_joborders = $joborders->getNumRows();

	// SET JOB ORDERS
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setCol("SUM(balance) as amount");
	$armst->setView("armaster_v");
	$armst->setParam("WHERE status = '0'");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
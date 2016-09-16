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
	$row_joborders = $joborders->getLists();

	// SET AR
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setView("armaster_v");
	$armst->setParam("WHERE status = '0'");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	$amount = 0;
	for($i=0;$i<count($row_armst);$i++){
		$amount += $row_armst[$i]['balance'];
	}

	// SET REMINDER MST
	$remindermst = new Table();
	$remindermst->setSQLType($csdb->getSQLType());
	$remindermst->setInstance($csdb->getInstance());
	$remindermst->setView("remindermaster_v");
	$remindermst->setParam("WHERE status = 0 ORDER BY createdDate");
	$remindermst->doQuery("query");
	$row_remindermst = $remindermst->getLists();

	// SET BILLING MST
	$billingmst = new Table();
	$billingmst->setSQLType($csdb->getSQLType());
	$billingmst->setInstance($csdb->getInstance());
	$billingmst->setView("billingmaster_v");
	$billingmst->setParam("WHERE status IN(1)");
	$billingmst->doQuery("query");
	$row_billingmst = $billingmst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
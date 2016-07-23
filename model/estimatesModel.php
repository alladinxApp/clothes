<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET ESTIMATES
	$estimates = new Table();
	$estimates->setSQLType($csdb->getSQLType());
	$estimates->setInstance($csdb->getInstance());
	$estimates->setView("estimatemaster_v");
	$estimates->setParam("WHERE status = '0' ORDER BY transactionDate DESC");
	$estimates->doQuery("query");
	$row_estimates = $estimates->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
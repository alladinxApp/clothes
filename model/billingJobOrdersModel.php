<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB ORDERS
	$billingjos = new Table();
	$billingjos->setSQLType($csdb->getSQLType());
	$billingjos->setInstance($csdb->getInstance());
	$billingjos->setView("jobordermaster_v");
	$billingjos->setParam("WHERE jobordermaster_v.status = 1 AND jobOrderReferenceNo IN(SELECT jobOrderReferenceNo FROM deliverymaster_v WHERE deliverymaster_v.status = 1) AND total_qty = 0");
	$billingjos->doQuery("query");
	$row_billingjos = $billingjos->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
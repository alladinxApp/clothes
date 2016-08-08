<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB ORDERS
	$billingjos = new Table();
	$billingjos->setSQLType($csdb->getSQLType());
	$billingjos->setInstance($csdb->getInstance());
	$billingjos->setView("jobordermaster_v");
	$billingjos->setParam("WHERE jobOrderReferenceNo IN(SELECT jobOrderReferenceNo FROM deliverymaster_v WHERE deliverymaster_v.status = 1)");
	$billingjos->doQuery("query");
	$row_billingjos = $billingjos->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET CUSTOMER
	$customer = new Table();
	$customer->setSQLType($csdb->getSQLType());
	$customer->setInstance($csdb->getInstance());
	$customer->setView("customersmaster_v");
	$customer->setParam("ORDER BY customerName");
	$customer->doQuery("query");
	$row_customer = $customer->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
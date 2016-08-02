<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERIES
	$deliveries = new Table();
	$deliveries->setSQLType($csdb->getSQLType());
	$deliveries->setInstance($csdb->getInstance());
	$deliveries->setView("deliverymaster_v");
	$deliveries->setParam("WHERE status = '0' ORDER BY createdDate");
	$deliveries->doQuery("query");
	$row_deliveries = $deliveries->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
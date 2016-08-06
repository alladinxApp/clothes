<?
	$id = $_GET['id'];

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERIES
	$deliveries = new Table();
	$deliveries->setSQLType($csdb->getSQLType());
	$deliveries->setInstance($csdb->getInstance());
	$deliveries->setView("deliverymaster_v");
	$deliveries->setParam("WHERE customerCode = '$id' AND status = 1");
	$deliveries->doQuery("query");
	$row_deliveries = $deliveries->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
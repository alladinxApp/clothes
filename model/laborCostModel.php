<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET LABOR COST
	$laborcosts = new Table();
	$laborcosts->setSQLType($csdb->getSQLType());
	$laborcosts->setInstance($csdb->getInstance());
	$laborcosts->setView("laborcostsmaster_v");
	$laborcosts->setParam("ORDER BY description");
	$laborcosts->doQuery("query");
	$row_laborcosts = $laborcosts->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
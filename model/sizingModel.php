<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET SIZING
	$sizing = new Table();
	$sizing->setSQLType($csdb->getSQLType());
	$sizing->setInstance($csdb->getInstance());
	$sizing->setView("sizingMaster_V");
	$sizing->setParam("ORDER BY description");
	$sizing->doQuery("query");
	$row_sizing = $sizing->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
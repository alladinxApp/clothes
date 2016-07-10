<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET MENU
	$menu = new Table();
	$menu->setSQLType($csdb->getSQLType());
	$menu->setInstance($csdb->getInstance());
	$menu->setView("menumaster_v");
	$menu->setParam("ORDER BY description");
	$menu->doQuery("query");
	$row_menu = $menu->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
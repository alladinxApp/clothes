<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET MATERIAL
	$material = new Table();
	$material->setSQLType($csdb->getSQLType());
	$material->setInstance($csdb->getInstance());
	$material->setView("materialMaster_V");
	$material->setParam("ORDER BY description");
	$material->doQuery("query");
	$row_material = $material->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
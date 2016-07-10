<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET UOM
	$uom = new Table();
	$uom->setSQLType($csdb->getSQLType());
	$uom->setInstance($csdb->getInstance());
	$uom->setView("uommaster_v");
	$uom->setParam("ORDER BY description");
	$uom->doQuery("query");
	$row_uom = $uom->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// INSERT NEW CONTROL NO
	$ctrlno = new Table();
	$ctrlno->setSQLType($csdb->getSQLType());
	$ctrlno->setInstance($csdb->getInstance());
	$ctrlno->setView("controlNo_V");
	$ctrlno->setParam("ORDER BY description");
	$ctrlno->doQuery("query");
	$row_ctrlno = $ctrlno->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
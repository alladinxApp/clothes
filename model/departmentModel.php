<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DEPARTMENT
	$department = new Table();
	$department->setSQLType($csdb->getSQLType());
	$department->setInstance($csdb->getInstance());
	$department->setView("departmentmaster_v");
	$department->setParam("ORDER BY description");
	$department->doQuery("query");
	$row_department = $department->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET EMPLOYEE
	$employee = new Table();
	$employee->setSQLType($csdb->getSQLType());
	$employee->setInstance($csdb->getInstance());
	$employee->setView("jolaborcostsmaster_v");
	$employee->setCol("DISTINCT jolaborcostsmaster_v.employeeName");
	$employee->setParam("ORDER BY employeeName");
	$employee->doQuery("query");
	$row_employee = $employee->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
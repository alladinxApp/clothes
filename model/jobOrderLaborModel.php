<?
	$id = $_GET['id'];
	$deptcode = $_GET['deptcode'];
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB ORDER DEPARTMENT
	$jodept = new Table();
	$jodept->setSQLType($csdb->getSQLType());
	$jodept->setInstance($csdb->getInstance());
	$jodept->setView("joborderdepartment_v");
	$jodept->setParam("WHERE jobOrderReferenceNo = '$id' AND departmentCode = '$deptcode'");
	$jodept->doQuery("query");
	$row_jodept = $jodept->getLists();
	$jodeptid = $row_jodept[0]['id'];

	// SET JOB ORDER LABORS
	$jolabor = new Table();
	$jolabor->setSQLType($csdb->getSQLType());
	$jolabor->setInstance($csdb->getInstance());
	$jolabor->setView("jolaborcostsmaster_v");
	$jolabor->setParam("WHERE jobOrderDepartmentId = '$jodeptid' ORDER BY createdDate DESC");
	$jolabor->doQuery("query");
	$row_jolabor = $jolabor->getLists();

	$deptname = $row_jodept[0]['departmentName'];

	// CLOSE DB
	$csdb->DBClose();
?>
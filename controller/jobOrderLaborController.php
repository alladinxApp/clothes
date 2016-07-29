<?
	// ADD NEW LABOR TO EMPLOYEE
	if(isset($_GET['add']) && !empty($_GET['add']) && $_GET['add'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET JOB ORDER MASTER
		$jolabormst = new Table();
		$jolabormst->setSQLType($csdb->getSQLType());
		$jolabormst->setInstance($csdb->getInstance());
		$jolabormst->setView("jolaborcostsmaster_v");
		$jolabormst->setParam("WHERE id = '$id'");
		$jolabormst->doQuery("query");
		$row_jolabormst = $jolabormst->getLists();

		// SET JOB ORDER DETAIL
		$jolabordtl = new Table();
		$jolabordtl->setSQLType($csdb->getSQLType());
		$jolabordtl->setInstance($csdb->getInstance());
		$jolabordtl->setView("jolaborcostsdetail_v");
		$jolabordtl->setParam("WHERE joLaborCostMasterId = '$id'");
		$jolabordtl->doQuery("query");
		$row_jolabordtl = $jolabordtl->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END ADD NEW LABOR TO EMPLOYEE

	// DELETE EMPLOYEE LABOR
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];
		$jono = $_GET['jono'];
		$deptcode = $_GET['deptcode'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETING EMPLOYEE LABOR DETAIL
		$jolabordtl = new Table();
		$jolabordtl->setSQLType($csdb->getSQLType());
		$jolabordtl->setInstance($csdb->getInstance());
		$jolabordtl->setTable("jolaborcostsdetail");
		$jolabordtl->setParam("WHERE joLaborCostMasterId = '$id'");
		$jolabordtl->doQuery("delete");

		// DELETING EMPLOYEE LABOR MASTER
		$jolabormst = new Table();
		$jolabormst->setSQLType($csdb->getSQLType());
		$jolabormst->setInstance($csdb->getInstance());
		$jolabormst->setTable("jolaborcostsmaster");
		$jolabormst->setParam("WHERE id = '$id'");
		$jolabormst->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();

		$alert = new MessageAlert();
		$alert->setMessage("Employee labor successfully deleted.");
		$alert->setURL(BASE_URL . "joborder_labors.php?id=".$jono."&deptcode=".$deptcode);
		$alert->Alert();
	}
	// END DELETE EMPLOYEE LABOR
?>
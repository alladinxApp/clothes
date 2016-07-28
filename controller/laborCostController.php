<?
	// SAVE LABOR COSTS
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];
		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('LABORCOSTS');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW LABOR COSTS
		$laborcosts = new Table();
		$laborcosts->setSQLType($csdb->getSQLType());
		$laborcosts->setInstance($csdb->getInstance());
		$laborcosts->setTable("laborcostsmaster");
		$laborcosts->setField("laborCostsCode,description,createdDate,createdBy");
		$laborcosts->setValues("'$newNum','$description','$today','$userid'");
		$laborcosts->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('LABORCOSTS');

		$alert = new MessageAlert();
		$alert->setMessage("New Labor costs successfully saved.");
		$alert->setURL(BASE_URL . "laborcosts.php");
		$alert->Alert();
	}
	// END SAVE LABOR COSTS
	// UPDATE DEPARTMENT
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$desc = $_POST['txtDescription'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE LABOR COSTS
		$laborcosts = new Table();
		$laborcosts->setSQLType($csdb->getSQLType());
		$laborcosts->setInstance($csdb->getInstance());
		$laborcosts->setTable("laborcostsmaster");
		$laborcosts->setValues("description = '$desc', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$laborcosts->setParam("WHERE id = '$id'");
		$laborcosts->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Labor Costs successfully updated.");
		$alert->setURL(BASE_URL . "laborcost_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE DEPARTMENT
	// DELETE DEPARTMENT
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE LABOR COSTS
		$laborcosts = new Table();
		$laborcosts->setSQLType($csdb->getSQLType());
		$laborcosts->setInstance($csdb->getInstance());
		$laborcosts->setTable("laborcostsmaster");
		$laborcosts->setParam("WHERE id = '$id'");
		$laborcosts->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Labor Costs successfully deleted.");
		$alert->setURL(BASE_URL . "laborcosts.php");
		$alert->Alert();
	}
	// END DELETE DEPARTMENT
	// EDIT DEPARTMENT
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];
		
		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET LABOR COSTS
		$laborcosts = new Table();
		$laborcosts->setSQLType($csdb->getSQLType());
		$laborcosts->setInstance($csdb->getInstance());
		$laborcosts->setView("laborcostsmaster_v");
		$laborcosts->setParam("WHERE id = '$id'");
		$laborcosts->doQuery("query");
		$row_laborcosts = $laborcosts->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT DEPARTMENT
?>
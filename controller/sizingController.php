<?
	// SAVE SIZING
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];

		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('SIZING');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW SIZING
		$sizing = new Table();
		$sizing->setSQLType($csdb->getSQLType());
		$sizing->setInstance($csdb->getInstance());
		$sizing->setTable("sizingMaster");
		$sizing->setField("sizingCode,description,createdDate,createdBy");
		$sizing->setValues("'$newNum','$description','$today','$userid'");
		$sizing->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('SIZING');

		$alert = new MessageAlert();
		$alert->setMessage("New Sizing successfully saved.");
		$alert->setURL(BASE_URL . "sizings.php");
		$alert->Alert();
	}
	// END SAVE SIZING
	// UPDATE SIZING
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtDescription'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE SIZING
		$sizing = new Table();
		$sizing->setSQLType($csdb->getSQLType());
		$sizing->setInstance($csdb->getInstance());
		$sizing->setTable("sizingMaster");
		$sizing->setValues("description = '$description', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$sizing->setParam("WHERE id = '$id'");
		$sizing->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Sizing successfully updated.");
		$alert->setURL(BASE_URL . "sizing_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE SIZING
	// DELETE SIZING
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE SIZING
		$sizing = new Table();
		$sizing->setSQLType($csdb->getSQLType());
		$sizing->setInstance($csdb->getInstance());
		$sizing->setTable("sizingMaster");
		$sizing->setParam("WHERE id = '$id'");
		$sizing->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Sizing successfully deleted.");
		$alert->setURL(BASE_URL . "sizings.php");
		$alert->Alert();
	}
	// END DELETE SIZING
	// EDIT SIZING
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET SIZING
		$sizing = new Table();
		$sizing->setSQLType($csdb->getSQLType());
		$sizing->setInstance($csdb->getInstance());
		$sizing->setView("sizingMaster_V");
		$sizing->setParam("WHERE id = '$id'");
		$sizing->doQuery("query");
		$row_sizing = $sizing->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT SIZING
?>
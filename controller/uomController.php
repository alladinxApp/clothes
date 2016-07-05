<?
	// SAVE UOM
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];

		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('UOM');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW UOM
		$uom = new Table();
		$uom->setSQLType($csdb->getSQLType());
		$uom->setInstance($csdb->getInstance());
		$uom->setTable("uomMaster");
		$uom->setField("UOMCode,description,createdDate,createdBy");
		$uom->setValues("'$newNum','$description','$today','$userid'");
		$uom->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('UOM');

		$alert = new MessageAlert();
		$alert->setMessage("New UOM successfully saved.");
		$alert->setURL(BASE_URL . "uoms.php");
		$alert->Alert();
	}
	// END SAVE UOM
	// UPDATE UOM
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtDescription'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE UOM
		$uom = new Table();
		$uom->setSQLType($csdb->getSQLType());
		$uom->setInstance($csdb->getInstance());
		$uom->setTable("uomMaster");
		$uom->setValues("description = '$description', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$uom->setParam("WHERE id = '$id'");
		$uom->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("UOM successfully updated.");
		$alert->setURL(BASE_URL . "uom_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE UOM
	// DELETE UOM
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE UOM
		$uom = new Table();
		$uom->setSQLType($csdb->getSQLType());
		$uom->setInstance($csdb->getInstance());
		$uom->setTable("uomMaster");
		$uom->setParam("WHERE id = '$id'");
		$uom->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("UOM successfully deleted.");
		$alert->setURL(BASE_URL . "uoms.php");
		$alert->Alert();
	}
	// END DELETE UOM
	// EDIT UOM
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET UOM
		$uom = new Table();
		$uom->setSQLType($csdb->getSQLType());
		$uom->setInstance($csdb->getInstance());
		$uom->setView("uomMaster_V");
		$uom->setParam("WHERE id = '$id'");
		$uom->doQuery("query");
		$row_uom = $uom->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT UOM
?>
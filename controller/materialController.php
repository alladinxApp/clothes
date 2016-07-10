<?
	// SAVE MATERIAL
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];

		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('MATERIAL');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW MATERIAL
		$material = new Table();
		$material->setSQLType($csdb->getSQLType());
		$material->setInstance($csdb->getInstance());
		$material->setTable("materialmaster");
		$material->setField("materialCode,description,createdDate,createdBy");
		$material->setValues("'$newNum','$description','$today','$userid'");
		$material->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('MATERIAL');

		$alert = new MessageAlert();
		$alert->setMessage("New Material successfully saved.");
		$alert->setURL(BASE_URL . "materials.php");
		$alert->Alert();
	}
	// END SAVE MATERIAL
	// UPDATE MATERIAL
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtDescription'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE MATERIAL
		$material = new Table();
		$material->setSQLType($csdb->getSQLType());
		$material->setInstance($csdb->getInstance());
		$material->setTable("materialmaster");
		$material->setValues("description = '$description', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$material->setParam("WHERE id = '$id'");
		$material->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Material successfully updated.");
		$alert->setURL(BASE_URL . "material_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE MATERIAL
	// DELETE MATERIAL
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE MATERIAL
		$material = new Table();
		$material->setSQLType($csdb->getSQLType());
		$material->setInstance($csdb->getInstance());
		$material->setTable("materialmaster");
		$material->setParam("WHERE id = '$id'");
		$material->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Material successfully deleted.");
		$alert->setURL(BASE_URL . "materials.php");
		$alert->Alert();
	}
	// END DELETE MATERIAL
	// EDIT MATERIAL
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET MATERIAL
		$material = new Table();
		$material->setSQLType($csdb->getSQLType());
		$material->setInstance($csdb->getInstance());
		$material->setView("materialmaster_v");
		$material->setParam("WHERE id = '$id'");
		$material->doQuery("query");
		$row_material = $material->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT MATERIAL
?>
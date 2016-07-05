<?
	// SAVE DEPARTMENT
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDepartmentName'];
		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('DEPARTMENT');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW DEPARTMENT
		$department = new Table();
		$department->setSQLType($csdb->getSQLType());
		$department->setInstance($csdb->getInstance());
		$department->setTable("departmentMaster");
		$department->setField("departmentCode,description,createdDate,createdBy");
		$department->setValues("'$newNum','$description','$today','$userid'");
		$department->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('DEPARTMENT');

		$alert = new MessageAlert();
		$alert->setMessage("New Department successfully saved.");
		$alert->setURL(BASE_URL . "departments.php");
		$alert->Alert();
	}
	// END SAVE DEPARTMENT
	// UPDATE DEPARTMENT
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$desc = $_POST['txtDepartmentName'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE DEPARTMENT
		$department = new Table();
		$department->setSQLType($csdb->getSQLType());
		$department->setInstance($csdb->getInstance());
		$department->setTable("departmentMaster");
		$department->setValues("description = '$desc', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$department->setParam("WHERE id = '$id'");
		$department->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Department successfully updated.");
		$alert->setURL(BASE_URL . "department_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE DEPARTMENT
	// DELETE DEPARTMENT
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE DEPARTMENT
		$department = new Table();
		$department->setSQLType($csdb->getSQLType());
		$department->setInstance($csdb->getInstance());
		$department->setTable("departmentMaster");
		$department->setParam("WHERE id = '$id'");
		$department->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Department successfully deleted.");
		$alert->setURL(BASE_URL . "departments.php");
		$alert->Alert();
	}
	// END DELETE DEPARTMENT
	// EDIT DEPARTMENT
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];
		
		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET DEPARTMENT
		$department = new Table();
		$department->setSQLType($csdb->getSQLType());
		$department->setInstance($csdb->getInstance());
		$department->setView("departmentMaster_V");
		$department->setParam("WHERE id = '$id'");
		$department->doQuery("query");
		$row_department = $department->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT DEPARTMENT
?>
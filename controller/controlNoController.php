<?
	// SAVE CONTROL NO
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];
		$type = $_POST['txtType'];
		$code = $_POST['txtCode'];
		$noofdigit = $_POST['txtNoOfDigit'];
		$remarks = $_POST['txtRemarks'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW CONTROL NO
		$ctrlno = new Table();
		$ctrlno->setSQLType($csdb->getSQLType());
		$ctrlno->setInstance($csdb->getInstance());
		$ctrlno->setTable("controlno");
		$ctrlno->setField("description,controlType,controlCode,noOfDigit,remarks,createdDate,createdBy");
		$ctrlno->setValues("'$description','$type','$code','$noofdigit','$remarks','$today','$userid'");
		$ctrlno->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("New control no successfully saved.");
		$alert->setURL(BASE_URL . "controlnos.php");
		$alert->Alert();

	}
	// END SAVE CONTROL NO
	// UPDATE CONTROL NO
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtDescription'];
		$type = $_POST['txtType'];
		$code = $_POST['txtCode'];
		$noofdigit = $_POST['txtNoOfDigit'];
		$remarks = $_POST['txtRemarks'];
		$lastDigit = $_POST['txtLastDigit'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE CONTROL NO
		$ctrlno = new Table();
		$ctrlno->setSQLType($csdb->getSQLType());
		$ctrlno->setInstance($csdb->getInstance());
		$ctrlno->setTable("controlno");
		$ctrlno->setValues("description = '$description', controlType = '$type', controlCode = '$code', lastDigit = '$lastDigit', noOfDigit = '$noofdigit', remarks = '$remarks', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$ctrlno->setParam("WHERE id = '$id'");
		$ctrlno->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Control No successfully updated.");
		$alert->setURL(BASE_URL . "controlno_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE CONTROL NO
	// DELETE CONTROL NO
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE NEW CONTROL NO
		$ctrlno = new Table();
		$ctrlno->setSQLType($csdb->getSQLType());
		$ctrlno->setInstance($csdb->getInstance());
		$ctrlno->setTable("controlno");
		$ctrlno->setParam("WHERE id = '$id'");
		$ctrlno->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Control No successfully deleted.");
		$alert->setURL(BASE_URL . "controlnos.php");
		$alert->Alert();
	}
	// END DELETE CONTROL NO
	// EDIT CONTROL NO
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET CONTROL NO
		$ctrlno = new Table();
		$ctrlno->setSQLType($csdb->getSQLType());
		$ctrlno->setInstance($csdb->getInstance());
		$ctrlno->setView("controlno_v");
		$ctrlno->setParam("WHERE id = '$id'");
		$ctrlno->doQuery("query");
		$row_ctrlno = $ctrlno->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT CONTROL NO
?>
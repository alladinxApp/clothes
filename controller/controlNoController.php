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
		$ctrlno->setTable("controlNo");
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
		
	}
	// END UPDATE CONTROL NO
	// DELETE CONTROL NO
	if(isset($_POST['delete']) && !empty($_POST['delete']) && $_POST['delete'] == 1){
		
	}
	// END DELETE CONTROL NO
	// EDIT CONTROL NO
	if(isset($_POST['edit']) && !empty($_POST['edit']) && $_POST['edit'] == 1){
		
	}
	// END EDIT CONTROL NO
?>
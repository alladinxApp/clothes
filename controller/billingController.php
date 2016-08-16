<?
	// SAVE BILLING
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		// GET CONTROL NO
		$newNum = getNewCtrlNo("BILLING");

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW CONTROL NO
		$ctrlno = new Table();
		$ctrlno->setSQLType($csdb->getSQLType());
		$ctrlno->setInstance($csdb->getInstance());
		$ctrlno->setTable("billingmaster");
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
	// END SAVE BILLING
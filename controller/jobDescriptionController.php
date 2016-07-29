<?
	// SAVE JOB DESCRIPTION
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];
		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('JOBDESCRIPTION');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW JOB DESCRIPTION
		$jobdescription = new Table();
		$jobdescription->setSQLType($csdb->getSQLType());
		$jobdescription->setInstance($csdb->getInstance());
		$jobdescription->setTable("jobdescriptionmaster");
		$jobdescription->setField("jobDescriptionCode,description,createdDate,createdBy");
		$jobdescription->setValues("'$newNum','$description','$today','$userid'");
		$jobdescription->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('JOBDESCRIPTION');

		$alert = new MessageAlert();
		$alert->setMessage("New Job Description successfully saved.");
		$alert->setURL(BASE_URL . "jobdescriptions.php");
		$alert->Alert();
	}
	// END SAVE JOB DESCRIPTION
	// UPDATE JOB DESCRIPTION
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$desc = $_POST['txtDescription'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE JOB DESCRIPTION
		$jobdescription = new Table();
		$jobdescription->setSQLType($csdb->getSQLType());
		$jobdescription->setInstance($csdb->getInstance());
		$jobdescription->setTable("jobdescriptionmaster");
		$jobdescription->setValues("description = '$desc', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$jobdescription->setParam("WHERE id = '$id'");
		$jobdescription->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Job Description successfully updated.");
		$alert->setURL(BASE_URL . "jobdescription_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE JOB DESCRIPTION
	// DELETE JOB DESCRIPTION
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE JOB DESCRIPTION
		$jobdescription = new Table();
		$jobdescription->setSQLType($csdb->getSQLType());
		$jobdescription->setInstance($csdb->getInstance());
		$jobdescription->setTable("jobdescriptionmaster");
		$jobdescription->setParam("WHERE id = '$id'");
		$jobdescription->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Job Description successfully deleted.");
		$alert->setURL(BASE_URL . "jobdescriptions.php");
		$alert->Alert();
	}
	// END DELETE JOB DESCRIPTION
	// EDIT JOB DESCRIPTION
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];
		
		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET JOB DESCRIPTION
		$jobdescription = new Table();
		$jobdescription->setSQLType($csdb->getSQLType());
		$jobdescription->setInstance($csdb->getInstance());
		$jobdescription->setView("jobdescriptionmaster_v");
		$jobdescription->setParam("WHERE id = '$id'");
		$jobdescription->doQuery("query");
		$row_jobdescription = $jobdescription->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT JOB DESCRIPTION
?>
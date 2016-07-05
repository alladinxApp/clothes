<?
	// SAVE JOB TYPE
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtDescription'];
		$leadtime = $_POST['txtLeadTime'];
		$notificationday = $_POST['txtNotificationDay'];
		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('JOBTYPE');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW JOB TYPE
		$jobtype = new Table();
		$jobtype->setSQLType($csdb->getSQLType());
		$jobtype->setInstance($csdb->getInstance());
		$jobtype->setTable("jobTypeMaster");
		$jobtype->setField("jobTypeCode,description,leadTime,notificationDay,createdDate,createdBy");
		$jobtype->setValues("'$newNum','$description','$leadtime','$notificationday','$today','$userid'");
		$jobtype->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('JOBTYPE');

		$alert = new MessageAlert();
		$alert->setMessage("New Job Type successfully saved.");
		$alert->setURL(BASE_URL . "jobtypes.php");
		$alert->Alert();
	}
	// END SAVE JOB TYPE
	// UPDATE JOB TYPE
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtDescription'];
		$leadtime = $_POST['txtLeadTime'];
		$notificationday = $_POST['txtNotificationDay'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE JOB TYPE
		$jobtype = new Table();
		$jobtype->setSQLType($csdb->getSQLType());
		$jobtype->setInstance($csdb->getInstance());
		$jobtype->setTable("jobTypeMaster");
		$jobtype->setValues("description = '$description', leadTime = '$leadtime', notificationDay = '$notificationday', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$jobtype->setParam("WHERE id = '$id'");
		$jobtype->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Job Type successfully updated.");
		$alert->setURL(BASE_URL . "jobtype_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE JOB TYPE
	// DELETE JOB TYPE
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE JOB TYPE
		$jobtype = new Table();
		$jobtype->setSQLType($csdb->getSQLType());
		$jobtype->setInstance($csdb->getInstance());
		$jobtype->setTable("jobTypeMaster");
		$jobtype->setParam("WHERE id = '$id'");
		$jobtype->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Job Type successfully deleted.");
		$alert->setURL(BASE_URL . "jobtypes.php");
		$alert->Alert();
	}
	// END DELETE JOB TYPE
	// EDIT JOB TYPE
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET JOB TYPE
		$jobtype = new Table();
		$jobtype->setSQLType($csdb->getSQLType());
		$jobtype->setInstance($csdb->getInstance());
		$jobtype->setView("jobTypeMaster_V");
		$jobtype->setParam("WHERE id = '$id'");
		$jobtype->doQuery("query");
		$row_jobtype = $jobtype->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT JOB TYPE
?>
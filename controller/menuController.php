<?
	// SAVE MENU
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtMenuName'];
		$isMaintenance = $_POST['txtIsMaintenance'];
		$isTransactions = $_POST['txtIsTransactions'];
		$isReports = $_POST['txtIsReports'];
		$link = $_POST['txtMenuLink'];

		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('MENU');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW MENU
		$menu = new Table();
		$menu->setSQLType($csdb->getSQLType());
		$menu->setInstance($csdb->getInstance());
		$menu->setTable("menuMaster");
		$menu->setField("menuCode,description,link,isMaintenance,isTransactions,isReports,createdDate,createdBy");
		$menu->setValues("'$newNum','$description','$link','$isMaintenance','$isTransactions','$isReports','$today','$userid'");
		$menu->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('MENU');

		$alert = new MessageAlert();
		$alert->setMessage("New Menu successfully saved.");
		$alert->setURL(BASE_URL . "menus.php");
		$alert->Alert();
	}
	// END SAVE MENU
	// UPDATE MENU
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtMenuName'];
		$isMaintenance = $_POST['txtIsMaintenance'];
		$isTransactions = $_POST['txtIsTransactions'];
		$isReports = $_POST['txtIsReports'];
		$link = $_POST['txtMenuLink'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE MATERIAL
		$menu = new Table();
		$menu->setSQLType($csdb->getSQLType());
		$menu->setInstance($csdb->getInstance());
		$menu->setTable("menuMaster");
		$menu->setValues("description = '$description', link = '$link', isMaintenance = '$isMaintenance', isTransactions = '$isTransactions', isReports = '$isReports', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$menu->setParam("WHERE id = '$id'");
		$menu->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Menu successfully updated.");
		$alert->setURL(BASE_URL . "menu_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE MENU
	// DELETE MENU
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE MENU
		$menu = new Table();
		$menu->setSQLType($csdb->getSQLType());
		$menu->setInstance($csdb->getInstance());
		$menu->setTable("menuMaster");
		$menu->setParam("WHERE id = '$id'");
		$menu->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Menu successfully deleted.");
		$alert->setURL(BASE_URL . "menus.php");
		$alert->Alert();
	}
	// END DELETE MENU
	// EDIT MENU
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET MATERIAL
		$menu = new Table();
		$menu->setSQLType($csdb->getSQLType());
		$menu->setInstance($csdb->getInstance());
		$menu->setView("menuMaster_V");
		$menu->setParam("WHERE id = '$id'");
		$menu->doQuery("query");
		$row_menu = $menu->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT MENU
?>
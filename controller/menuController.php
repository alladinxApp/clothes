<?
	// SAVE MENU
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = $_POST['txtMenuName'];
		$isMaintenance = $_POST['txtIsMaintenance'];
		$isTransactions = $_POST['txtIsTransactions'];
		$isReports = $_POST['txtIsReports'];
		$link = $_POST['txtMenuLink'];
		$icon = $_POST['txtMenuIcon'];
		$sortNo = $_POST['txtSortNo'];

		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('MENU');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW MENU
		$menu = new Table();
		$menu->setSQLType($csdb->getSQLType());
		$menu->setInstance($csdb->getInstance());
		$menu->setTable("menumaster");
		$menu->setField("menuCode,description,link,icon,isMaintenance,isTransactions,isReports,sortNo,createdDate,createdBy");
		$menu->setValues("'$newNum','$description','$link','$icon','$isMaintenance','$isTransactions','$isReports','$sortNo','$today','$userid'");
		$menu->doQuery("save");

		// GET ADMIN USER
		$adminuser = new Table();
		$adminuser->setSQLType($csdb->getSQLType());
		$adminuser->setInstance($csdb->getInstance());
		$adminuser->setView("usermaster_v");
		$adminuser->setParam("WHERE userType = 1");
		$adminuser->doQuery("query");
		$row_adminuser = $adminuser->getLists();
		$num_adminuser = $adminuser->getNumRows();

		if($num_adminuser > 0){
			for($i=0;$i<count($row_adminuser);$i++){
				$user = $row_adminuser[$i]['userName'];
				
				// INSERT USER MENU ACCESS
				$usermenu = new Table();
				$usermenu->setSQLType($csdb->getSQLType());
				$usermenu->setInstance($csdb->getInstance());
				$usermenu->setTable("usermenuaccess");
				$usermenu->setField("userName,menuCode");
				$usermenu->setValues("'$user','$newNum'");
				$usermenu->doQuery("save");
			}
		}

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
		$icon = $_POST['txtMenuIcon'];
		$status = $_POST['txtStatus'];
		$sortNo = $_POST['txtSortNo'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE MATERIAL
		$menu = new Table();
		$menu->setSQLType($csdb->getSQLType());
		$menu->setInstance($csdb->getInstance());
		$menu->setTable("menumaster");
		$menu->setValues("description = '$description', link = '$link', icon = '$icon', isMaintenance = '$isMaintenance', isTransactions = '$isTransactions', isReports = '$isReports', sortNo = '$sortNo', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
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
		$menu->setTable("menumaster");
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
		$menu->setView("menumaster_v");
		$menu->setParam("WHERE id = '$id'");
		$menu->doQuery("query");
		$row_menu = $menu->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT MENU
?>
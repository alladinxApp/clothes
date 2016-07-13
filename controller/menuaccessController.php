<?
	// DELETE MENU ACCESS
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$menu = $_GET['menu'];
		$user = $_GET['user'];
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE USER MENU ACCESS
		$usermenu = new Table();
		$usermenu->setSQLType($csdb->getSQLType());
		$usermenu->setInstance($csdb->getInstance());
		$usermenu->setTable("usermenuaccess");
		$usermenu->setParam("WHERE userName = '$user' AND menuCode = '$menu'");
		$usermenu->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Menu Access successfully removed.");
		$alert->setURL(BASE_URL . "usermenuaccess.php?id=".$id);
		$alert->Alert();
	}
	// END DELETE MENU ACCESS
	// SAVE MENU ACCESS
	if(isset($_GET['add']) && !empty($_GET['add']) && $_GET['add'] == 1){
		$menu = $_GET['menu'];
		$user = $_GET['user'];
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT USER MENU ACCESS
		$usermenu = new Table();
		$usermenu->setSQLType($csdb->getSQLType());
		$usermenu->setInstance($csdb->getInstance());
		$usermenu->setTable("usermenuaccess");
		$usermenu->setField("userName,menuCode");
		$usermenu->setValues("'$user','$menu'");
		$usermenu->doQuery("save");
		
		// CLOSE DB
		$csdb->DBClose();

		$alert = new MessageAlert();
		$alert->setMessage("Menu Access successfully added.");
		$alert->setURL(BASE_URL . "usermenuaccess.php?id=".$id);
		$alert->Alert();
	}
	// END SAVE MENU ACCESS
?>
<?
	// SAVE USER
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$username = strtoupper($_POST['txtUsername']);
		$pass = strtoupper($_POST['txtPassword']);
		$password = generatePassword($pass);
		$fullname = strtoupper($_POST['txtFullName']);
		$usertype = $_POST['txtUserType'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// CHECK USER IF EXIST
		$chkUser = new Table();
		$chkUser->setSQLType($csdb->getSQLType());
		$chkUser->setInstance($csdb->getInstance());
		$chkUser->setView("usermaster_v");
		$chkUser->setParam("WHERE userName = '$username'");
		$chkUser->doQuery("query");
		$num_chkUser = $chkUser->getNumRows();

		if($num_chkUser > 0){
			// CLOSE DB
			$csdb->DBClose();
			
			$msge = "Sorry! username ".$username." is already exist. Please select another username.";
			$alert = new MessageAlert();
			$alert->setMessage($msge);
			$alert->setURL(BASE_URL . "user_add.php");
			$alert->Alert();
		}

		// INSERT NEW USER
		$user = new Table();
		$user->setSQLType($csdb->getSQLType());
		$user->setInstance($csdb->getInstance());
		$user->setTable("usermaster");
		$user->setField("userName,passWord,fullName,userType,createdDate,createdBy");
		$user->setValues("'$username','$password','$fullname','$usertype','$today','$userid'");
		$user->doQuery("save");

		// IF ADMINISTRATOR THEN INSERT ALL MENU
		if($usertype == 1){
			// SET MENU
			$menu = new Table();
			$menu->setSQLType($csdb->getSQLType());
			$menu->setInstance($csdb->getInstance());
			$menu->setView("menumaster_v");
			$menu->setParam("WHERE status = 1 ORDER BY description");
			$menu->doQuery("query");
			$row_menu = $menu->getLists();

			for($i=0;$i<count($row_menu);$i++){
				$menu = $row_menu[$i]['menuCode'];

				// INSERT USER MENU ACCESS
				$usermenu = new Table();
				$usermenu->setSQLType($csdb->getSQLType());
				$usermenu->setInstance($csdb->getInstance());
				$usermenu->setTable("usermenuaccess");
				$usermenu->setField("userName,menuCode");
				$usermenu->setValues("'$username','$menu'");
				$usermenu->doQuery("save");
			}

			
		}

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("New user successfully saved.");
		$alert->setURL(BASE_URL . "users.php");
		$alert->Alert();
	}
	// END SAVE USER
	// UPDATE USER
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$fullname = strtoupper($_POST['txtFullName']);
		$usertype = $_POST['txtUserType'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE USER
		$user = new Table();
		$user->setSQLType($csdb->getSQLType());
		$user->setInstance($csdb->getInstance());
		$user->setTable("usermaster");
		$user->setValues("fullName = '$fullname', userType = '$usertype', modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$user->setParam("WHERE id = '$id'");
		$user->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("User successfully updated.");
		$alert->setURL(BASE_URL . "user_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE USER
	// DELETE USER
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// GET USER
		$getuser = new Table();
		$getuser->setSQLType($csdb->getSQLType());
		$getuser->setInstance($csdb->getInstance());
		$getuser->setView("usermaster_v");
		$getuser->setParam("WHERE id = '$id'");
		$getuser->doQuery("query");
		$row_getuser = $getuser->getLists();

		$username = $row_getuser[0]['userName'];
		
		// DELETE USER
		$user = new Table();
		$user->setSQLType($csdb->getSQLType());
		$user->setInstance($csdb->getInstance());
		$user->setTable("usermaster");
		$user->setParam("WHERE id = '$id'");
		$user->doQuery("delete");

		// DELETE USER MENU ACCESS
		$usermenu = new Table();
		$usermenu->setSQLType($csdb->getSQLType());
		$usermenu->setInstance($csdb->getInstance());
		$usermenu->setTable("usermenuaccess");
		$usermenu->setParam("WHERE userName = '$username'");
		$usermenu->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("User successfully deleted.");
		$alert->setURL(BASE_URL . "users.php");
		$alert->Alert();
	}
	// END DELETE USER
	// EDIT USER
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET USER
		$user = new Table();
		$user->setSQLType($csdb->getSQLType());
		$user->setInstance($csdb->getInstance());
		$user->setView("usermaster_v");
		$user->setParam("WHERE id = '$id'");
		$user->doQuery("query");
		$row_user = $user->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT USER
?>
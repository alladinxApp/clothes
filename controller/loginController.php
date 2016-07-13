<?
	// LOGIN
	if(isset($_POST['validateuser']) && !empty($_POST['validateuser']) && $_POST['validateuser'] == 1){
		$username = strtoupper($_POST['txtUsername']);
		$pass = strtoupper($_POST['txtPassword']);
		$password = generatePassword($pass);

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET USER
		$user = new Table();
		$user->setSQLType($csdb->getSQLType());
		$user->setInstance($csdb->getInstance());
		$user->setView("usermaster_v");
		$user->setParam("WHERE userName = '$username'");
		$user->doQuery("query");
		$row_user = $user->getLists();

		// CLOSE DB
		$csdb->DBClose();

		// CHECK USER IF EXISTED
		if(count($row_user) > 0){
			$userpass = $row_user[0]['passWord'];
			
			// CHECK PASSWORD IF MATCHED
			if($userpass == $password){
				$_SESSION['userid'] = $username;
				$_SESSION['userFullName'] = $row_user[0]['fullName'];

				$msge = "Access Granted!";
				$url = BASE_URL;
			}else{
				$msge = "Access denied! Password is incorrect.";
				$url = BASE_URL . "login.php";
			}
		}else{
			$msge = $username . " not found! Please ask the administration for your account access.";
			$url = BASE_URL . "login.php";
		}

		$alert = new MessageAlert();
		$alert->setMessage($msge);
		$alert->setURL($url);
		$alert->Alert();
	}
	// END LOGIN
?>
<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET USER
	$user = new Table();
	$user->setSQLType($csdb->getSQLType());
	$user->setInstance($csdb->getInstance());
	$user->setView("usermaster_v");
	$user->setParam("WHERE userName = '$userid' ORDER BY userName");
	$user->doQuery("query");
	$row_user = $user->getLists();

	// CLOSE DB
	$csdb->DBClose();

	// UPDATE USER PROFILE
	if(isset($_POST['updateProfile']) && !empty($_POST['updateProfile']) && $_POST['updateProfile'] == 1){
		function generatePassword($password){
			$salt = 'ClothesDesignInc';
			$newpass = md5(sha1($salt.$password));
			return $newpass;
		}

		$pass = strtoupper($_POST['txtNewPassword']);
		$password = generatePassword($pass);

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE USER
		$user = new Table();
		$user->setSQLType($csdb->getSQLType());
		$user->setInstance($csdb->getInstance());
		$user->setTable("usermaster");
		$user->setValues("passWord = '$password', changePassDate = '$today'");
		$user->setParam("WHERE userName = '$userid'");
		$user->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();

		$alert = new MessageAlert();
		$alert->setMessage("You profile successfully updated.");
		$alert->setURL(BASE_URL . "user_profile.php");
		$alert->Alert();
	}
?>
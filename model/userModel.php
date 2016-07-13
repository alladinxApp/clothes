<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET USER
	$user = new Table();
	$user->setSQLType($csdb->getSQLType());
	$user->setInstance($csdb->getInstance());
	$user->setView("usermaster_v");
	$user->setParam("ORDER BY userName");
	$user->doQuery("query");
	$row_user = $user->getLists();

	// CLOSE DB
	$csdb->DBClose();

	function generatePassword($password){
		$salt = 'ClothesDesignInc';
		$newpass = md5(sha1($salt.$password));
		return $newpass;
	}
?>
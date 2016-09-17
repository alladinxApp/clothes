<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$user = strtoupper($_GET['u']);
	$pass = strtoupper($_GET['p']);

	function generatePassword($password){
		$salt = 'ClothesDesignInc';
		$newpass = md5(sha1($salt.$password));
		return $newpass;
	}

	$password = generatePassword($pass);
	$corrent = 1;

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET USER
	$umst = new Table();
	$umst->setSQLType($csdb->getSQLType());
	$umst->setInstance($csdb->getInstance());
	$umst->setView("usermaster_v");
	$umst->setParam("WHERE userName = '$user' AND passWord = '$password'");
	$umst->doQuery("query");
	$num_umst = $umst->getNumRows();
	
	// CLOSE DB
	$csdb->DBClose();

	if($num_umst > 0){
		$corrent = 0;
	}
?>
<span id="divOldPassword">
<input type="hidden" name="chkOldPass" id="chkOldPass" value="<?=$corrent;?>" />
<? if($num_umst == 0){ ?>
<span >Password is incorrect!</span>
<? } ?>
</span>

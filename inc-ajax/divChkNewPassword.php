<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$new = strtoupper($_GET['n']);
	$con = strtoupper($_GET['c']);

	function generatePassword($password){
		$salt = 'ClothesDesignInc';
		$newpass = md5(sha1($salt.$password));
		return $newpass;
	}

	$npassword = generatePassword($new);
	$cpassword = generatePassword($con);
	$correct = 1;

	if($npassword == $cpassword){
		$correct = 0;
	}
?>
<span id="divNewPassword">
<input type="hidden" name="chkNewPass" id="chkNewPass" value="<?=$corrent;?>" />
<? if($npassword != $cpassword){ ?>
<span >Password do not match!</span>
<? } ?>
</span>

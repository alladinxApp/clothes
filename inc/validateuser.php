<?
	if(empty($_SESSION['userid']) || $_SESSION['userid'] == null || $_SESSION['userid'] == ""){
		$alert = new MessageAlert();
		$alert->setMessage(null);
		$alert->setURL(BASE_URL . "logout.php");
		$alert->Alert();
	}
?>
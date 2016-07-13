<?
	session_start();
	include_once('inc/global.php');
	
	session_unset();
	session_destroy();
	
	$alert = new MessageAlert;
    $alert->setURL(BASE_URL . "login.php");
    $alert->setMessage(null);
    $alert->Alert();
?>
<?
	session_start();
	
	if(isset($_GET['id']) || !empty($_GET['id'])){
		$_SESSION['id'] = $_GET['id'];
		$url = 'print_billing.php';
	}else{
		$url = 'billings.php';
	}
	echo '<script>window.location="'.$url.'"</script>';
?>
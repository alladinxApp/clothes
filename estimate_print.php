<?
	session_start();
	
	if(isset($_GET['id']) || !empty($_GET['id'])){
		$_SESSION['id'] = $_GET['id'];
		$url = 'print_estimate.php';
	}else{
		$url = 'estimates.php';
	}
	echo '<script>window.location="'.$url.'"</script>';
?>
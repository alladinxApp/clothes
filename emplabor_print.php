<?
	session_start();
	
	if(isset($_GET['id']) || !empty($_GET['id'])){
		$_SESSION['id'] = $_GET['id'];
		$url = 'print_emplabor.php';
	}else{
		$url = 'joborders.php';
	}
	echo '<script>window.location="'.$url.'"</script>';
?>
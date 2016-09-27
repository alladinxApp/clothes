<?
	session_start();
	
	if(isset($_GET['id']) || !empty($_GET['id'])){
		$_SESSION['id'] = $_GET['id'];
		$url = 'print_SI.php';
	}else{
		$url = 'dailycollections.php';
	}
	echo '<script>window.location="'.$url.'"</script>';
?>
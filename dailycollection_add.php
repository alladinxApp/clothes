<? 
	require_once("inc/global.php");
	require_once("inc/validateuser.php");
	require_once(MODEL_PATH . DAILYCOLLECTIONMODEL);
	require_once(CONTROLLER_PATH . DAILYCOLLECTIONCONTROLLER);
?>
<!DOCTYPE html><html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?=$title;?></title>
	<meta name="description" content="Clothes Station">
	<meta name="author" content="Clothes Station">
	<meta name="keyword" content="Clothes">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<? require_once("inc-box/fonts.php"); ?>
	<!-- end: CSS -->
	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
		
</head>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">

	function ComputeTotal(){
		var dp = $("#txtDownPayment").val().replace(/,/g,'');
		var amnt = $("#txtAmount").val().replace(/,/g,'');
		var amntrcv = $("#txtAmountReceived").val().replace(/,/g,'');
		var bal = $("#txtBalance").val().replace(/,/g,'');
		var total = 0;

		if(parseFloat(dp) > 0){
			total = (parseFloat(amntrcv) - parseFloat(bal));
		}else{
			total = (parseFloat(amntrcv) - parseFloat(amnt));
		}

		$("#txtChange").val(total.toFixed(2));
	}
	
</script>
<body>
	<? require_once("inc-box/header.php"); ?>
	
		<div class="container-fluid-full">
			<div class="row-fluid">
					
				<? require_once("inc-box/leftnav-menu.php"); ?>
				
				<!-- start: Content -->
				<div id="content" class="span10">
					<? require_once("views/dailycollection_add.php");?>
				</div>
				<!-- end: Content -->

			</div><!--/fluid-row-->
		</div>
	
	<? require_once("inc-box/footer.php");?>
	<? require_once("inc-box/default-js.php");?>

</body>
</html>

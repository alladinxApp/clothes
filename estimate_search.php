<?
	require_once("inc/global.php");
	require_once("inc/validateuser.php");
	require_once(MODEL_PATH . CUSTOMERMODEL);
	require_once(MODEL_PATH . JOBTYPEMODEL);
	require_once(CONTROLLER_PATH . ESTIMATECONTROLLER);
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
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
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
	function SelectCustomer(id,name){
		$("#txtCustomer").val(name);
		$("#txtCustomerCode").val(id);
		$( "#divCustomersList" ).dialog( "close" );
	}
	function SelectJobType(jtcode,jtdesc){
		$("#txtJobType").val(jtdesc);
		$("#txtJobTypeCode").val(jtcode);
		$( "#divJobTypeList" ).dialog( "close" );
	}
	$(document).ready(function() {
		$("#txtCustomer").click(function(){
			$( "#divCustomersList" ).dialog( "open" ); // CALL CUSTOMER LIST
		});

		$("#txtJobType").click(function(){
			$( "#divJobTypeList" ).dialog( "open" ); // CALL JOB TYPE LIST
		});

		//POP MODAL FOR CUSTOMER LIST
		$( "#divCustomersList" ).dialog({
			autoOpen: false,
			height: 600,
			width: 900,
			modal: true,
			cache: false,
			buttons: {
				"Close": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}		
		});

		//POP MODAL FOR JOB TYPE LIST
		$( "#divJobTypeList" ).dialog({
			autoOpen: false,
			height: 600,
			width: 900,
			modal: true,
			cache: false,
			buttons: {
				"Close": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}
		});
	});
</script>
<body>
	<? require_once("inc-box/header.php"); ?>
	
		<div class="container-fluid-full">
			<div class="row-fluid">
					
				<? require_once("inc-box/leftnav-menu.php"); ?>
				
				<!-- start: Content -->
				<div id="content" class="span10">
					<? require_once("views/estimate_search.php");?>
				</div>
				<!-- end: Content -->

			</div><!--/fluid-row-->
		</div>
		
	<? require_once("inc-box/footer.php");?>
	<? require_once("inc-box/default-js.php");?>
</body>
</html>

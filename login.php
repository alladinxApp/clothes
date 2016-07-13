<?
	require_once("inc/global.php");
	require_once(MODEL_PATH . USERMODEL);
	require_once(CONTROLLER_PATH . LOGINCONTROLLER);
?>
<!DOCTYPE html>
<html lang="en">
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

	<style type="text/css">
		body { background: url(img/bg-login.jpg) !important; }
	</style>
		
</head>
<body>
	<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<center><h2>Login to your account</h2></center>
					<form class="form-horizontal" method="post">
							
						<div class="input-prepend" title="Username">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="txtUsername" id="txtUsername" type="text" placeholder="type username"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="Password">
							<span class="add-on"><i class="halflings-icon lock"></i></span>
							<input class="input-large span10" name="txtPassword" id="txtPassword" type="password" placeholder="type password"/>
						</div>
						<div class="clearfix"></div>

						<div class="button-login">	
							<input type="submit" class="btn btn-primary" value=" Login " />
						</div>
						<div class="clearfix"></div>
						<input type="hidden" name="validateuser" id="validateuser" value="1" />
					</form>
					<hr>
				</div><!--/span-->
			</div><!--/row-->
		</div><!--/.fluid-container-->
	</div><!--/fluid-row-->
	<? require_once("inc-box/default-js.php");?>
</body>
</html>

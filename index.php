<?
	require_once("inc/global.php");
	require_once("inc/validateuser.php");
	// require_once(MODEL_PATH . DEFAULTMODEL);
	require_once(CONTROLLER_PATH . DEFAULTCONTROLLER);
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
	<meta http-equiv="refresh" content="60">
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
	// function EditReminder(id){
	// 	$.ajax({
	// 		url: 'inc-ajax/divEditReminder.php?id='+id,
	// 		type: 'GET',
	// 		data: null,
	// 		datatype: 'json',
	// 		contentType: 'application/json; charset=utf-8',
			
	// 		success: function (data) {
	// 			$("#dataReminder").html(data);
	// 			$( "#divEditReminder" ).dialog( "open" ); // CALL REMINDER FORM
	// 		},	
					
	// 		error: function (request, status, err) {
	// 			alert(status);
	// 			alert(err);
	// 		}
	// 	});	
	// }
	$(document).ready(function() {
		$('#btnNewReminder').on("click", function(e){
			$( "#divNewReminder" ).dialog( "open" ); // CALL REMINDER FORM
		});

		EditReminder = function(id){
			$.ajax({
				url: 'inc-ajax/divEditReminder.php?id='+id,
				type: 'GET',
				data: null,
				datatype: 'json',
				contentType: 'application/json; charset=utf-8',
				
				success: function (data) {
					$("#divEditReminder").html(data);
					$("#divEditReminder").dialog( "open" ); // CALL REMINDER FORM
				},	
						
				error: function (request, status, err) {
					alert(status);
					alert(err);
				}
			});	
		}

		//POP MODAL FOR CUSTOMER LIST
		$( "#divNewReminder" ).dialog({
			autoOpen: false,
			height: 400,
			width: 600,
			modal: true,
			cache: false,
			buttons: {
				"Save": function() {
					var title = $("#txtTitle").val();
					var desc = $("#txtDescription").val();

					$.ajax({
						url: 'inc-ajax/divSaveNewReminder.php?title='+title+'&desc='+desc,
						type: 'POST',
						data: null,
						datatype: 'json',
						contentType: 'application/json; charset=utf-8',
						
						success: function (data) {
							$("#divReminderList").replaceWith(data);
						},	
								
						error: function (request, status, err) {
							alert(status);
							alert(err);
						}
					});	

					$( this ).dialog( "close" );
				},
				"Close": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}
		});

		//POP MODAL FOR EDIT REMINDER
		$( "#divEditReminder" ).dialog({
			autoOpen: false,
			height: 410,
			width: 600,
			modal: true,
			cache: false,
			buttons: {
				"Update": function() {
					var id = $("#txtReminderCode").val();
					var status = $("#txtStatus").val();

					$.ajax({
						url: 'inc-ajax/divUpdateReminder.php?id='+id+'&status='+status,
						type: 'POST',
						data: null,
						datatype: 'json',
						contentType: 'application/json; charset=utf-8',
						
						success: function (data) {
							$("#divReminderList").replaceWith(data);
						},	
								
						error: function (request, status, err) {
							alert(status);
							alert(err);
						}
					});	

					$( this ).dialog( "close" );
				},
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
					<? require_once("views/default.php"); ?>
				<!-- end: Content -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->
		</div>
		
	<? require_once("inc-box/footer.php");?>
	<? require_once("inc-box/default-js.php");?>
</body>
</html>

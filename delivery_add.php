<? 
	require_once("inc/global.php");
	require_once("inc/validateuser.php");
	require_once(MODEL_PATH . DELIVERYMODEL);
	require_once(CONTROLLER_PATH . DELIVERYCONTROLLER);
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
	$(document).ready(function(){
		numericDecimalOnly = function(fld){
			$(fld).on("keypress keyup blur",function (event) {
	     		$(this).val($(this).val().replace(/[^0-9\.]/g,''));
	            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	                event.preventDefault();
	            }
	        });
	    }

	    numericDecimalOnly("#txtDiscount");
	    
		SelectJobOrder = function(jono){
			var strURL = "inc-ajax/divGetCompletedJobOrder.php?id="+jono;

			$.ajax({
				url: strURL,
				type: 'GET',
				data: null,
				datatype: 'json',
				contentType: 'application/json; charset=utf-8',
				
				success: function (data) {
					$("#divCompletedJobOrder").replaceWith(data);
					$("#divJobOrders").dialog( "close" );
				},	
						
				error: function (request, status, err) {
					alert(status);
					alert(err);
				}
			});	
		}
		ComputeTotal = function(){
			var items = $("#arrItems").val().split(":");
			var amnt = 0;
			var discount = 0;
			var subtotal = 0;
			var vat = 0;
			var subtotal = 0;
			var totalamount = 0;

			for(var i=0;i<items.length;i++){
				var price = $("#txtPrice"+items[i]).val();
				var qty = $("#txtActual_"+items[i]).val();
				var total = (parseFloat(price) * parseFloat(qty));

				$("#txtTotal_"+items[i]).val(total.toFixed(2));
				subtotal += total;
			}

			$("#txtAmount").val(subtotal.toFixed(2));
			
			if($("#txtDiscount").val() > 0){
				discount = $("#txtDiscount").val();
			}

			amnt = (parseFloat(subtotal) - parseFloat(discount));
			vat = parseFloat(amnt) * parseFloat(0.12);
			total = (parseFloat(amnt) + parseFloat(vat));

			$("#txtSubTotal").val(amnt.toFixed(2));
			$("#txtVat").val(vat.toFixed(2));
			$("#txtTotalAmount").val(total.toFixed(2));
		}

		$("#txtJobOrderNo").click(function(){
			$( "#divJobOrders" ).dialog( "open" ); // CALL JOB ORDERS
		});

		//POP MODAL FOR JOB TYPE LIST
		$( "#divJobOrders" ).dialog({
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
		$("#btnDeliverySave").on("click", function(){
			if( $("#joNo").val() == "" || $("#joNo").val() == null ){
				alert("Please select job order to proceed delivery!");
				$( "#divJobOrders" ).dialog( "open" ); // CALL JOB ORDERS
				return false;
			}
			// if( $("#txtTotalAmount").val() <= 0 || $("#txtTotalAmount").val() == "" || $("#txtTotalAmount").val() == null){
			// 	alert("Please enter items price!");
			// 	return false;
			// }
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
					<? require_once("views/delivery_add.php");?>
				</div>
				<!-- end: Content -->

			</div><!--/fluid-row-->
		</div>
	
	<? require_once("inc-box/footer.php");?>
	<? require_once("inc-box/default-js.php");?>

</body>
</html>

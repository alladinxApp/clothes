<? 
	require_once("inc/global.php");
	require_once("inc/validateuser.php");
	require_once(MODEL_PATH . SIZINGMODEL);
	require_once(MODEL_PATH . MATERIALMODEL);
	require_once(MODEL_PATH . JOBTYPEMODEL);
	require_once(MODEL_PATH . CUSTOMERMODEL);
	require_once(MODEL_PATH . UOMMODEL);
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
		$("#divTxtBalance").hide();
		if(parseFloat($("#txtBalance").val()) > 0){
			$("#divTxtBalance").show();
		}

		generateRandomString = function(length){
			var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			var result = '';
			for(var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
			return result;
		}
		AddItem = function(){
			var itemArr = "";
			var size = $("#txtSize").val();
			var piece = $("#txtPieces").val();
			var color = $("#txtColor").val();
			var uom = $("#txtUOM").val();
			var materials = $("#txtMaterials").val();
			var spec = $("#txtSpecification").val();
			var nItemArr = "";
			var Items = "";
			
			if( $("#txtPieces").val() == "" || $("#txtPieces").val() == null ){
				alert("Please enter quantity!");
				$("#txtPieces").focus();
				return false;
			}

			if( $("#txtColor").val() == "" || $("#txtColor").val() == null ){
				alert("Please enter color!");
				$("#txtColor").focus();
				return false;
			}

			if( $("#txtMaterials").val() == "" || $("#txtMaterials").val() == null ){
				alert("Please enter material!");
				$("#txtMaterials").focus();
				return false;
			}

			if($("#txtItemArr").val() != ""){
				Items += $("#txtItemArr").val() + "::";
			}

			Items += generateRandomString(6) + "||" + size + "||" + piece + "||" + color + "||" + uom + "||" + materials + "||" + spec + "::";
			Items = Items.slice(0, -2);
			nItemArr = Items.split("::");

			var cnt = 1;
			var tbl = "";
			tbl += '<table class="table table-bordered table-condensed">';
				tbl += '<tr>';
				  tbl += '<th>#</th>';
				  tbl += '<th>SIZES</th>';
				  tbl += '<th>PCS</th>';
				  tbl += '<th>COLOR</th>';
				  tbl += '<th>UOM</th>';
				  tbl += '<th>MATERIALS</th>';
				  tbl += '<th>SPECIFICATION</th>';
				  tbl += '<th>REMOVE</th>';
				tbl += '</tr>';
			var nItemArray = "";
			// id | sizeid | size | qty | color | uomid | uom | material | specification
			for(var i=0;i<nItemArr.length;i++){
				if(nItemArr[i] != ""){
					var item = nItemArr[i].split("||");
					var id = item[0];
					tbl += '<tr>';
					  tbl += '<td align="center">' + cnt + '</td>';
					  tbl += '<td>' + item[2] + '</td>';
					  tbl += '<td align="center">' + item[3] + '</td>';
					  tbl += '<td>' + item[4] + '</td>';
					  tbl += '<td>' + item[6] + '</td>';
					  tbl += '<td>' + item[7] + '</td>';
					  tbl += '<td>' + item[8] + '</td>';
					  var rid = "'" + id + "'";
					  tbl += '<td align="center"><a href="#" onClick="RemoveItem('+rid+')"><img src="img/del_ico.png" width="20" border="0" /></td>';
					tbl += '</tr>';
					nItemArray += id + "||" + item[1] + "||" + item[2] + "||" + item[3] + "||" + item[4] + "||" + item[5] + "||" + item[6] + "||" + item[7] + "||" + item[8] + "::";
					cnt++;
				}
			}
			tbl += '</table>';
			$("#divDetails").html(tbl);

			nItemArray = nItemArray.slice(0, -2);
			$("#txtItemArr").val(nItemArray);
			$("#txtSizes").val("");
			$("#txtPieces").val("");
			$("#txtColor").val("");
			$("#txtMaterials").val("");
			$("#txtSpecification").val("");
		}
		RemoveItem = function(val){
			nItemArr = $("#txtItemArr").val().split("::");

			var cnt = 1;
			var tbl = "";
			tbl += '<table class="table table-bordered table-condensed">';
				tbl += '<tr>';
				  tbl += '<th>#</th>';
				  tbl += '<th>SIZES</th>';
				  tbl += '<th>PCS</th>';
				  tbl += '<th>COLOR</th>';
				  tbl += '<th>UOM</th>';
				  tbl += '<th>MATERIALS</th>';
				  tbl += '<th>SPECIFICATION</th>';
				  tbl += '<th>REMOVE</th>';
				tbl += '</tr>';
			var nItemArray = "";
			// id | sizeid | size | qty | color | uomid | uom | material | specification
			for(var i=0;i<nItemArr.length;i++){
				
				if(nItemArr[i] != ""){
					var item = nItemArr[i].split("||");
					var id = item[0];
					if(item[0] != val){
						tbl += '<tr>';
							tbl += '<td align="center">' + cnt + '</td>';
							tbl += '<td>' + item[2] + '</td>';
							tbl += '<td align="center">' + item[3] + '</td>';
							tbl += '<td>' + item[4] + '</td>';
							tbl += '<td>' + item[6] + '</td>';
							tbl += '<td>' + item[7] + '</td>';
							tbl += '<td>' + item[8] + '</td>';
							var rid = "'" + id + "'";
							tbl += '<td align="center"><a href="#" onClick="RemoveItem('+rid+')"><img src="img/del_ico.png" width="20" border="0" /></td>';
						tbl += '</tr>';
						nItemArray += id + "||" + item[1] + "||" + item[2] + "||" + item[3] + "||" + item[4] + "||" + item[5] + "||" + item[6] + "||" + item[7] + "||" + item[8] + "::";
						cnt++;
					}
				}
			}
			tbl += '</table>';
			$("#divDetails").html(tbl);

			nItemArray = nItemArray.slice(0, -2);
			$("#txtItemArr").val(nItemArray);
		}
		ComputeTotal = function(){
			var amnt = 0;
			var discount = 0;
			var subtotal = 0;
			var vat = 0;
			var total = 0;
			var dpamnt = 0;
			var discounted = 0;
			var balance = 0;
			$("#divTxtBalance").hide();
			
			if($("#txtAmount").val().replace(/,/g,'') > 0){
				var amnt1 = $("#txtAmount").val();
				amnt = amnt1.replace(/,/g,'');
			}
			if($("#txtDiscount").val().replace(/,/g,'') > 0){
				var discount1 = $("#txtDiscount").val();
				discount = discount1.replace(/,/g,'');
			}
			if($("#txtDownPayment").val().replace(/,/g,'') > 0){
				var dpamnt1 = $("#txtDownPayment").val();
				dpamnt = dpamnt1.replace(/,/g,'');

				$("#divTxtBalance").show();
			}
			
			discounted = (parseFloat(amnt) - parseFloat(discount));
			vat = parseFloat(discounted) * parseFloat(0.12);
			total = (parseFloat(discounted) + parseFloat(vat));
			balance = (parseFloat(total) - parseFloat(dpamnt));

			$("#txtSubTotal").val(discounted.toFixed(2));
			$("#txtVat").val(vat.toFixed(2));
			$("#txtTotalAmount").val(total.toFixed(2));
			$("#txtBalance").val(balance.toFixed(2));
		}
		RushEstimate = function(){
			if(document.estimateForm.chkIsRush.checked){
				document.estimateForm.txtLeadTime.readOnly = false;
				document.estimateForm.txtDueDate.disabled = false;
			}else{
				$("#txtLeadTime").val("");
				$("#txtDueDate").val("");
				$("#txtJobType").val("");
				document.estimateForm.txtLeadTime.readOnly = true;
				document.estimateForm.txtDueDate.disabled = true;
			}
		}
		EstimatePrint = function(estno){
			window.open("estimate_print.php?id="+estno);
			return false;
		}

		$("#btnEstimateSave").on("click", function(){
			if( $("#txtItemArr").val() == "" || $("#txtItemArr").val() == null ){
				alert("Please enter items!");
				return false;
			}
			if( $("#txtTotalAmount").val() <= 0 ){
				alert("Please enter amount!");
				$("#txtAmount").focus();
				return false;
			}
			if( $("#txtStatus").val() == 3 ){
				if( $("#txtRemarks").val() == "" || $("#txtRemarks").val() == null){
					alert("Please enter remarks!");
					$("#txtRemarks").focus();
					return false;
				}
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
					<? require_once("views/estimate_edit.php");?>
				</div>
				<!-- end: Content -->

			</div><!--/fluid-row-->
		</div>
	
	<? require_once("inc-box/footer.php");?>
	<? require_once("inc-box/default-js.php");?>

</body>
</html>

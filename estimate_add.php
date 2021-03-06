<? 
	require_once("inc/global.php");
	require_once("inc/validateuser.php");
	require_once(MODEL_PATH . SIZINGMODEL);
	require_once(MODEL_PATH . MATERIALMODEL);
	require_once(MODEL_PATH . JOBTYPEMODEL);
	require_once(MODEL_PATH . CUSTOMERMODEL);
	require_once(MODEL_PATH . UOMMODEL);
	require_once(CONTROLLER_PATH . CONTROLNOCONTROLLER);
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
	$(document).ready(function() {
		$("#divTxtBalance").hide();

		numericDecimalOnly = function(fld){
			$(fld).on("keypress keyup blur",function (event) {
	     		$(this).val($(this).val().replace(/[^0-9\.]/g,''));
	            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	                event.preventDefault();
	            }
	        });
	    }

	    numbericOnly = function(fld){
	    	$(fld).on("keypress keyup blur",function (event) {    
	           $(this).val($(this).val().replace(/[^\d].+/, ""));
	            if ((event.which < 48 || event.which > 57)) {
	                event.preventDefault();
	            }
	        });
	    }

	    numericDecimalOnly("#txtDownPayment");
	    numericDecimalOnly("#txtAmount");
	    numericDecimalOnly("#txtDiscount");
	    numbericOnly("#txtPieces");

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

			// if( $("#txtSpecification").val() == "" || $("#txtSpecification").val() == null ){
			// 	alert("Please enter specification!");
			// 	$("#txtSpecification").focus();
			// 	return false;
			// }

			if($("#txtItemArr").val() != ""){
				Items += $("#txtItemArr").val() + "::";
			}
			Items += "" + "||" + size + "||" + piece + "||" + color + "||" + uom + "||" + materials + "||" + spec + "::";
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
				var id = generateRandomString(6);
				if(nItemArr[i] != ""){
					var item = nItemArr[i].split("||");
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
				var id = generateRandomString(6);
				if(nItemArr[i] != ""){
					var item = nItemArr[i].split("||");
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
			var isvat = $("#txtIsVat").val();
			if(isvat == "" || isvat == null){
				alert("Please select customer first!");
				$( "#divCustomersList" ).dialog( "open" );
				return false;
			}
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
			if(isvat == 1){
				vat = parseFloat(discounted) * parseFloat(0.12);
			}
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
				document.estimateForm.txtDueDateDesc.disabled = false;
			}else{
				$("#txtLeadTime").val("");
				$("#txtDueDate").val("");
				$("#txtJobType").val("");
				document.estimateForm.txtLeadTime.readOnly = true;
				document.estimateForm.txtDueDateDesc.disabled = true;
			}
		}
		SelectCustomer = function(id,name,addr,telno,isvat){
			$("#txtCustomer").val(id);
			$("#txtCustomerName").val(name);
			$("#txtAddress").val(addr);
			$("#txtTelephoneNo").val(telno);
			$("#txtIsVat").val(isvat);
			$( "#divCustomersList" ).dialog( "close" );
		}
		SelectJobType = function(jtcode,jtdesc,leadtime){
			$("#txtJobType").val(jtcode);
			$("#txtJobTypeDescription").val(jtdesc);
			$("#txtLeadTime").val(leadtime);
			var duedate = addDays(Date(),leadtime);
			$("#txtDueDateDesc").val(duedate);
			$("#txtDueDate").val(duedate);
			$( "#divJobTypeList" ).dialog( "close" );
		}
		getDueDate = function(duedate){
			$("#txtDueDate").val(duedate);
		}
		addDays = function(date,days) {
			var result = new Date(date);
			var nResult = result.addDays(days);
			var dd = nResult.getDate();
			var mm = nResult.getMonth() + 1;
			var y = nResult.getFullYear();
		    return mm + '/' + dd + '/' + y;
		}
		findCustomer = function(q){
			$.ajax({
				url: 'inc-ajax/divSearchCustomer.php?q='+q,
				type: 'POST',
				data: null,
				datatype: 'json',
				contentType: 'application/json; charset=utf-8',
				
				success: function (data) {
					$("#divCustList").replaceWith(data);
				},	
						
				error: function (request, status, err) {
					alert(status);
					alert(err);
				}
			});	
		}

		Date.prototype.addDays = function (num) {
		    var value = this.valueOf();
		    value += 86400000 * num;
		    return new Date(value);
		}

		$("#txtCustomerName").click(function(){
			$( "#divCustomersList" ).dialog( "open" ); // CALL CUSTOMER LIST
		});

		$("#txtJobTypeDescription").click(function(){
			$( "#divJobTypeList" ).dialog( "open" ); // CALL JOB TYPE LIST
		});

		$('#btnNewCustomer').on("click", function(e){
			$( "#divNewCustomer" ).dialog( "open" ); // CALL CUSTOMER FORM
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

		//POP MODAL FOR NEW CUSTOMER FORM
		$( "#divNewCustomer" ).dialog({
			autoOpen: false,
			height: 680,
			width: 900,
			modal: true,
			cache: false,
			buttons: {
				"Save": function() {
					var name = $("#txtCustName").val();
					var bdate = $("#txtCustBirthDate").val();
					var addr = $("#txtCustAddress").val();
					var mobno = $("#txtCustMobileNo").val();
					var telno = $("#txtCustTelephoneNo").val();
					var eadd = $("#txtCustEmailAddress").val();
					var faxno = $("#txtCustFax").val();
					var tin = $("#txtCustTIN").val();
					var vat = $("#txtCustIsVAT").val();

					$.ajax({
						url: 'inc-ajax/divSaveNewCustomer.php?name='+name+'&bdate='+bdate+'&addr='+addr+'&mobno='+mobno+'&telno='+telno+'&eadd='+eadd+'&faxno='+faxno+'&tin='+tin+'&vat='+vat,
						type: 'POST',
						data: null,
						datatype: 'json',
						contentType: 'application/json; charset=utf-8',
						
						success: function (data) {
							$("#divCustInfo").replaceWith(data);
						},	
								
						error: function (request, status, err) {
							alert(status);
							alert(err);
						}
					});	

					$( this ).dialog( "close" );
				},
				"Cancel": function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$( this ).dialog( "close" );
			}
		});

		$("#btnEstimateSave").on("click", function(){
			if( $("#txtCustomer").val() == "" || $("#txtCustomer").val() == null ){
				alert("Please select customer!");
				$( "#divCustomersList" ).dialog( "open" ); // CALL CUSTOMER LIST
				return false;
			}
			if( $("#txtJobType").val() == "" || $("#txtJobType").val() == null ){
				alert("Please select job type!");
				$( "#divJobTypeList" ).dialog( "open" ); // CALL JOB TYPE LIST
				return false;
			}
			if( $("#txtAttachment").val() == "" || $("#txtAttachment").val() == null ){
				alert("Please choose attachment!");
				return false;
			}
			if( $("#txtItemArr").val() == "" || $("#txtItemArr").val() == null ){
				alert("Please enter items!");
				return false;
			}
			if( $("#txtTotalAmount").val() <= 0 ){
				alert("Please enter amount!");
				$("#txtAmount").focus();
				return false;
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
					<? require_once("views/estimate_add.php");?>
				</div>
				<!-- end: Content -->

			</div><!--/fluid-row-->
		</div>
	
	<? require_once("inc-box/footer.php");?>
	<? require_once("inc-box/default-js.php");?>
</body>
</html>

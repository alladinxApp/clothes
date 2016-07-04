<?
	// SAVE CUSTOMER
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$custCode = $_POST['txtCustomerCode'];
		$custname = $_POST['txtName'];
		$custAddress = $_POST['txtAddress'];
		$mobileNo = $_POST['txtMobileNo'];
		$telephoneNo = $_POST['txtTelephoneNo'];
		$emailAddress = $_POST['txtEmailAddress'];
		$faxNo = $_POST['txtFax'];
		$TIN = $_POST['txtTIN'];
		$isVat = $_POST['txtIsVAT'];
		$newNum = getNewCtrlNo('CUSTOMER');
		UpdateCtrlNo('CUSTOMER');
	}
	// END SAVE CUSTOMER
	// UPDATE CUSTOMER
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$custCode = $_POST['txtCustomerCode'];
		$custname = $_POST['txtName'];
		$custAddress = $_POST['txtAddress'];
		$mobileNo = $_POST['txtMobileNo'];
		$telephoneNo = $_POST['txtTelephoneNo'];
		$emailAddress = $_POST['txtEmailAddress'];
		$faxNo = $_POST['txtFax'];
		$TIN = $_POST['txtTIN'];
		$isVat = $_POST['txtIsVAT'];
		$status = $_POST['txtStatus']
	}
	// END UPDATE CUSTOMER
	// DELETE CUSTOMER
	if(isset($_POST['delete']) && !empty($_POST['delete']) && $_POST['delete'] == 1){
		
	}
	// END DELETE CUSTOMER
	// EDIT CUSTOMER
	if(isset($_POST['edit']) && !empty($_POST['edit']) && $_POST['edit'] == 1){
		
	}
	// END EDIT CUSTOMER
?>
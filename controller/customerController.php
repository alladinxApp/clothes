<?
	// SAVE CUSTOMER
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$custname = $_POST['txtName'];
		$custAddress = $_POST['txtAddress'];
		$mobileNo = $_POST['txtMobileNo'];
		$telephoneNo = $_POST['txtTelephoneNo'];
		$emailAddress = $_POST['txtEmailAddress'];
		$faxNo = $_POST['txtFax'];
		$TIN = $_POST['txtTIN'];
		$isVat = $_POST['txtIsVAT'];
		$bdate = $_POST['txtBirthDate'];
		// GET NEW CONTROL NO
		$newNum = getNewCtrlNo('CUSTOMER');

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT NEW CUSTOMER
		$customer = new Table();
		$customer->setSQLType($csdb->getSQLType());
		$customer->setInstance($csdb->getInstance());
		$customer->setTable("customerMaster");
		$customer->setField("customerCode,customerName,birthDate,address,emailAddress,mobileNo,telephoneNo,faxNo,TIN,isVat,createdDate,createdBy");
		$customer->setValues("'$newNum','$custname','$bdate','$custAddress','$emailAddress','$mobileNo','$telephoneNo','$faxNo','$TIN','$isVat','$today','$userid'");
		$customer->doQuery("save");

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NUMBER
		UpdateCtrlNo('CUSTOMER');

		$alert = new MessageAlert();
		$alert->setMessage("New Customer successfully saved.");
		$alert->setURL(BASE_URL . "customers.php");
		$alert->Alert();
	}
	// END SAVE CUSTOMER
	// UPDATE CUSTOMER
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$custname = $_POST['txtName'];
		$custAddress = $_POST['txtAddress'];
		$mobileNo = $_POST['txtMobileNo'];
		$telephoneNo = $_POST['txtTelephoneNo'];
		$emailAddress = $_POST['txtEmailAddress'];
		$faxNo = $_POST['txtFax'];
		$TIN = $_POST['txtTIN'];
		$isVat = $_POST['txtIsVAT'];
		$bdate = $_POST['txtBirthDate'];
		$status = $_POST['txtStatus'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE CUSTOMER
		$customer = new Table();
		$customer->setSQLType($csdb->getSQLType());
		$customer->setInstance($csdb->getInstance());
		$customer->setTable("customerMaster");
		$customer->setValues("customerName = '$custname', birthDate = '$bdate', address = '$custAddress', mobileNo = '$mobileNo', telephoneNo = '$telephoneNo', faxNo = '$faxNo', emailAddress = '$emailAddress', TIN = '$TIN', isVat = '$isVat' , modifiedDate = '$today', modifiedBy = '$userid', status = '$status'");
		$customer->setParam("WHERE id = '$id'");
		$customer->doQuery("update");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Customer successfully updated.");
		$alert->setURL(BASE_URL . "customer_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE CUSTOMER
	// DELETE CUSTOMER
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// DELETE CUSTOMER
		$customer = new Table();
		$customer->setSQLType($csdb->getSQLType());
		$customer->setInstance($csdb->getInstance());
		$customer->setTable("customerMaster");
		$customer->setParam("WHERE id = '$id'");
		$customer->doQuery("delete");

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("Customer successfully deleted.");
		$alert->setURL(BASE_URL . "customers.php");
		$alert->Alert();
	}
	// END DELETE CUSTOMER
	// EDIT CUSTOMER
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET CUSTOMER
		$customer = new Table();
		$customer->setSQLType($csdb->getSQLType());
		$customer->setInstance($csdb->getInstance());
		$customer->setView("customerMaster_V");
		$customer->setParam("WHERE id = '$id'");
		$customer->doQuery("query");
		$row_customer = $customer->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT CUSTOMER
?>
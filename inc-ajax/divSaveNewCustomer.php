<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$custname = $_GET['name'];
	$custAddress = $_GET['addr'];
	$mobileNo = $_GET['mobno'];
	$telephoneNo = $_GET['telno'];
	$emailAddress = $_GET['eadd'];
	$faxNo = $_GET['faxno'];
	$TIN = $_GET['tin'];
	$isVat = $_GET['vat'];
	$bdate = dateFormat($_GET['bdate'],"Y-m-d");
	// GET NEW CONTROL NO
	$newNum = getNewCtrlNo('CUSTOMER');

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// INSERT NEW CUSTOMER
	$customer = new Table();
	$customer->setSQLType($csdb->getSQLType());
	$customer->setInstance($csdb->getInstance());
	$customer->setTable("customersmaster");
	$customer->setField("customerCode,customerName,birthDate,address,emailAddress,mobileNo,telephoneNo,faxNo,TIN,isVat,createdDate,createdBy");
	$customer->setValues("'$newNum','$custname','$bdate','$custAddress','$emailAddress','$mobileNo','$telephoneNo','$faxNo','$TIN','$isVat','$today','$userid'");
	$customer->doQuery("save");

	// CLOSE DB
	$csdb->DBClose();

	// UPDATE CONTROL NUMBER
	UpdateCtrlNo('CUSTOMER');
?>
<div class="control-group">
	<label class="control-label" for="txtCustomer">Customer</label>
	<div class="controls">
		<input class="input-xlarge" value="<?=$custname;?>" name="txtCustomerName" readonly id="txtCustomerName" type="text" placeholder="Click Here..." />
		<input type="button" class="btn btn-info" name="btnNewCustomer" id="btnNewCustomer" value=" New " />
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="txtAddress">Address</label>
	<div class="controls">
		<input class="input-xlarge" value="<?=$custAddress;?>" name="txtAddress" readonly id="txtAddress" type="text" placeholder="Address Here..." />
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="txtTelephoneNo">Telephone No</label>
	<div class="controls">
		<input class="input-xlarge" value="<?=$telephoneNo;?>" name="txtTelephoneNo" readonly id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
	</div>
</div>
<input type="hidden" name="txtCustomer" id="txtCustomer" value="<?=$newNum;?>" />
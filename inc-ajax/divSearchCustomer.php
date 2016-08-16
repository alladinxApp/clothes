<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$q = $_GET['q'];
	
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET CUSTOMER
	$customer = new Table();
	$customer->setSQLType($csdb->getSQLType());
	$customer->setInstance($csdb->getInstance());
	$customer->setView("customersmaster_v");
	$customer->setParam("WHERE customerName LIKE '$q%' ORDER BY customerName");
	$customer->doQuery("query");
	$row_customer = $customer->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<div id="divCustList">
	<table class="table table-bordered table-condensed" id="customerHeader">
		<tr>
			<th>#</th>
			<th>Customer Code</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Contact No</th>
			<th>Birth Date</th>
			<th>TIN</th>
			<th>is VAT</th>
		</tr>
		<? 
			$cnt = 1; 
			for($i=0;$i<count($row_customer);$i++){ 
				$customerCode = $row_customer[$i]['customerCode'];
				$customerName = $row_customer[$i]['customerName'];
				$address = $row_customer[$i]['address'];
				$telephoneNo = $row_customer[$i]['telephoneNo'];
		?>
		<tr id="customerList" style="cursor: pointer;" onclick="SelectCustomer('<?=$customerCode;?>','<?=$customerName;?>','<?=$address;?>','<?=$telephoneNo;?>');">
			<td><?=$cnt;?></td>
			<td><?=$row_customer[$i]['customerCode'];?></td>
			<td><?=$row_customer[$i]['customerName'];?></td>
			<td><?=$row_customer[$i]['address'];?></td>
			<td><?=$row_customer[$i]['mobileNo'] . ' / ' . $row_customer[$i]['telephoneNo'];?></td>
			<td><?=$row_customer[$i]['birthDate'];?></td>
			<td><?=$row_customer[$i]['TIN'];?></td>
			<td><?=$row_customer[$i]['isVat'];?></td>
		</tr>
		<? $cnt++; } ?>
	</table>
</div>
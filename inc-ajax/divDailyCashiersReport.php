<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$date = $_GET['date'];
	$frm = dateFormat($date,"Y-m-d") . ' 00:00:00';
	$to = dateFormat($date,"Y-m-d") . ' 23:59:59';
	$cust = $_GET['cust'];
	$customer = "";

	if(!empty($cust)){
		$customer = " AND customerCode = '$cust'";
	}

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET AR
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setView("armaster_v");
	$armst->setParam("WHERE 1 $customer AND createdDate BETWEEN '$frm' AND '$to' ORDER BY createdDate");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>SI</th>
		<th>Customer</th>
		<th>A/R</th>
		<th>Payment</th>
		<th>Balance</th>
		<th>Remarks</th>
	</tr>
	<? 
		$cnt = 1;
		$totalbal = 0;
		$totalpay = 0;
		if(count($row_armst) > 0){
		for($i=0;$i<count($row_armst);$i++){
			$totalbal += $row_armst[$i]['balance'];
			$totalpay += $row_armst[$i]['tender'];
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_armst[$i]['billingReferenceNo'];?></td>
		<td><?=$row_armst[$i]['customerName'];?></td>
		<td align="right"><?=number_format($row_armst[$i]['amount'],2);?></td>
		<td align="right"><?=number_format($row_armst[$i]['tender'],2);?></td>
		<td align="right"><?=number_format($row_armst[$i]['balance'],2);?></td>
		<td><?=$row_armst[$i]['remarks'];?></td>
	</tr>
	<? 	$cnt++; } ?>
	<? }else{ ?>
	<tr>
		<td colspan="7" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
	<tr>
		<td colspan="4" align="right">Total >>>>>>>>>></td>
		<td align="right"><b><?=number_format($totalpay,2);?></b></td>
		<!-- <td align="right"><b><? //=number_format($totalbal,2);?></b></td> -->
	</tr>
</table>
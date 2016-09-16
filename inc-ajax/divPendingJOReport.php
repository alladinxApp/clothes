<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$frm = dateFormat($_GET['from'],"Y-m-d") . ' 00:00:00';
	$to = dateFormat($_GET['to'],"Y-m-d") . ' 23:59:59';
	$jtype = $_GET['jobtype'];
	$cust = $_GET['cust'];
	$jobType = "";
	$customer = "";

	if(!empty($cust)){
		$customer = " AND customerCode = '$cust'";
	}
	if(!empty($jtype)){
		$jobType = " AND jobType = '$jobType'";
	}

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET BILLING
	$jomst = new Table();
	$jomst->setSQLType($csdb->getSQLType());
	$jomst->setInstance($csdb->getInstance());
	$jomst->setView("jobordermaster_v");
	$jomst->setParam("WHERE 1 $customer $jobType AND createdDate BETWEEN '$frm' AND '$to' AND status = 0 ORDER BY dueDate");
	$jomst->doQuery("query");
	$row_jomst = $jomst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>JO Ref No</th>
		<th>Due Date</th>
		<th>Customer</th>
		<th>Amount</th>
	</tr>
	<? 
		$cnt = 1;
		$total = 0;
		if(count($row_jomst) > 0){
			for($i=0;$i<count($row_jomst);$i++){
				$total += $row_jomst[$i]['totalAmount'];
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_jomst[$i]['jobOrderReferenceNo'];?></td>
		<td align="center"><?=dateFormat($row_jomst[$i]['dueDate'],"M d, Y");?></td>
		<td><?=$row_jomst[$i]['customerName'];?></td>
		<td align="right"><?=number_format($row_jomst[$i]['totalAmount'],2);?></td>
	</tr>
	<? $cnt++; }}else{ ?>
	<tr>
		<td colspan="5" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
	<tr>
		<td colspan="4" align="right">Total >>>>>>>>>></td>
		<td align="right"><b><?=number_format($total,2);?></b></td>
	</tr>
</table>
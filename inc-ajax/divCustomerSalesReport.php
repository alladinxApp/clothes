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
	$cust = $_GET['cust'];
	$customer = "";

	if(!empty($cust)){
		$customer = " AND customerCode = '$cust'";
	}

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET CUSTOMER
	$customermst = new Table();
	$customermst->setSQLType($csdb->getSQLType());
	$customermst->setInstance($csdb->getInstance());
	$customermst->setView("customersmaster_v");
	$customermst->setParam("WHERE 1 $customer ORDER BY customerName");
	$customermst->doQuery("query");
	$row_customermst = $customermst->getLists();

	// SET DELIVERY
	$deliverymst = new Table();
	$deliverymst->setSQLType($csdb->getSQLType());
	$deliverymst->setInstance($csdb->getInstance());
	$deliverymst->setView("deliverymaster_v");
	$deliverymst->setParam("WHERE preparedDate BETWEEN '$frm' AND '$to'");
	$deliverymst->doQuery("query");
	$row_deliverymst = $deliverymst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>Customer</th>
		<th>Amount</th>
	</tr>
	<? 
		$cnt = 1;
		$totalsales = 0;
		if(count($row_customermst) > 0){
			for($i=0;$i<count($row_customermst);$i++){ 
				$total = 0;
				for($a=0;$a<count($row_deliverymst);$a++){
					if($row_customermst[$i]['customerCode'] == $row_deliverymst[$a]['customerCode']){
						$total += $row_deliverymst[$a]['totalAmount'];
					}
				}
				if($total > 0){
					$totalsales += $total;
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_customermst[$i]['customerName'];?></td>
		<td align="right"><?=number_format($total,2);?></td>
	</tr>
	<? 	
					$cnt++; 
				}
			}
	?>
	<? }else{ ?>
	<tr>
		<td colspan="3" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
	<? if($totalsales == 0){ ?>
	<tr>
		<td colspan="3" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
	<tr>
		<td colspan="2" align="right">Total >>>>>>>>>></td>
		<td align="right"><b><?=number_format($totalsales,2);?></b></td>
	</tr>
</table>
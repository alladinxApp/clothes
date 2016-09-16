<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$days = $_GET['days'];
	$cust = $_GET['cust'];
	$nodays = "";
	$customer = "";

	if(!empty($cust)){
		$customer = " AND customerCode = '$cust'";
	}
	if(!empty($days)){
		switch($days){
			case "1":
					$nodays = " AND daysOld <= 30";
				break;
			case "2":
					$nodays = " AND daysOld <= 45";
				break;
			case "3":
					$nodays = " AND daysOld <= 60";
				break;
			case "4":
					$nodays = " AND daysOld <= 90";
				break;
			case "5":
					$nodays = " AND daysOld > 90";
				break;
			default: break;
		}
	}

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET AR
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setView("armaster_v");
	$armst->setParam("WHERE 1 $customer $nodays AND status = 0 ORDER BY daysOld DESC");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>Customer</th>
		<th>No of Days</th>
		<th>Amount</th>
	</tr>
	<? 
		$cnt = 1;
		$total = 0;
		if(count($row_armst) > 0){
			for($i=0;$i<count($row_armst);$i++){
				$total += $row_armst[$i]['balance'];
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_armst[$i]['customerName'];?></td>
		<td align="center"><?=$row_armst[$i]['daysOld'];?></td>		
		<td align="right"><?=number_format($row_armst[$i]['balance'],2);?></td>
	</tr>
	<? $cnt++; }}else{ ?>
	<tr>
		<td colspan="4" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
	<tr>
		<td colspan="3" align="right">Total >>>>>>>>>></td>
		<td align="right"><b><?=number_format($total,2);?></b></td>
	</tr>
</table>
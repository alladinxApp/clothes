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
	$emp = $_GET['emp'];
	$emplbl = "";

	if($emp != "ALL"){
		$emplbl = " AND jolaborcostsmaster_v.employeeName LIKE '$emp%'";
	}
	
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	if($emp != "ALL"){
		// SET LABOR
		$labor = new Table();
		$labor->setSQLType($csdb->getSQLType());
		$labor->setInstance($csdb->getInstance());
		$labor->setView("jolaborcostsmaster_v");
		$labor->setParam("WHERE jolaborcostsmaster_v.createdDate between '$frm' AND '$to' $emplbl ORDER BY jolaborcostsmaster_v.createdDate");
		$labor->doQuery("query");
		$row_labor = $labor->getLists();
	}else{
		// SET JO
		$labor = new Table();
		$labor->setSQLType($csdb->getSQLType());
		$labor->setInstance($csdb->getInstance());
		$labor->setCol("jobordermaster_v.*,(SELECT SUM(jolaborcostsmaster_v.totalLabor) FROM jolaborcostsmaster_v WHERE jobOrderReferenceNo = jobordermaster_v.jobOrderReferenceNo) AS totalLabor");
		$labor->setView("jobordermaster_v");
		$labor->setParam("WHERE jobordermaster_v.createdDate between '$frm' AND '$to' $emplbl ORDER BY jobordermaster_v.createdDate");
		$labor->doQuery("query");
		$row_labor = $labor->getLists();
	}
	
	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>Job Order No</th>
		<th>Revenue</th>
		<th>Freight Cost</th>
		<th>Labor</th>
		<th>Retention</th>
		<th>%</th>
	</tr>
	<? 
		$cnt = 1;
		if(count($row_labor) > 0){
			for($i=0;$i<count($row_labor);$i++){
				$retention = (($row_labor[$i]['totalAmount'] - $row_labor[$i]['freightCost']) - $row_labor[$i]['totalLabor']);
				$per = (($retention / $row_labor[$i]['totalAmount']) * 100);
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_labor[$i]['jobOrderReferenceNo'];?></td>
		<td align="right"><?=number_format($row_labor[$i]['totalAmount'],2);?></td>
		<td align="right"><?=number_format($row_labor[$i]['freightCost'],2);?></td>
		<td align="right"><?=number_format($row_labor[$i]['totalLabor'],2);?></td>
		<td align="right"><?=number_format($retention,2);?></td>
		<td align="right"><?=number_format($per,2);?>%</td>
	</tr>
	<? $cnt++; }}else{ ?>
	<tr>
		<td colspan="6" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
</table>
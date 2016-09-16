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

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET REMINDERS LIST REPORT
	$remindermst = new Table();
	$remindermst->setSQLType($csdb->getSQLType());
	$remindermst->setInstance($csdb->getInstance());
	$remindermst->setView("remindermaster_v");
	$remindermst->setParam("WHERE createdDate between '$frm' AND '$to' ORDER BY createdDate");
	$remindermst->doQuery("query");
	$row_remindermst = $remindermst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>Title</th>
		<th>Description</th>
		<th>Created By</th>
		<th>Created Date</th>
		<th>Closed Date</th>
		<th>Status</th>
	</tr>
	<? 
		$cnt = 1;
		if(count($row_remindermst) > 0){
			for($i=0;$i<count($row_remindermst);$i++){
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_remindermst[$i]['title'];?></td>
		<td><?=$row_remindermst[$i]['description'];?></td>
		<td><?=$row_remindermst[$i]['createdBy'];?></td>
		<td align="center"><?=dateFormat($row_remindermst[$i]['createdDate'],"M d, Y");?></td>
		<td align="center"><?=dateFormat($row_remindermst[$i]['modifiedDate'],"M d, Y");?></td>
		<td><?=$row_remindermst[$i]['statusDesc'];?></td>
	</tr>
	<? $cnt++; }}else{ ?>
	<tr>
		<td colspan="6" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
</table>
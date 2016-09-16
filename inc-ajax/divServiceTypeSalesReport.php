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
	$jobType = "";

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET SERVICE TYPE REPORT
	$strpt = new Table();
	$strpt->setSQLType($csdb->getSQLType());
	$strpt->setInstance($csdb->getInstance());
	$strpt->setView("jobtypemaster_v");
	if(!empty($jtype)){
		$jobType = " AND deliverymaster_v.jobType = '$jtype'";
		$strpt->setParam("WHERE jobtypemaster_v.jobTypeCode = '$jtype'");
	}
	$strpt->setCol("jobtypemaster_v.description
					,(SELECT SUM(totalAmount) AS amount 
						FROM deliverymaster_v 
						WHERE (deliverymaster_v.status = 1)
							AND (deliverymaster_v.jobType = jobtypemaster_v.jobTypeCode)
							AND (deliverymaster_v.createdDate between '$frm' AND '$to')
							$jobType) AS amount");
	$strpt->doQuery("query");
	$row_strpt = $strpt->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<table class="table table-bordered table-condensed">
	<tr>
		<th>#</th>
		<th>Job Type</th>
		<th>Amount</th>
	</tr>
	<? 
		$cnt = 1;
		$total = 0;
		if(count($row_strpt) > 0){
			for($i=0;$i<count($row_strpt);$i++){
				$total += $row_strpt[$i]['amount'];
	?>
	<tr>
		<td><?=$cnt;?></td>
		<td><?=$row_strpt[$i]['description'];?></td>
		<td align="right"><?=number_format($row_strpt[$i]['amount'],2);?></td>
	</tr>
	<? $cnt++; }}else{ ?>
	<tr>
		<td colspan="3" align="center"><b>No Results Found!</b></td>
	</tr>
	<? } ?>
	<tr>
		<td colspan="2" align="right">Total >>>>>>>>>></td>
		<td align="right"><b><?=number_format($total,2);?></b></td>
	</tr>
</table>
<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$id = $_GET['id'];
	$empname = $_GET['name'];
	$jobdesc = $_GET['desc'];
	$jono = $_GET['jono'];
	$deptcode = $_GET['deptcode'];
	
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// INSERT NEW CUSTOMER
	$jolaborcostemp = new Table();
	$jolaborcostemp->setSQLType($csdb->getSQLType());
	$jolaborcostemp->setInstance($csdb->getInstance());
	$jolaborcostemp->setTable("jolaborcostsmaster");
	$jolaborcostemp->setField("jobOrderDepartmentId,jobOrderReferenceNo,departmentCode,employeeName,jobDescriptionCode,createdDate,createdBy");
	$jolaborcostemp->setValues("'$id','$jono','$deptcode','$empname','$jobdesc','$today','$userid'");
	$jolaborcostemp->doQuery("save");

	// SET JOB ORDER LABORS
	$jolabor = new Table();
	$jolabor->setSQLType($csdb->getSQLType());
	$jolabor->setInstance($csdb->getInstance());
	$jolabor->setView("jolaborcostsmaster_v");
	$jolabor->setParam("WHERE jobOrderReferenceNo = '$jono' AND departmentCode = '$deptcode' ORDER BY createdDate DESC");
	$jolabor->doQuery("query");
	$row_jolabor = $jolabor->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<div id="divDetails">
<table class="table table-bordered table-condensed">
	<tr>
	  <th>#</th>
	  <th>Employee Name</th>
	  <th>Job Description</th>
	  <th>Add Labor</th>
	</tr>
	<?
		$cnt = 1;
		for($i=0;$i<count($row_jolabor);$i++){
	?>
	<tr>
		<td align="center"><?=$cnt;?></td>
		<td><?=$row_jolabor[$i]['employeeName'];?></td>
		<td><?=$row_jolabor[$i]['jobDescription'];?></td>
		<td align="center">
						<a class="btn btn-info" href="joborder_labor_add.php?add=1&id=<?=$row_jolabor[0]['id'];?>&deptcode=<?=$deptcode;?>&jono=<?=$id;?>"><i class="halflings-icon white plus"></i></a>
						<a class="btn btn-danger" onClick="deleteLabor(<?=$row_jolabor[0]['id'];?>,'<?=$deptcode;?>','<?=$id;?>');" href="#"><i class="halflings-icon white trash"></i></a>
					</td>
	</tr>
	<? $cnt++; } ?>
</table>
</div>
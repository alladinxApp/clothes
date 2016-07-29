<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$id = $_GET['id'];
	$jono = $_GET['jono'];
	$deptcode = $_GET['deptcode'];
	$errmsg = "";
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// CHECK JOB ORDER DEPARTMENT
	$chkjodept = new Table();
	$chkjodept->setSQLType($csdb->getSQLType());
	$chkjodept->setInstance($csdb->getInstance());
	$chkjodept->setView("joborderdepartment_v");
	$chkjodept->setParam("WHERE jobOrderReferenceNo = '$jono' AND departmentCode = '$deptcode'");
	$chkjodept->doQuery("query");
	$num_chkjodept = $chkjodept->getNumRows();

	if($num_chkjodept == 0){
		// INSERT JOB ORDER DEPARTMENT TRANSFER
		$updjodept = new Table();
		$updjodept->setSQLType($csdb->getSQLType());
		$updjodept->setInstance($csdb->getInstance());
		$updjodept->setTable("joborderdepartment");
		$updjodept->setValues("isCurrent = '0'");
		$updjodept->setParam("WHERE jobOrderReferenceNo = '$jono' AND isCurrent = '1'");
		$updjodept->doQuery("update");

		// INSERT JOB ORDER DEPARTMENT TRANSFER
		$jodepttrans = new Table();
		$jodepttrans->setSQLType($csdb->getSQLType());
		$jodepttrans->setInstance($csdb->getInstance());
		$jodepttrans->setTable("joborderdepartment");
		$jodepttrans->setValues("'$id','$jono','$deptcode','$today','$userid','$userid','$today'");
		$jodepttrans->setField("jobOrderMasterId,jobOrderReferenceNo,departmentCode,startDate,createdBy,startedBy,createdDate");
		$jodepttrans->doQuery("save");
	}else{
		// INSERT JOB ORDER DEPARTMENT TRANSFER
		$updjodept = new Table();
		$updjodept->setSQLType($csdb->getSQLType());
		$updjodept->setInstance($csdb->getInstance());
		$updjodept->setTable("joborderdepartment");
		$updjodept->setValues("isCurrent = '0'");
		$updjodept->setParam("WHERE jobOrderReferenceNo = '$jono' AND isCurrent = '1'");
		$updjodept->doQuery("update");

		// INSERT JOB ORDER DEPARTMENT TRANSFER
		$updjodept1 = new Table();
		$updjodept1->setSQLType($csdb->getSQLType());
		$updjodept1->setInstance($csdb->getInstance());
		$updjodept1->setTable("joborderdepartment");
		$updjodept1->setValues("isCurrent = '1'");
		$updjodept1->setParam("WHERE jobOrderReferenceNo = '$jono' AND departmentCode = '$deptcode'");
		$updjodept1->doQuery("update");
	}

	// SET JOB ORDER DEPARTMENT
	$jodept = new Table();
	$jodept->setSQLType($csdb->getSQLType());
	$jodept->setInstance($csdb->getInstance());
	$jodept->setView("joborderdepartment_v");
	$jodept->setParam("WHERE jobOrderReferenceNo = '$jono' ORDER BY startDate DESC");
	$jodept->doQuery("query");
	$row_jodept = $jodept->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
	function EndJob(){
		var id = $("#txtId").val();
		var jono = $("#txtJobOrderNo").val();
		var deptcode = $("#txtDepartment").val();
		var remarks = $("#txtRemarks").val();
		var strURL = 'inc-ajax/divUpdateJobOrderTransfer.php?id='+id+'&jono='+jono+'&deptcode='+deptcode+'&remarks='+remarks;

		if(remarks == "" || remarks == null){
			alert("Please enter remarks!");
			$("#txtRemarks").focus();
			return false;
		}

		$.ajax({
			url: strURL,
			type: 'GET',
			data: null,
			datatype: 'json',
			contentType: 'application/json; charset=utf-8',
			
			success: function (data) {
				$("#divDetails").replaceWith(data);
			},	
					
			error: function (request, status, err) {
				alert(status);
				alert(err);
			}
		});	
	}
</script>
<div id="divDetails">
<table class="table table-bordered table-condensed">
	<tr>
	  <th>#</th>
	  <th>DEPARTMENT</th>
	  <th>START DATE</th>
	  <th>END DATE</th>
	  <th>REMARKS</th>
	  <th>LABOR</th>
	</tr>
	<?
		$cnt = 1;
		$statuscnt = 0;
		for($i=0;$i<count($row_jodept);$i++){
			if($row_jodept[$i]['status'] == 0){
				$statuscnt++;
			}
	?>
	<tr>
		<td align="center"><?=$cnt;?></td>
		<td><? 
			echo $row_jodept[$i]['departmentName'];

			if($row_jodept[$i]['isCurrent'] == 1){
				echo ' <i class="halflings-icon ok"></i> ';
			}
			
		?></td>
		<td align="center"><?=dateFormat($row_jodept[$i]['startDate'],"M d, Y H:i:s A");?></td>
		<td align="center">
			<?
				if(!empty($row_jodept[$i]['endDate'])){
					echo dateFormat($row_jodept[$i]['endDate'],"M d, Y H:i:s A");
				}else{
			?>
			<input type="button" id="btnEndJob" name="btnEndJob" class="btn btn-primary" value=" End Job " onClick="return EndJob();" />
			<? } ?>
		</td>
		<td align="center">
			<? if(empty($row_jodept[$i]['remarks'])){ ?>
				<textarea rows="2" cols="40" style="resize: none; width: 200px; " name="txtRemarks" id="txtRemarks"></textarea>
				<input type="hidden" name="txtId" id="txtId" value="<?=$row_jodept[$i]['id'];?>">
			<? }else{ echo $row_jodept[$i]['remarks']; }?>
		</td>
		<td align="center">
			<? if($row_jodept[$i]['isCurrent'] == 1){ ?>
			<a href="joborder_labors.php?id=<?=$row_jodept[$i]['jobOrderReferenceNo'];?>&deptcode=<?=$row_jodept[$i]['departmentCode'];?>"><i class="icon-legal"></i> LABOR</a>
			<? }else{ ?>
			<a href="joborder_labor_print.php?id=<?=$row_jodept[$i]['jobOrderReferenceNo'];?>&deptcode=<?=$row_jodept[$i]['departmentCode'];?>" target="_blank"><i class="halflings-icon print"></i> PRINT</a>
			<? } ?>
		</td>
	</tr>
	<? $cnt++; } ?>
</table>
<input type="hidden" name="txtOpenTransfer" id="txtOpenTransfer" value="<?=$statuscnt;?>">
</div>
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

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// INSERT JOB ORDER DEPARTMENT TRANSFER
	$jodepttrans = new Table();
	$jodepttrans->setSQLType($csdb->getSQLType());
	$jodepttrans->setInstance($csdb->getInstance());
	$jodepttrans->setTable("joborderdepartment");
	$jodepttrans->setValues("'$id','$jono','$deptcode','$today','$userid','$userid','$today'");
	$jodepttrans->setField("jobOrderMasterId,jobOrderReferenceNo,departmentCode,startDate,createdBy,startedBy,createdDate");
	$jodepttrans->doQuery("save");

	// SET JOB ORDER DEPARTMENT
	$jodepttrans = new Table();
	$jodepttrans->setSQLType($csdb->getSQLType());
	$jodepttrans->setInstance($csdb->getInstance());
	$jodepttrans->setView("joborderdepartment_v");
	$jodepttrans->setParam("WHERE jobOrderReferenceNo = '$jono' ORDER BY startDate DESC");
	$jodepttrans->doQuery("query");
	$row_jodept = $jodepttrans->getLists();

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
		<td><?=$row_jodept[$i]['departmentName'];?></td>
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
	</tr>
	<? $cnt++; } ?>
</table>
<input type="hidden" name="txtOpenTransfer" id="txtOpenTransfer" value="<?=$statuscnt;?>">
</div>
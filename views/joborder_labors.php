<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-upload-alt"></i><span class="break"></span><b>Job Order Labors</b></h2>
			<div class="box-icon">
				<span class="break">
				<a href="joborder_edit.php?edit=1&id=<?=$id;?>"><i class="halflings-icon edit"></i> EDIT #<?=$id;?></a>
			</div>
			<div class="box-icon">
				<a href="joborder_transfer.php?edit=1&id=<?=$id;?>"><i class="halflings-icon backward"></i> Back to Assign To</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="txtJONo"> Job Order No </label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$id;?>" name="txtJONo" id="txtJONo" readonly type="text" placeholder="Employee Name Here..." />
					<input type="hidden" name="txtId" id="txtId" value="<?=$row_jodept[0]['id'];?>">
					<input type="hidden" name="txtJono" id="txtJono" value="<?=$id;?>">
					<input type="hidden" name="txtDeptCode" id="txtDeptCode" value="<?=$deptcode;?>">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtDept"> Department </label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$deptname;?>" name="txtDept" id="txtDept" readonly type="text" placeholder="Employee Name Here..." />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtEmployeeName"> Employee Name </label>
				<div class="controls">
					<input class="input-xlarge" name="txtEmployeeName" id="txtEmployeeName" type="text" placeholder="Employee Name Here..." />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtJobDescription"> Job Description </label>
				<div class="controls">
					<input class="input-xlarge" name="txtJobDescription" id="txtJobDescription" type="text" placeholder="Job Description Here..." />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtJobDescription"></label>
				<div class="controls">
					<input type="button" class="btn btn-primary" value="Add Employee" onClick="return AddEmployee();" />
				</div>
			</div>
			</form>
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
					<td><?=$row_jolabor[$i]['description'];?></td>
					<td align="center"><a href="joborder_labor_add.php?id=<?=$row_jolabor[0]['id'];?>&deptcode=<?=$deptcode;?>&jono=<?=$id;?>"><i class="halflings-icon plus"></i> LABOR</a></td>
				</tr>
				<? $cnt++; } ?>
			</table>
			</div>
		</div>
	</div>
</div>
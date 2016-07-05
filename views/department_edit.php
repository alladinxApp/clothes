<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon home"></i><span class="break"></span><b>Edit <?=$row_department[0]['description'];?></b></h2>
			<div class="box-icon">
				<a href="departments.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtDepartmentCode">Department Code</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_department[0]['departmentCode'];?>" name="txtDepartmentCode" id="txtDepartmentCode" disabled type="text" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDepartmentName">Name</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_department[0]['description'];?>" name="txtDepartmentName" id="txtDepartmentName" type="text" placeholder="Department Name Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_department[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_department[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="departments.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>
	</div>
</div>
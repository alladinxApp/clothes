<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon list-alt"></i><span class="break"></span><b>Edit <?=$row_laborcosts[0]['description'];?></b></h2>
			<div class="box-icon">
				<a href="laborcosts.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtLaborCostCode">Department Code</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_laborcosts[0]['laborCostsCode'];?>" name="txtDepartmentCode" id="txtDepartmentCode" disabled type="text" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDescription">Description</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_laborcosts[0]['description'];?>" name="txtDescription" id="txtDescription" type="text" placeholder="Labor Cost Name Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_laborcosts[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_laborcosts[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="laborcosts.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>
	</div>
</div>
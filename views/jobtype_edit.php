<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon tags"></i><span class="break"></span><b>Edit <?=$row_jobtype[0]['description'];?></b></h2>
			<div class="box-icon">
				<a href="jobtypes.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtJobTypeCode">Job Type Code</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jobtype[0]['jobTypeCode'];?>" name="txtJobTypeCode" id="txtJobTypeCode" disabled type="text" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDescription">Description</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jobtype[0]['description'];?>" name="txtDescription" id="txtDescription" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jobtype[0]['leadTime'];?>" name="txtLeadTime" id="txtLeadTime" type="text" placeholder="Lead Time Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtNotificationDay">Notification Day</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jobtype[0]['notificationDay'];?>" name="txtNotificationDay" id="txtNotificationDay" type="text" placeholder="Notification Day Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_jobtype[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_jobtype[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="jobtypes.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>
	</div>
</div>
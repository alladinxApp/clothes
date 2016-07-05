<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon tags"></i><span class="break"></span><b>Add New Job Type</b></h2>
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
							<input class="input-xlarge" name="txtJobTypeCode" id="txtJobTypeCode" disabled type="text" value="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDescription">Description</label>
						<div class="controls">
							<input class="input-xlarge" name="txtDescription" id="txtDescription" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" name="txtLeadTime" id="txtLeadTime" type="text" placeholder="Lead Time Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtNotificationDay">Notification Day</label>
						<div class="controls">
							<input class="input-xlarge" name="txtNotificationDay" id="txtNotificationDay" type="text" placeholder="Notification Day Here..." />
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save changes" />
						<a href="department_add.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="save" id="save" value="1" />
			</form>
		</div>
	</div>
</div>
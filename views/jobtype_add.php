<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon tags"></i><span class="break"></span><b>Add New Job Type</b></h2>
			<div class="box-icon">
				<a href="jobtypes.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal">
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
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
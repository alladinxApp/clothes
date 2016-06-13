<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Add New User</b></h2>
			<div class="box-icon">
				<a href="users.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtUserCode">User Code</label>
						<div class="controls">
							<input class="input-xlarge" name="txtUserCode" id="txtUserCode" disabled type="text" value="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtName">Name</label>
						<div class="controls">
							<input class="input-xlarge" name="txtName" id="txtName" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtUserType">User Type</label>
						<div class="controls">
							<select id="txtUserType" name="txtUserType">
								<option value="0">User</option>
								<option value="1">Administrator</option>
							</select>
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
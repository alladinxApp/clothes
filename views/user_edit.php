<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Add New User</b></h2>
			<div class="box-icon">
				<a href="users.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="Post">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtUsername">Username</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_user[0]['userName'];?>" readonly name="txtUsername" id="txtUsername" type="text" placeholder="Username Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtFullName">Full Name</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_user[0]['fullName'];?>" name="txtFullName" id="txtFullName" type="text" placeholder="Full Name Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtUserType">User Type</label>
						<div class="controls">
							<select id="txtUserType" name="txtUserType">
								<option value="0" <? if($row_user[0]['userType'] == 0){ echo 'selected'; } ?>>User</option>
								<option value="1" <? if($row_user[0]['userType'] == 1){ echo 'selected'; } ?>>Administrator</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_user[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_user[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="users.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>
	</div>
</div>
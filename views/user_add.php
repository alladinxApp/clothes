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
							<input class="input-xlarge" name="txtUsername" id="txtUsername" type="text" placeholder="Username Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtPassword">Password</label>
						<div class="controls">
							<input class="input-xlarge" name="txtPassword" id="txtPassword" type="password" placeholder="**********" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtConfirmPassword">Confirm Password</label>
						<div class="controls">
							<input class="input-xlarge" name="txtConfirmPassword" id="txttxtConfirmPasswordsername" type="password" placeholder="**********" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtFullName">Full Name</label>
						<div class="controls">
							<input class="input-xlarge" name="txtFullName" id="txtFullName" type="text" placeholder="Full Name Here..." />
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
						<input type="submit" class="btn btn-primary" value="Save changes" />
						<a href="user_add.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="save" id="save" value="1" />
			</form>
		</div>
	</div>
</div>
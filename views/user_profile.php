<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Profile</b></h2>
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
							<input class="input-xlarge" readonly value="<?=$row_user[0]['fullName'];?>" name="txtFullName" id="txtFullName" type="text" placeholder="Full Name Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtOldPassword">Old Password</label>
						<div class="controls">
							<input class="input-xlarge" name="txtOldPassword" id="txtOldPassword" onBlur="return chkOldPassword('<?=$userid;?>',this.value);" type="password" placeholder="**********" />
							<span id="divOldPassword"><input type="hidden" name="chkOldPass" id="chkOldPass" value="0" /></span>
						</div>
					</div>
					<div class="divNewPassword">
						<div class="control-group">
							<label class="control-label" for="txtNewPassword">New Password</label>
							<div class="controls">
								<input class="input-xlarge" name="txtNewPassword" id="txtNewPassword" type="password" placeholder="**********" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtConPassword">Confirm Password</label>
							<div class="controls">
								<input class="input-xlarge" name="txtConPassword" id="txtConPassword" onBlur="return chkNewPassword();" type="password" placeholder="**********" />
								<span id="divNewPassword"><input type="hidden" name="chkNewPass" id="chkNewPass" value="0" /></span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update Password</button>
					</div>
				</fieldset>
				<input type="hidden" name="updateProfile" id="updateProfile" value="1" />
			</form>
		</div>
	</div>
</div>
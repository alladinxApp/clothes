<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon list"></i><span class="break"></span><b>Add New Menu</b></h2>
			<div class="box-icon">
				<a href="menus.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtMenuCode">Menu Code</label>
						<div class="controls">
							<input class="input-xlarge" name="txtMenuCode" id="txtMenuCode" disabled type="text" value="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMenuName">Name</label>
						<div class="controls">
							<input class="input-xlarge" name="txtMenuName" id="txtMenuName" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMenuLink">Menu Link</label>
						<div class="controls">
							<input class="input-xlarge" name="txtMenuLink" id="txtMenuLink" type="text" placeholder="Link Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMenuIcon">Menu Icon</label>
						<div class="controls">
							<input class="input-xlarge" name="txtMenuIcon" id="txtMenuIcon" type="text" placeholder="Icon Here..." />
							<a href="icons.php" target="_blank">Reference Here</a>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsMaintenance">is Maintenance?</label>
						<div class="controls">
							<select name="txtIsMaintenance" id="txtIsMaintenance">
								<option value="1" selected>Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsTransactions">is Transactions?</label>
						<div class="controls">
							<select name="txtIsTransactions" id="txtIsTransactions">
								<option value="1">Yes</option>
								<option value="0" selected>No</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsReports">is Reports?</label>
						<div class="controls">
							<select name="txtIsReports" id="txtIsReports">
								<option value="1">Yes</option>
								<option value="0" selected>No</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save changes" />
						<a href="menu_add.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="save" id="save" value="1" />
			</form>
		</div>
	</div>
</div>
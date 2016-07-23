<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon list"></i><span class="break"></span><b>Edit <?=$row_menu[0]['description'];?></b></h2>
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
							<input class="input-xlarge" value="<?=$row_menu[0]['menuCode'];?>" name="txtMenuCode" id="txtMenuCode" disabled type="text" placeholder="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMenuName">Name</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_menu[0]['description'];?>" name="txtMenuName" id="txtMenuName" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMenuLink">Menu Link</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_menu[0]['link'];?>" name="txtMenuLink" id="txtMenuLink" type="text" placeholder="Link Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMenuIcon">Menu Icon</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_menu[0]['icon'];?>" name="txtMenuIcon" id="txtMenuIcon" type="text" placeholder="Icon Here..." />
							 <i class="<?=$menuTrans[0]['icon'];?>"></i> <a href="icons.php" target="_blank">Reference Here</a>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsMaintenance">is Maintenance?</label>
						<div class="controls">
							<select name="txtIsMaintenance" id="txtIsMaintenance">
								<option value="1" <? if($row_menu[0]['isMaintenance'] == 1){ echo 'selected'; } ?>>Yes</option>
								<option value="0" <? if($row_menu[0]['isMaintenance'] == 0){ echo 'selected'; } ?>>No</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsTransactions">is Transactions?</label>
						<div class="controls">
							<select name="txtIsTransactions" id="txtIsTransactions">
								<option value="1" <? if($row_menu[0]['isTransactions'] == 1){ echo 'selected'; } ?>>Yes</option>
								<option value="0" <? if($row_menu[0]['isTransactions'] == 0){ echo 'selected'; } ?>>No</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsReports">is Reports?</label>
						<div class="controls">
							<select name="txtIsReports" id="txtIsReports">
								<option value="1" <? if($row_menu[0]['isReports'] == 1){ echo 'selected'; } ?>>Yes</option>
								<option value="0" <? if($row_menu[0]['isReports'] == 0){ echo 'selected'; } ?>>No</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtSortNo">Sort No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_menu[0]['sortNo'];?>" name="txtSortNo" id="txtSortNo" type="text" placeholder="0" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_menu[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_menu[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="menus.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>
	</div>
</div>
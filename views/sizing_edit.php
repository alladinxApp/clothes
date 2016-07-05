<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon signal"></i><span class="break"></span><b>Edit <?=$row_sizing[0]['description'];?></b></h2>
			<div class="box-icon">
				<a href="sizings.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtSizingCode">Sizing Code</label>
						<div class="controls">
							<input class="input-xlarge" name="txtSizingCode" id="txtSizingCode" disabled type="text" value="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDescription">Description</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_sizing[0]['description'];?>" name="txtDescription" id="txtDescription" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_sizing[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_sizing[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="sizings.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>
	</div>
</div>
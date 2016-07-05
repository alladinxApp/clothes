<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon cog"></i><span class="break"></span><b>Edit <?=$row_ctrlno[0]['description'];?></b></h2>
			<div class="box-icon">
				<a href="controlnos.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtDescription">Description</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_ctrlno[0]['description'];?>" name="txtDescription" id="txtDescription" type="text" placeholder="Description Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtType">Control Type</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_ctrlno[0]['controlType'];?>" name="txtType" id="txtType" type="text" placeholder="Control Type Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtCode">Control Code</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_ctrlno[0]['controlCode'];?>" name="txtCode" id="txtCode" type="text" placeholder="Control Code Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtNoOfDigit">No. Of Digit</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_ctrlno[0]['noOfDigit'];?>" name="txtNoOfDigit" id="txtNoOfDigit" type="text" placeholder="No. Of Digit Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtLastDigit">Last Digit</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_ctrlno[0]['lastDigit'];?>" name="txtLastDigit" id="txtLastDigit" type="text" placeholder="Last Digit Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtRemarks">Remarks</label>
						<div class="controls">
							<textarea name="txtRemarks" id="txtRemarks" style="resize: none; width: 270px;"><?=$row_ctrlno[0]['remarks'];?></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_ctrlno[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_ctrlno[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="controlnos.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>

	</div>
</div>
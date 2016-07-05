<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Edit <?=$row_customer[0]['customerName'];?></b></h2>
			<div class="box-icon">
				<a href="customers.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtCustomerCode">Customer Code</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['customerCode'];?>" name="txtCustomerCode" id="txtCustomerCode" disabled type="text" value="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtName">Name</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['customerName'];?>" name="txtName" id="txtName" type="text" placeholder="Customer Name Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtBirthDate">Birth Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" value="<?=dateFormat($row_customer[0]['birthDate'],"m/d/Y");?>" name="txtBirthDate" id="txtBirthDate" type="text" placeholder="MM/DD/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['address'];?>" name="txtAddress" id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMobileNo">Mobile No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['mobileNo'];?>" name="txtMobileNo" id="txtMobileNo" type="text" placeholder="Mobile No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['telephoneNo'];?>" name="txtTelephoneNo" id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtEmailAddress">Email Address</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['emailAddress'];?>" name="txtEmailAddress" id="txtEmailAddress" type="text" placeholder="Email Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtFax">Fax</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['faxNo'];?>" name="txtFax" id="txtFax" type="text" placeholder="Fax Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTIN">TIN</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_customer[0]['TIN'];?>" name="txtTIN" id="txtTIN" type="text" placeholder="TIN Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsVAT">VAT</label>
						<div class="controls">
							<select id="txtIsVAT" name="txtIsVAT">
								<option value="0" <? if($row_customer[0]['isVat'] == 0){ echo 'selected'; } ?>>NO</option>
								<option value="1" <? if($row_customer[0]['isVat'] == 1){ echo 'selected'; } ?>>YES</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select name="txtStatus" id="txtStatus">
								<option value="1" <? if($row_customer[0]['status'] == 1){ echo 'selected'; } ?>>Active</option>
								<option value="0" <? if($row_customer[0]['status'] == 0){ echo 'selected'; } ?>>Inactive</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Update changes</button>
						<a href="customers.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="update" id="update" value="1" />
			</form>
		</div>

	</div>
</div>
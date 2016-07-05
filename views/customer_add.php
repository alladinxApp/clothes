<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Add New Customer</b></h2>
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
							<input class="input-xlarge" name="txtCustomerCode" id="txtCustomerCode" disabled type="text" value="[SYSTEM GENERATED]" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtName">Name</label>
						<div class="controls">
							<input class="input-xlarge" name="txtName" id="txtName" type="text" placeholder="Customer Name Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtBirthDate">Birth Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtBirthDate" id="txtBirthDate" type="text" placeholder="MM/DD/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" name="txtAddress" id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtMobileNo">Mobile No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtMobileNo" id="txtMobileNo" type="text" placeholder="Mobile No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtTelephoneNo" id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtEmailAddress">Email Address</label>
						<div class="controls">
							<input class="input-xlarge" name="txtEmailAddress" id="txtEmailAddress" type="text" placeholder="Email Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtFax">Fax</label>
						<div class="controls">
							<input class="input-xlarge" name="txtFax" id="txtFax" type="text" placeholder="Fax Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTIN">TIN</label>
						<div class="controls">
							<input class="input-xlarge" name="txtTIN" id="txtTIN" type="text" placeholder="TIN Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtIsVAT">VAT</label>
						<div class="controls">
							<select id="txtIsVAT" name="txtIsVAT">
								<option value="0">NO</option>
								<option value="1">YES</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save changes" />
						<a href="customer_add.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="save" id="save" value="1" />
			</form>
		</div>

	</div>
</div>
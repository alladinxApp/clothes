<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-truck"></i><span class="break"></span><b>Search Billing</b></h2>
			<div class="box-icon">
				<a href="billings.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal" method="POST" action="billings.php">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtBilledDate">Billed Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtFrom" id="txtFrom" readonly type="text" placeholder="From: MM/DD/YYYY" />
							<input class="input-xlarge datepicker" name="txtTo" id="txtTo" readonly type="text" placeholder="To: MM/DD/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtBillingNo">Billing No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtBillingNo" id="txtBillingNo" type="text" placeholder="Billing No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select id="txtStatus" name="txtStatus">
								<option value="">STATUS</option>
								<option value="0">PENDING</option>
								<option value="1">POSTED</option>
								<option value="2">CLOSED</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value=" SEARCH " />
						<a href="billings.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="billingSearch" id="billingSearch" value="1" />
			</form>
		</div>

	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-truck"></i><span class="break"></span><b>Search Delivery</b></h2>
			<div class="box-icon">
				<a href="deliveries.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal" method="POST" action="deliveries.php">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateDate">Created Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtFrom" id="txtFrom" readonly type="text" placeholder="From: MM/DD/YYYY" />
							<input class="input-xlarge datepicker" name="txtTo" id="txtTo" readonly type="text" placeholder="To: MM/DD/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDeliveryCode">Delivery No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtDeliveryCode" id="txtDeliveryCode" type="text" placeholder="Delivery No Here..." />
						</div>
					</div>
					<!-- <div class="control-group">
						<label class="control-label" for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" name="txtCustomer" id="txtCustomer" readonly type="text" placeholder="Customer Here..." />
						</div>
					</div>
					<input type="hidden" name="txtCustomerCode" id="txtCustomerCode" />
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<input class="input-xlarge" name="txtJobType" id="txtJobType" readonly type="text" placeholder="Job Type Here..." />
						</div>
					</div>
					<input type="hidden" name="txtJobTypeCode" id="txtJobTypeCode" /> -->
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select id="txtStatus" name="txtStatus">
								<option value="">STATUS</option>
								<option value="0">PENDING</option>
								<option value="1">DELIVERED</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value=" SEARCH " />
						<a href="deliveries.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="deliverySearch" id="deliverySearch" value="1" />
			</form>
		</div>

	</div>
</div>
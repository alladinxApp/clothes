<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-upload-alt"></i><span class="break"></span><b>Search Job Order</b></h2>
			<div class="box-icon">
				<a href="joborders.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal" method="POST" action="joborders.php">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateDate">Job Order Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtFrom" id="txtFrom" readonly type="text" placeholder="From: MM/DD/YYYY" />
							<input class="input-xlarge datepicker" name="txtTo" id="txtTo" readonly type="text" placeholder="To: MM/DD/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobOrderNo">Job Order No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtJobOrderNo" id="txtJobOrderNo" type="text" placeholder="Job Order No Here..." />
						</div>
					</div>
					<div class="control-group">
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
					<input type="hidden" name="txtJobTypeCode" id="txtJobTypeCode" />
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls">
							<select id="txtStatus" name="txtStatus">
								<option value="">STATUS</option>
								<option value="0">PENDING</option>
								<option value="1">ACKNOWLEDGED</option>
							</select>
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-primary" value=" SEARCH " />
						<a href="joborders.php" class="btn">Cancel</a>
					</div>
				</fieldset>
				<input type="hidden" name="jobOrderSearch" id="jobOrderSearch" value="1" />
			</form>
		</div>

	</div>
</div>

<!-- MODAL BOX FOR CUSTOMER LIST -->
<div id="divCustomersList">
	<div class="box-content">
		<table class="table table-bordered table-condensed">
			<tr>
				<th>#</th>
				<th>Customer Code</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Contact No</th>
				<th>Birth Date</th>
				<th>TIN</th>
				<th>is VAT</th>
			</tr>
			<? 
				$cnt = 1; 
				for($i=0;$i<count($row_customer);$i++){ 
					$customerCode = $row_customer[$i]['customerCode'];
					$customerName = $row_customer[$i]['customerName'];
					$address = $row_customer[$i]['address'];
					$telephoneNo = $row_customer[$i]['telephoneNo'];
			?>
			<tr style="cursor: pointer;" onclick="SelectCustomer('<?=$customerCode;?>','<?=$customerName;?>');">
				<td><?=$cnt;?></td>
				<td><?=$row_customer[$i]['customerCode'];?></td>
				<td><?=$row_customer[$i]['customerName'];?></td>
				<td><?=$row_customer[$i]['address'];?></td>
				<td><?=$row_customer[$i]['mobileNo'] . ' / ' . $row_customer[$i]['telephoneNo'];?></td>
				<td><?=$row_customer[$i]['birthDate'];?></td>
				<td><?=$row_customer[$i]['TIN'];?></td>
				<td><?=$row_customer[$i]['isVat'];?></td>
			</tr>
			<? $cnt++; } ?>
		</table>
	</div>
</div>
<!-- END MODAL BOX FOR CUSTOMER LIST -->

<!-- MODAL BOX FOR JOB TYPE LIST -->
<div id="divJobTypeList">
	<div class="box-content">
		<table class="table table-bordered table-condensed">
			<tr>
				<th>#</th>
				<th>Job Type Code</th>
				<th>Description</th>
				<th>Lead Time</th>
				<th>Notification Day</th>
			</tr>
			<? 
				$cnt = 1; 
				for($i=0;$i<count($row_jobtype);$i++){
					$jobtypecode = $row_jobtype[$i]['jobTypeCode'];
					$description = $row_jobtype[$i]['description'];
					$leadtime = $row_jobtype[$i]['leadTime'];
			?>
			<tr style="cursor: pointer;" onclick="SelectJobType('<?=$jobtypecode;?>','<?=$description;?>',<?=$leadtime;?>);">
				<td><?=$cnt;?></td>
				<td><?=$jobtypecode;?></td>
				<td><?=$description;?></td>
				<td align="center"><?=$leadtime;?></td>
				<td align="center"><?=$row_jobtype[$i]['notificationDay'];?></td>
			</tr>
			<? $cnt++; } ?>
		</table>
	</div>
</div>
<!-- END MODAL BOX FOR JOB TYPE LIST -->
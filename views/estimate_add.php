<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon cog"></i><span class="break"></span><b>Add New Estimate</b></h2>
			<div class="box-icon">
				<a href="estimates.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="estimateForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateNo">Estimate No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtEstimateNo" id="txtEstimateNo" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div id="divCustInfo">
					<div class="control-group">
						<label class="control-label" for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" name="txtCustomerName" readonly id="txtCustomerName" type="text" placeholder="Click Here..." />
							<input type="button" class="btn btn-info" name="btnNewCustomer" id="btnNewCustomer" value=" New " />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" name="txtAddress" readonly id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtTelephoneNo" readonly id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<input type="hidden" name="txtCustomer" id="txtCustomer" />
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
						<input class="input-xlarge" name="txtJobTypeDescription" readonly id="txtJobTypeDescription" type="text" placeholder="Click Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="chkIsRush">is Rush?</label>
						<div class="controls">
							<input type="checkbox" name="chkIsRush" id="chkIsRush" onClick="RushEstimate();" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" name="txtLeadTime" readonly id="txtLeadTime" type="text" placeholder="0" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDueDateDesc">Due Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtDueDateDesc" disabled id="txtDueDateDesc" type="text" placeholder="MM/DD/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAttachment">Attachment</label>
						<div class="controls">
							<input class="input-file uniform_on" id="txtAttachment" name="txtAttachment" type="file" />
						</div>
					</div> 
				</fieldset>
				
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Add Item</b></h2>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
						<td></td>
						<td><select name="txtSize" id="txtSize" style="width: 100px;">
					  		<? for($i=0;$i<count($row_sizing);$i++){ ?>
							<option value="<?=$row_sizing[$i]['sizingCode']."||".$row_sizing[$i]['description'];?>"><?=$row_sizing[$i]['description'];?></option>
							<? } ?>
						</select></td>
						<td><input class="input-small" name="txtPieces" id="txtPieces" type="text" placeholder="0" /></td>
						<td><input class="input-small" name="txtColor" id="txtColor" type="text" placeholder="Color here..." /></td>
						<td><select name="txtUOM" id="txtUOM" style="width: 100px;">
					  		<? for($i=0;$i<count($row_uom);$i++){ ?>
							<option value="<?=$row_uom[$i]['UOMCode']."||".$row_uom[$i]['description'];?>"><?=$row_uom[$i]['description'];?></option>
							<? } ?>
						</select></td>
						<td><input class="input-medium" name="txtMaterials" id="txtMaterials" type="text" size="60" placeholder="Materials here..." /></td>
						<td><input class="input-medium" name="txtSpecification" id="txtSpecification" type="text" placeholder="Specification Here..." /></td>
						<td><input type="button" class="btn btn-primary" value="Add Item" onClick="AddItem();" /></td>
					</tr>
				</table>
				<div id="divDetails">
				<table class="table table-bordered table-condensed">
					<tr>
					  <th>#</th>
					  <th>SIZES</th>
					  <th>PCS</th>
					  <th>COLOR</th>
					  <th>UOM</th>
					  <th>MATERIALS</th>
					  <th>SPEICIFICATION</th>
					  <th>REMOVE</th>
					</tr>
				</table>
				</div>
				
				<input type="hidden" name="txtItemArray" id="txtItemArr" value="" />

				<div class="control-group">
					<label class="control-label" for="txtDownPayment">Down Payment</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtDownPayment" id="txtDownPayment" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtAmount">Amount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtAmount" id="txtAmount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtDiscount" id="txtDiscount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Sub-Total</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtSubTotal" id="txtSubTotal" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtVat">Vat 12%</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtVat" id="txtVat" type="text" onBlur="return ComputeTotal();" readonly placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtTotalAmount" id="txtTotalAmount" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" name="btnEstimateSave" id="btnEstimateSave" class="btn btn-primary" value="Save changes" />
					<a href="controlno_add.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="estimateAdd" id="estimateAdd" value="1" />
				<input type="hidden" name="txtJobType" id="txtJobType" />
				<input type="hidden" name="txtDueDate" id="txtDueDate" />
			 </form>
		</div>
	</div>
</div>

<!-- MODAL BOX FOR CUSTOMER LIST -->
<div id="divCustomersList">
	<div class="box-content">
		<form>
		<div class="control-group">
			<label class="control-label" for="txtSearchCustomer" style="float: left; width: 130px; padding-top: 3px;"> Search Customer </label>
			<div class="controls" style="float: left;">
				<input class="input-xlarge" name="txtSearchCustomer" id="txtSearchCustomer" type="text" placeholder="Customer Name Here..." />
			</div>
		</div>
		<table class="table table-bordered table-condensed" id="customerHeader">
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
			<tr id="customerList" style="cursor: pointer;" onclick="SelectCustomer('<?=$customerCode;?>','<?=$customerName;?>','<?=$address;?>','<?=$telephoneNo;?>');">
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
	</form>
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

<!-- MODAL BOX FOR NEW CUSTOMER -->
<div id="divNewCustomer">
	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-content">
				<form class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="txtCustomerCode">Customer Code</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustomerCode" id="txtCustomerCode" disabled type="text" value="[SYSTEM GENERATED]" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustName">Name</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustName" id="txtCustName" type="text" placeholder="Customer Name Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustBirthDate">Birth Date</label>
							<div class="controls">
								<input class="input-xlarge datepicker" name="txtCustBirthDate" id="txtCustBirthDate" type="text" placeholder="MM/DD/YYYY" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustAddress">Address</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustAddress" id="txtCustAddress" type="text" placeholder="Address Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustMobileNo">Mobile No</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustMobileNo" id="txtCustMobileNo" type="text" placeholder="Mobile No Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustTelephoneNo">Telephone No</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustTelephoneNo" id="txtCustTelephoneNo" type="text" placeholder="Telephone No Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustEmailAddress">Email Address</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustEmailAddress" id="txtCustEmailAddress" type="text" placeholder="Email Address Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustFax">Fax</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustFax" id="txtCustFax" type="text" placeholder="Fax Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustTIN">TIN</label>
							<div class="controls">
								<input class="input-xlarge" name="txtCustTIN" id="txtCustTIN" type="text" placeholder="TIN Here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtCustIsVAT">VAT</label>
							<div class="controls">
								<select id="txtCustIsVAT" name="txtCustIsVAT">
									<option value="0">NO</option>
									<option value="1">YES</option>
								</select>
							</div>
						</div>
						<!-- <div class="form-actions">
							<input type="submit" class="btn btn-primary" value="Save changes" />
							<a href="customer_add.php" class="btn">Cancel</a>
						</div> -->
					</fieldset>
					<!-- <input type="hidden" name="save" id="save" value="1" /> -->
				</form>
			</div>

		</div>
	</div>
</div>
<!-- END MODAL BOX FOR NEW CUSTOMER -->
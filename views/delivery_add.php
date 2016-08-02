<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon cog"></i><span class="break"></span><b>Add New Delivery</b>
			</h2>
			<div class="box-icon">
				<a href="deliveries.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;" id="divCompletedJobOrder">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="deliveryForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtDeliveryCode">Delivery No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtDeliveryCode" id="txtDeliveryCode" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobOrderNo">Job Order No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtJobOrderNo" id="txtJobOrderNo" type="text" placeholder="Click Here..." readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" disabled for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" name="txtCustomer" readonly id="txtCustomer" type="text" placeholder="Customer here" />
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
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<input class="input-xlarge" name="txtJobType" readonly id="txtJobType" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="chkIsRush">is Rush?</label>
						<div class="controls">
							<input type="checkbox" name="chkIsRush" id="chkIsRush" disabled onClick="RushEstimate();" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" name="txtLeadTime" readonly id="txtLeadTime" type="text" placeholder="0" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDueDate">Due Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtDueDate" disabled id="txtDueDate" type="text" placeholder="mm/dd/YYYY" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAttachment"></label>
						<div class="controls">
							<? if(!empty($row_estmst[0]['attachment']) || $row_estmst[0]['attachment'] != "" || $row_estmst[0]['attachment'] != null){ ?>
							<a href="<?=ESTIMATEATTACHMENTS . dateFormat($row_estmst[0]['transactionDate'],"Ym") . "/" . $row_estmst[0]['quoteReferenceNo'] . "/" . $row_estmst[0]['attachment'];?>" target="_blank">
								<img src="<?=ESTIMATEATTACHMENTS . dateFormat($row_estmst[0]['transactionDate'],"Ym") . "/" . $row_estmst[0]['quoteReferenceNo'] . "/" . $row_estmst[0]['attachment'];?>">
							</a>
							<? } ?>
						</div>
					</div>
					<input type="hidden" name="txtCurrentAttachment" id="txtCurrentAttachment" value="<?=$row_estmst[0]['attachment'];?>" />
				</fieldset>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Item</b></h2>
				</div>
				<div id="divDtl">
				<table class="table table-bordered table-condensed">
					<tr>
					  <th>#</th>
					  <th>SIZES</th>
					  <th>PCS</th>
					  <th>COLOR</th>
					  <th>UOM</th>
					  <th>MATERIALS</th>
					  <th>SPECIFICATION</th>
					  <th>QTY</th>
					</tr>
				</table>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="txtAmount">Amount</label>
					<div class="controls">
						<input class="input-xlarge" readonly name="txtAmount" id="txtAmount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" readonly name="txtDiscount" id="txtDiscount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Sub-Total</label>
					<div class="controls">
						<input class="input-xlarge" name="txtSubTotal" id="txtSubTotal" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtVat">Vat 12%</label>
					<div class="controls">
						<input class="input-xlarge" name="txtVat" id="txtVat" type="text" onBlur="return ComputeTotal();" readonly placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" name="txtTotalAmount" id="txtTotalAmount" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Remarks</label>
					<div class="controls">
						<textarea rows="5" name="txtRemarks" id="txtRemarks" style="resize: none;" readonly><?=$row_estmst[0]['remarks'];?></textarea>
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" name="btnDeliverySave" id="btnDeliverySave" class="btn btn-primary" value="Save changes" />
					<a href="estimates.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="deliverySave" id="deliverySave" value="1" />
				<input type="hidden" name="joNo" id="joNo" value="" />
			 </form>
		</div>
	</div>
</div>

<!-- MODAL BOX FOR COMPLETED JOB ORDERS -->
<div id="divJobOrders">
	<div class="box-content">
		<table class="table table-bordered table-condensed">
			<tr>
				<th>#</th>
				<th>Job Order Code</th>
				<th>Estimate No</th>
				<th>Customer</th>
				<th>Job Type</th>
				<th>Rush</th>
			</tr>
			<? 
				$cnt = 1; 
				for($i=0;$i<count($row_joborders);$i++){
					$joNo = $row_joborders[$i]['jobOrderReferenceNo'];
			?>
			<tr style="cursor: pointer;" onclick="SelectJobOrder('<?=$joNo;?>');">
				<td><?=$cnt;?></td>
				<td><?=$joNo;?></td>
				<td><?=$row_joborders[$i]['quoteReferenceNo'];?></td>
				<td><?=$row_joborders[$i]['customerName'];?></td>
				<td><?=$row_joborders[$i]['jobTypeDesc'];?></td>
				<td><?=$row_joborders[$i]['isRushDesc'];?></td>
			</tr>
			<? $cnt++; } ?>
		</table>
	</div>
</div>
<!-- END MODAL BOX FOR COMPLETED JOB ORDERS -->
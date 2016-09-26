<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Daily Collection from <?=$row_billingmst[0]['customerName'];?></b></h2>
			<div class="box-icon">
				<a href="billing_print.php?id=<?=$row_billingmst[0]['billingReferenceNo'];?>" target="_blank"><i class="halflings-icon print"></i> PRINT</a>
			</div>
			<div class="box-icon">
				<a href="dailycollections.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>

		<div class="box-content">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="estimateForm">
				<fieldset>
					<div class="control-group">
					<label class="control-label" for="txtBillRefNo">Billing Reference No</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_billingmst[0]['billingReferenceNo'];?>" name="txtBillRefNo" id="txtBillRefNo" readonly type="text" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtJONo">Job Order No</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_billingmst[0]['jobOrderReferenceNo'];?>" name="txtJONo" id="txtJONo" readonly type="text" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtCustomerName">Customer Name</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_billingmst[0]['customerName'];?>" name="txtCustomerName" id="txtCustomerName" readonly type="text" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtJobType">Job Type</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_billingmst[0]['jobTypeDesc'];?>" name="txtJobType" id="txtJobType" readonly type="text" />
					</div>
				</div>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Deliveries</b></h2>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
						<!-- <th><input type="checkbox" name="chkAll" id="chkAll" checked onclick="SelectAll(this);"></th> -->
						<th>#</th>
						<th>Delivery Code</th>
						<th>Amount</th>
					</tr>
					<?
						$cnt = 1;
						$totalAmount = 0;
						for($i=0;$i<count($row_billingdtl);$i++){
							$bg = null;
							$font = null;
							$lbl = 'warning';
							if($cnt%2){
								$bg = 'background: #eee;';
							}

							$style = $bg;

							$totalAmount += $row_billingdtl[$i]['Amount'];
					?>
					<tr>
						<!-- <td align="center" style="<?=$style;?>"><input type="checkbox" checked onClick="return getTotalAmount();" name="chkDeliveryCode_<?=$cnt;?>" id="chkDeliveryCode_<?=$cnt;?>" value="<?=$row_billingdtl[$i]['deliveryCode'] .'#'. $row_billingdtl[$i]['totalAmount'];?>"></td> -->
						<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
						<td align="left" style="<?=$style;?>"><?=$row_billingdtl[$i]['deliveryCode'];?></td>
						<td align="right" style="<?=$style;?>"><?=number_format($row_billingdtl[$i]['Amount'],2);?></td>
					</tr>
					<? $cnt++; } $noOfItems = ($cnt - 1); $balance = ($totalAmount - $dpamnt); $amntPaid = ($row_billingmst[0]['totalAmount'] - $row_billingmst[0]['balance']);?>
				</table> 
				<input type="hidden" name="txtNoOfItems" id="txtNoOfItems" value="<?=$noOfItems;?>" />
				<? if(count($row_armst) > 0){ ?>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon home"></i><span class="break"></span><b>Payment History</b></h2>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
						<th>#</th>
						<th>AR#</th>
						<th>Tender</th>
						<th>Balance</th>
						<th>Date</th>
						<th>Remarks</th>
						<th>Print</th>
					</tr>
					<?
						$cnt = 1;
						for($i=0;$i<count($row_armst);$i++){
					?>
					<tr>
						<td align="center"><?=$cnt;?></td>
						<td><?=$row_armst[$i]['ARNo'];?></td>
						<td align="right"><?=number_format($row_armst[$i]['tender'],2);?></td>
						<td align="right"><?=number_format($row_armst[$i]['balance'],2);?></td>
						<td align="center"><?=dateFormat($row_armst[$i]['createdDate'],"m/d/Y");?></td>
						<td><?=$row_armst[$i]['remarks'];?></td>
						<td><a class="btn btn-info" href="#" onClick="SIPrint('<?=$row_armst[$i]['ARNo'];?>');" title="Print <?=$row_armst[$i]['ARNo'];?>">
							<i class="halflings-icon white print"></i> 
						</a></td>
					</tr>
					<? $cnt++; } ?>
				</table>
				<? } ?>
				<div class="control-group">
					<label class="control-label" for="txtAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($row_billingmst[0]['totalAmount'],2);?>" style="text-align: right;" name="txtAmount" id="txtAmount" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<? if($amntPaid > 0 || $row_billingmst[0]['status'] == 2){ ?>
				<div class="control-group">
					<label class="control-label" for="txtAmountPaid">Amount Paid</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($amntPaid,2);?>" style="text-align: right;" name="txtAmountPaid" id="txtAmountPaid" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtBalance">Outstanding Balance</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($row_billingmst[0]['balance'],2);?>" style="text-align: right;" name="txtBalance" id="txtBalance" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<? }else{ ?>
					<input class="input-xlarge" value="<?=number_format($row_billingmst[0]['balance'],2);?>" style="text-align: right;" name="txtBalance" id="txtBalance" type="hidden" />
				<? } ?>
				<div class="control-group">
					<label class="control-label" for="txtTender">Amount Received</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtTender" id="txtTender" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtRemarks">Remarks</label>
					<div class="controls">
						<textarea name="txtRemarks" id="txtRemarks" rows="5" style="resize: none;" palceholder="Remarks here.."></textarea>
					</div>
				</div>
				<!-- <div class="control-group">
					<label class="control-label" for="txtAmount">Change</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtChange" id="txtChange" readonly type="text" placeholder="0.00" />
					</div>
				</div> -->
				<? if($row_billingmst[0]['status'] == 1){ ?>
				<div class="form-actions">
					<input type="submit" name="btnARSave" id="btnARSave" class="btn btn-primary" value=" Save AR " />
				</div>
				<? } ?>
				</fieldset>
				<input type="hidden" name="ARSave" id="ARSave" value="1" />
			</form>
		</div>
	</div>
</div>
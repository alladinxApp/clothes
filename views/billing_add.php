<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Add New Billing to </b></h2>
			<div class="box-icon">
				<a href="billing_joborders.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="billing_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="estimateForm">
				<fieldset>
				<div class="control-group">
					<label class="control-label" for="txtCustomerName">Customer Name</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_joborders[0]['customerName'];?>" name="txtCustomerName" id="txtCustomerName" readonly type="text" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtJobType">Job Type</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_joborders[0]['jobTypeDesc'];?>" name="txtJobType" id="txtJobType" readonly type="text" placeholder="Click Here..." />
					</div>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
						<th><input type="checkbox" name="chkAll" id="chkAll" checked onclick="SelectAll(this);"></th>
						<th>#</th>
						<th>Delivery Code</th>
						<th>Job Order Code</th>
						<th>Estimate Code</th>
						<th>Amount</th>
					</tr>
					<?
						$cnt = 1;
						$totalAmount = 0;
						for($i=0;$i<count($row_deliveries);$i++){
							$bg = null;
							$font = null;
							$lbl = 'warning';
							if($cnt%2){
								$bg = 'background: #eee;';
							}

							$style = $bg;

							$totalAmount += $row_deliveries[$i]['totalAmount'];
					?>
					<tr>
						<td align="center" style="<?=$style;?>"><input type="checkbox" checked onClick="return getTotalAmount();" name="chkDeliveryCode_<?=$cnt;?>" id="chkDeliveryCode_<?=$cnt;?>" value="<?=$row_deliveries[$i]['deliveryCode'] .'#'. $row_deliveries[$i]['totalAmount'];?>"></td>
						<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
						<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['deliveryCode'];?></td>
						<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['jobOrderReferenceNo'];?></td>
						<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['quoteReferenceNo'];?></td>
						<td align="right" style="<?=$style;?>"><?=number_format($row_deliveries[$i]['totalAmount'],2);?></td>
					</tr>
					<? $cnt++; } $noOfItems = ($cnt - 1); ?>
				</table> 
				<input type="hidden" name="txtNoOfItems" id="txtNoOfItems" value="<?=$noOfItems;?>" />
				<div class="control-group">
					<label class="control-label" for="txtDownPayment">Down Payment</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" readonly value="<?=$dpamnt;?>" name="txtDownPayment" id="txtDownPayment" value="" type="text" placeholder="0.00" />
						<input type="checkbox" name="chkApplyDP" id="chkApplyDP" checked /> Apply
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($totalAmount,2);?>" style="text-align: right;" name="txtAmount" id="txtAmount" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtAmountReceived">Amount Received</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtAmountReceived" id="txtAmountReceived" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtChange">Change</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" name="txtChange" id="txtChange" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" name="btnBillingSave" id="btnBillingSave" class="btn btn-primary" value="Save changes" />
				</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
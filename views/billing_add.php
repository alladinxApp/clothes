<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Add New Billing to <?=$row_joborders[0]['customerName'];?></b></h2>
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
						<th><!--<input type="checkbox" name="chkAll" id="chkAll" checked onclick="SelectAll(this);">--></th>
						<th>#</th>
						<th>Delivery Code</th>
						<th>Job Order Code</th>
						<th>Estimate Code</th>
						<th>Status</th>
						<th>Amount</th>
					</tr>
					<?
						$cnt = 1;
						$totalAmount = 0;
						$pendingcnt = 0;
						for($i=0;$i<count($row_deliveries);$i++){
							$bg = null;
							$lbl = 'warning';
							$checked = "checked";
							if($cnt%2){
								$bg = 'background: #eee;';
							}
							switch($row_deliveries[$i]['status']){
								case 1:
										$lbl = 'success';
										$totalAmount += $row_deliveries[$i]['totalAmount'];
									break;
								case 3:
										$lbl = 'important';
									break;
								default: $pendingcnt++; $checked = null; break;
							}
							$style = $bg;
					?>
					<tr>
						<td align="center" style="<?=$style;?>">
							<? if($row_deliveries[$i]['status'] == 1){ ?>
							<input type="checkbox" checked onClick="return ComputeTotal();" name="chkDeliveryCode[]" id="chkDeliveryCode[]]" value="<?=$row_deliveries[$i]['deliveryCode'] .'#'. $row_deliveries[$i]['totalAmount'];?>">
							<? }else{ ?>
							&nbsp;
							<? } ?>
						</td>
						<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
						<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['deliveryCode'];?></td>
						<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['jobOrderReferenceNo'];?></td>
						<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['quoteReferenceNo'];?></td>
						<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_deliveries[$i]['statusDesc'];?></span></td>
						<td align="right" style="<?=$style;?>"><?=number_format($row_deliveries[$i]['totalAmount'],2);?></td>
					</tr>
					<? $cnt++; } $noOfItems = ($cnt - 1); $balance = ($totalAmount - $dpamnt);?>
				</table> 
				<input type="hidden" name="txtNoOfItems" id="txtNoOfItems" value="<?=$noOfItems;?>" />
				<div class="control-group">
					<label class="control-label" for="txtAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($totalAmount,2);?>" style="text-align: right;" name="txtAmount" id="txtAmount" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" name="btnBillingSave" id="btnBillingSave" class="btn btn-primary" value="Save changes" />
				</div>
				</fieldset>
				<input type="hidden" name="billingSaved" id="billingSaved" value="1" />
			</form>
		</div>
	</div>
</div>
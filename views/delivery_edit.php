<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="icon-truck"></i><span class="break"></span><b>Add New Delivery</b>
			</h2>
			<div class="box-icon">
				<span class="break">
				<a href="delivery_print.php?id=<?=$id;?>" target="_blank"><i class="halflings-icon print"></i> PRINT</a>
			</div>
			<div class="box-icon">
				<span class="break">
				<a href="delivery_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="deliveries.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal" method="POST" name="estimateForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtDeliveryCode">Delivery No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$id;?>" name="txtDeliveryCode" id="txtDeliveryCode" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobOrderNo">Job Order No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_deliverymst[0]['jobOrderReferenceNo'];?>" name="txtJobOrderNo" id="txtJobOrderNo" type="text" placeholder="Click Here..." readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" disabled for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_deliverymst[0]['customerName'];?>" name="txtCustomer" readonly id="txtCustomer" type="text" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_deliverymst[0]['address'];?>" name="txtAddress" readonly id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_deliverymst[0]['customerTelNo'];?>" name="txtTelephoneNo" readonly id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_deliverymst[0]['jobTypeDesc'];?>" name="txtJobType" readonly id="txtJobType" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="chkIsRush">is Rush?</label>
						<div class="controls">
							<input type="checkbox" name="chkIsRush" id="chkIsRush" disabled <? if($row_deliverymst[0]['isRush'] > 0){ echo 'checked'; } ?> onClick="RushEstimate();" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_deliverymst[0]['leadTime'];?>" name="txtLeadTime" readonly id="txtLeadTime" type="text" placeholder="0" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDueDate">Due Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" value="<?=dateFormat($row_deliverymst[0]['dueDate'],"m-d-Y");?>" name="txtDueDate" disabled id="txtDueDate" type="text" placeholder="mm/dd/YYYY" />
						</div>
					</div>
				</fieldset>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Items</b></h2>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
					  <th>#</th>
					  <th>SIZES</th>
					  <th>COLOR</th>
					  <th>UOM</th>
					  <th>ACTUAL MATERIALS</th>
					  <th>SPECIFICATION</th>
					  <th>PRICE</th>
					  <th>QUANTITY</th>
					  <th>TOTAL</th>
					</tr>
					<?
						$cnt = 1;
						$arrItems = "";
						for($i=0;$i<count($row_deliverydtl);$i++){
							$total = 0;
							$total = ($row_deliverydtl[$i]['price'] * $row_deliverydtl[$i]['quantity']);
							$totalamount += $total;
					?>
					<tr>
						<td align="center"><?=$cnt;?></td>
						<td><?=$row_deliverydtl[$i]['sizeDesc'];?></td>
						<td><?=$row_deliverydtl[$i]['color'];?></td>
						<td><?=$row_deliverydtl[$i]['uomDesc'];?></td>
						<td><?=$row_deliverydtl[$i]['material'];?></td>
						<td><?=$row_deliverydtl[$i]['specification'];?></td>
						<td align="center">
							<input class="input-small" readonly style="text-align:right;" type="text" name="txtPrice<?=$row_deliverydtl[$i]['id'];?>" id="txtPrice<?=$row_deliverydtl[$i]['id'];?>" value="<?=number_format($row_deliverydtl[$i]['price'],2);?>" placeholder="0.00" />
						</td>
						<td align="center">
							<input class="input-small" readonly style="text-align:center;" type="text" name="txtActual_<?=$row_deliverydtl[$i]['id'];?>" id="txtActual_<?=$row_deliverydtl[$i]['id'];?>" value="<?=$row_deliverydtl[$i]['quantity'];?>" />
						</td>
						<td align="right"><input class="input-small" style="text-align:right;" value="<?=number_format($total,2);?>" readonly style="text-align:center;" type="text" name="txtTotal_<?=$row_deliverydtl[$i]['id'];?>" id="txtTotal_<?=$row_deliverydtl[$i]['id'];?>" /></td>
					</tr>
					<? $cnt++; } ?>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right">Total >>>>></td>
						<td align="right"><input class="input-small" style="text-align:right;" value="<?=number_format($totalamount,2);?>" readonly style="text-align:center;" type="text" name="txtAmount" id="txtAmount" /></td>
					</tr>
				</table>
				
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($row_deliverymst[0]['discount'],2)?>" onKeyUp="return ComputeTotal();" name="txtDiscount" id="txtDiscount" style="text-align:right;" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Sub-Total</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($row_deliverymst[0]['subTotal'],2)?>" name="txtSubTotal" id="txtSubTotal" style="text-align:right;" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtVat">Vat 12%</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($row_deliverymst[0]['vat'],2)?>"  name="txtVat" id="txtVat" type="text" style="text-align:right;" readonly placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=number_format($row_deliverymst[0]['totalAmount'],2)?>" name="txtTotalAmount" id="txtTotalAmount" style="text-align:right;" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<? if($row_deliverymst[0]['status'] != 0){ $disableStatus = 'disabled'; } ?>
				<div class="control-group">
					<label class="control-label" for="txtStatus">Status</label>
					<div class="controls">
						<select name="txtStatus" id="txtStatus" <?=$disableStatus;?> >
							<option value="0" <? if($row_deliverymst[0]['status'] == 0){ echo 'selected';} ?>>PENDING</option>
							<option value="1" <? if($row_deliverymst[0]['status'] == 1){ echo 'selected';} ?>>ACKNOWLEDGE</option>
						</select>
					</div>
				</div>

				<div class="form-actions">
					<input type="submit" name="btnDeliveryUpdate" id="btnDeliveryUpdate" class="btn btn-primary" value=" Update changes " />
					<a href="deliveries.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="deliveryUpdate" id="deliveryUpdate" value="1" />
				<input type="hidden" name="delNo" id="delNo" value="<?=$id;?>" />
			 </form>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon cog"></i><span class="break"></span><b>Edit Estimate #<?=$id;?></b>
			</h2>
			<div class="box-icon">
				<span class="break">
				<a href="estimate_print.php?id=<?=$row_estmst[0]['quoteReferenceNo'];?>" target="_blank"><i class="halflings-icon print"></i> PRINT</a>
			</div>
			<div class="box-icon">
				<span class="break">
				<a href="estimate_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="estimates.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="estimateForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateNo">Estimate No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['quoteReferenceNo'];?>" name="txtEstimateNo" id="txtEstimateNo" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtEstimateDate">Estimate Date</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=dateFormat($row_estmst[0]['transactionDate'],"m-d-Y");?>" name="txtEstimateDate" id="txtEstimateDate" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" disabled for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['customerName'];?>" name="txtCustomer" readonly id="txtCustomer" type="text" />
						</div>
					</div>
					<span id="divCustInfo">
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['address'];?>" name="txtAddress" readonly id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['customerTelNo'];?>" name="txtTelephoneNo" readonly id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					</span>
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['jobTypeDesc'];?>" name="txtJobType" readonly id="txtJobType" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="chkIsRush">is Rush?</label>
						<div class="controls">
							<input type="checkbox" name="chkIsRush" id="chkIsRush" disabled <? if($row_estmst[0]['isRush'] > 0){ echo 'checked'; } ?> onClick="RushEstimate();" />
						</div>
					</div>
					<span id="divJobTypeInfo">
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['leadTime'];?>" name="txtLeadTime" readonly id="txtLeadTime" type="text" placeholder="0" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDueDate">Due Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" value="<?=dateFormat($row_estmst[0]['dueDate'],"m-d-Y");?>" name="txtDueDate" disabled id="txtDueDate" type="text" placeholder="mm/dd/YYYY" />
						</div>
					</div>
					</span>
					<div class="control-group">
						<label class="control-label" for="txtAttachment">Attachment</label>
						<div class="controls">
							<input class="input-file uniform_on" id="txtAttachment" name="txtAttachment" type="file" />
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
				<? if($row_estmst[0]['status'] == 0){ ?>
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
						<td><input class="input-medium" name="txtMaterials" id="txtMaterials" type="text" placeholder="Materials here..." /></td>
						<td><input class="input-medium" name="txtSpecification" id="txtSpecification" type="text" placeholder="Specification Here..." /></td>
						<td><input type="button" class="btn btn-primary" value="Add Item" onClick="AddItem();" /></td>
					</tr>
				</table>
				<? } ?>
				<div id="divDetails">
				<table class="table table-bordered table-condensed">
					<tr>
					  <th>#</th>
					  <th>SIZES</th>
					  <th>PCS</th>
					  <th>COLOR</th>
					  <th>UOM</th>
					  <th>MATERIALS</th>
					  <th>SPECIFICATION</th>
					  <? if($row_estmst[0]['status'] == 0){ ?>
					  <th>REMOVE</th>
					  <? } ?>
					</tr>
					<?
						$cnt = 1;
						$items = explode("::",$itemArray);
						for($i=0;$i<count($items);$i++){
							$item = explode("||",$items[$i]);
							$itemid = $item[0];
							$size = $item[2];
							$qty = $item[3];
							$color = $item[4];
							$uom = $item[6];
							$mat = $item[7];
							$spec = $item[8];
					?>
					<tr>
						<td align="center"><?=$cnt;?></td>
						<td><?=$size;?></td>
						<td align="center"><?=$qty;?></td>
						<td><?=$color;?></td>
						<td><?=$uom;?></td>
						<td><?=$mat;?></td>
						<td><?=$spec;?></td>
						<? if($row_estmst[0]['status'] == 0){ ?>
						<td align="center"><a href="#" onClick="RemoveItem('<?=$itemid;?>')"><img src="img/del_ico.png" width="20" border="0" /></td>
						<? } ?>
					</tr>
					<? $cnt++; } ?>
				</table>
				</div>
				
				<input type="hidden" name="txtItemArray" id="txtItemArr" value="<?=$itemArray;?>" />
				<? 
					$subTotal = $row_estmst[0]['subTotal'];
					if( $row_estmst[0]['downPayment'] > 0){ 
						$subTotal = ($row_estmst[0]['amount'] - $row_estmst[0]['downPayment']);
				?>
				<div class="control-group">
					<label class="control-label" for="txtDownPayment">Down Payment</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" value="<?=number_format($row_estmst[0]['downPayment'],2);?>" name="txtDownPayment" id="txtDownPayment" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<? } ?>
				<div class="control-group">
					<label class="control-label" for="txtAmount">Amount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_estmst[0]['amount'],2);?>" name="txtAmount" id="txtAmount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_estmst[0]['discount'],2);?>" name="txtDiscount" id="txtDiscount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Sub-Total</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($subTotal,2);?>" name="txtSubTotal" id="txtSubTotal" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtVat">Vat 12%</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_estmst[0]['vat'],2);?>" name="txtVat" id="txtVat" type="text" onBlur="return ComputeTotal();" readonly placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_estmst[0]['totalAmount'],2);?>" name="txtTotalAmount" id="txtTotalAmount" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group" id="divTxtBalance">
					<label class="control-label" for="txtBalance">Balance</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_estmst[0]['balance'],2);?>" readonly name="txtBalance" id="txtBalance" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Remarks</label>
					<div class="controls">
						<textarea rows="5" name="txtRemarks" id="txtRemarks" style="resize: none;"><?=$row_estmst[0]['remarks'];?></textarea>
					</div>
				</div>
				<? if($row_estmst[0]['status'] != 0){ $disableStatus = 'disabled'; } ?>
				<div class="control-group">
					<label class="control-label" for="txtStatus">Status</label>
					<div class="controls">
						<select name="txtStatus" id="txtStatus" <?=$disableStatus;?> >
							<option value="0" <? if($row_estmst[0]['status'] == 0){ echo 'selected';} ?>>PENDING</option>
							<option value="1" <? if($row_estmst[0]['status'] == 1){ echo 'selected';} ?>>ACKNOWLEDGE</option>
							<option value="3" <? if($row_estmst[0]['status'] == 3){ echo 'selected';} ?>>CANCEL</option>
						</select>
					</div>
				</div>
				<? if($row_estmst[0]['status'] == 0){ ?>
				<div class="form-actions">
					<input type="submit" name="btnEstimateSave" id="btnEstimateSave" class="btn btn-primary" value="Update changes" />
					<a href="estimates.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="estimateUpdate" id="estimateUpdate" value="1" />
				<input type="hidden" name="estMstId" id="estMstId" value="<?=$row_estmst[0]['id'];?>" />
				<? } ?>
				<? if($row_estmst[0]['status'] == 1){ ?>
			 	<div class="control-group">
					<label class="control-label" for="btnEstimatePrint"></label>
					<div class="controls">
						<input type="button" name="btnEstimatePrint" id="btnEstimatePrint" class="btn btn-primary" value=" Print Estimate " onClick="EstimatePrint('<?=$row_estmst[0]['quoteReferenceNo'];?>');" />
					</div>
				</div>
				<? } ?>
			 </form>
		</div>
	</div>
</div>
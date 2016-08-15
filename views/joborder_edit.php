<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="icon-upload-alt"></i><span class="break"></span><b>Job Order #<?=$id;?></b>
			</h2>
			<? if($row_jomst[0]['status'] == 1){ ?>
			<div class="box-icon">
				<span class="break">
				<a href="joborder_print.php?id=<?=$row_jomst[0]['jobOrderReferenceNo'];?>" target="_blank"><i class="halflings-icon print"></i> PRINT</a>
			</div>
			<? } ?>
			<div class="box-icon">
				<span class="break">
				<a href="joborder_transfer.php?edit=1&id=<?=$row_jomst[0]['jobOrderReferenceNo'];?>"><i class="halflings-icon home"></i> Assign To</a>
			</div>
			<div class="box-icon">
				<a href="joborders.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="estimateForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtJobOrderNo">Job Order No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jomst[0]['jobOrderReferenceNo'];?>" name="txtJobOrderNo" id="txtJobOrderNo" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobOrderDate">Job Order Date</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=dateFormat($row_jomst[0]['createdDate'],"m-d-Y");?>" name="txtJobOrderDate" id="txtJobOrderDate" type="text" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" disabled for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jomst[0]['customerName'];?>" name="txtCustomer" readonly id="txtCustomer" type="text" />
						</div>
					</div>
					<span id="divCustInfo">
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jomst[0]['address'];?>" name="txtAddress" readonly id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jomst[0]['customerTelNo'];?>" name="txtTelephoneNo" readonly id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					</span>
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jomst[0]['jobTypeDesc'];?>" name="txtJobType" readonly id="txtJobType" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="chkIsRush">is Rush?</label>
						<div class="controls">
							<input type="checkbox" name="chkIsRush" id="chkIsRush" disabled <? if($row_jomst[0]['isRush'] > 0){ echo 'checked'; } ?> onClick="RushEstimate();" />
						</div>
					</div>
					<span id="divJobTypeInfo">
					<div class="control-group">
						<label class="control-label" for="txtLeadTime">Lead Time</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_jomst[0]['leadTime'];?>" name="txtLeadTime" readonly id="txtLeadTime" type="text" placeholder="0" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDueDate">Due Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" value="<?=dateFormat($row_jomst[0]['dueDate'],"m-d-Y");?>" name="txtDueDate" disabled id="txtDueDate" type="text" placeholder="mm/dd/YYYY" />
						</div>
					</div>
					</span>
					<div class="control-group">
						<label class="control-label" for="txtAttachment"></label>
						<div class="controls">
							<? if(!empty($row_jomst[0]['attachment']) || $row_jomst[0]['attachment'] != "" || $row_jomst[0]['attachment'] != null){ ?>
							<a href="<?=ESTIMATEATTACHMENTS . dateFormat($row_jomst[0]['transactionDate'],"Ym") . "/" . $row_jomst[0]['quoteReferenceNo'] . "/" . $row_jomst[0]['attachment'];?>" target="_blank">
								<img src="<?=ESTIMATEATTACHMENTS . dateFormat($row_jomst[0]['transactionDate'],"Ym") . "/" . $row_jomst[0]['quoteReferenceNo'] . "/" . $row_jomst[0]['attachment'];?>">
							</a>
							<? } ?>
						</div>
					</div>
					<input type="hidden" name="txtCurrentAttachment" id="txtCurrentAttachment" value="<?=$row_jomst[0]['attachment'];?>" />
				</fieldset>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Items</b></h2>
				</div>
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
					  <? if($row_jomst[0]['status'] == 0){ ?>
					  <th>ACTUAL</th>
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
							$actual = $item[9];
					?>
					<tr>
						<td align="center"><?=$cnt;?></td>
						<td><?=$size;?></td>
						<td align="center"><?=$qty;?></td>
						<td><?=$color;?></td>
						<td><?=$uom;?></td>
						<td><?=$mat;?></td>
						<td><?=$spec;?></td>
						<? if($row_jomst[0]['status'] == 0){ ?>
						<td align="center">
							<textarea rows="1" cols="20" style="resize: none;" name="txtMaterial_<?=$itemid;?>" id="txtMaterial_<?=$itemid;?>"><?=$actual;?></textarea>
						</td>
						<? } ?>
					</tr>
					<? $cnt++; } ?>
				</table>
				</div>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon home"></i><span class="break"></span><b>Department History</b></h2>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
					  <th>#</th>
					  <th>DEPARTMENT</th>
					  <th>START DATE</th>
					  <th>END DATE</th>
					  <th>REMARKS</th>
					</tr>
					<?
						$cnt = 1;
						$statuscnt = 0;
						for($i=0;$i<count($row_jodept);$i++){
							if($row_jodept[$i]['status'] == 0){
								$statuscnt++;
							}
					?>
					<tr>
						<td align="center"><?=$cnt;?></td>
						<td><? 
							echo $row_jodept[$i]['departmentName'];

							if($row_jodept[$i]['isCurrent'] == 1){
								echo ' <i class="halflings-icon ok"></i> ';
							}
							
						?></td>
						<td align="center"><?=dateFormat($row_jodept[$i]['startDate'],"M d, Y H:i:s A");?></td>
						<td align="center">
							<?
								if(!empty($row_jodept[$i]['endDate'])){
									echo dateFormat($row_jodept[$i]['endDate'],"M d, Y H:i:s A");
								}else{  } ?>
						</td>
						<td>
							<? if(empty($row_jodept[$i]['remarks'])){ }else{ echo $row_jodept[$i]['remarks']; }?>
						</td>
					</tr>
					<? $cnt++; } ?>
				</table>
				
				<input type="hidden" name="txtItemArray" id="txtItemArr" value="<?=$itemArray;?>" />

				<div class="control-group">
					<label class="control-label" for="txtAmount">Amount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_jomst[0]['amount'],2);?>" disabled name="txtAmount" id="txtAmount" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_jomst[0]['discount'],2);?>" disabled name="txtDiscount" id="txtDiscount" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Sub-Total</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_jomst[0]['subTotal'],2);?>" name="txtSubTotal" id="txtSubTotal" disabled type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtVat">Vat 12%</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_jomst[0]['vat'],2);?>" name="txtVat" id="txtVat" type="text" disabled placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" style="text-align: right;" value="<?=number_format($row_jomst[0]['totalAmount'],2);?>" name="txtTotalAmount" id="txtTotalAmount" disabled type="text" placeholder="0.00" />
					</div>
				</div>
				<? if($row_jomst[0]['status'] != 0){ $disableStatus = 'disabled'; } ?>
				<div class="control-group">
					<label class="control-label" for="txtStatus">Status</label>
					<div class="controls">
						<select name="txtStatus" id="txtStatus" <?=$disableStatus;?> >
							<option value="0" <? if($row_jomst[0]['status'] == 0){ echo 'selected';} ?>>PENDING</option>
							<option value="1" <? if($row_jomst[0]['status'] == 1){ echo 'selected';} ?>>COMPLETED</option>
						</select>
					</div>
				</div>
				<? if($row_jomst[0]['status'] == 0){ ?>
				<div class="form-actions">
					<input type="submit" name="btnJobOrderSave" id="btnJobOrderSave" class="btn btn-primary" value=" Update changes " />
					<a href="estimates.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="jobOrderUpdate" id="jobOrderUpdate" value="1" />
				<input type="hidden" name="estMstId" id="estMstId" value="<?=$row_jomst[0]['id'];?>" />
				<? } ?>
				<? if($row_jomst[0]['status'] == 1){ ?>
			 	<div class="control-group">
					<label class="control-label" for="btnJobOrderPrint"></label>
					<div class="controls">
						<input type="button" name="btnJobOrderPrint" id="btnJobOrderPrint" class="btn btn-primary" value=" Print Job Order " onClick="JobOrderPrint('<?=$row_jomst[0]['jobOrderReferenceNo'];?>');" />
					</div>
				</div>
				<? } ?>
			 </form>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon cog"></i><span class="break"></span><b>Add New Estimate</b></h2>
			<div class="box-icon">
				<a href="estimate_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="estimates.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateNo">Estimate No</label>
						<div class="controls">
							<input class="input-xlarge" value="<?=$row_estmst[0]['quoteReferenceNo'];?>" name="txtEstimateNo" id="txtEstimateNo" type="text" placeholder="[SYSTEM GENERATED]" readonly />
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
						<label class="control-label" for="txtAttachment">Attachment</label>
						<div class="controls">
							<input class="input-file uniform_on" id="txtAttachment" name="txtAttachment" type="file" />
						</div>
					</div> 
					<div class="control-group">
						<label class="control-label" for="txtAttachment"></label>
						<div class="controls">
							<a href="<?=ESTIMATEATTACHMENTS . dateFormat($row_estmst[0]['transactionDate'],"Ym") . "/" . $row_estmst[0]['quoteReferenceNo'] . "/" . $row_estmst[0]['attachment']?>" target="_blank">
								<img src="<?=ESTIMATEATTACHMENTS . dateFormat($row_estmst[0]['transactionDate'],"Ym") . "/" . $row_estmst[0]['quoteReferenceNo'] . "/" . $row_estmst[0]['attachment']?>">
							</a>
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
					  		<option value="">Size</option>
					  		<? for($i=0;$i<count($row_sizing);$i++){ ?>
							<option value="<?=$row_sizing[$i]['sizingCode']."||".$row_sizing[$i]['description'];?>"><?=$row_sizing[$i]['description'];?></option>
							<? } ?>
						</select></td>
						<td><input class="input-small" name="txtPieces" id="txtPieces" type="text" placeholder="0" /></td>
						<td><input class="input-small" name="txtColor" id="txtColor" type="text" placeholder="Color here..." /></td>
						<td><select name="txtUOM" id="txtUOM" style="width: 100px;">
					  		<option value="">UOM</option>
					  		<? for($i=0;$i<count($row_uom);$i++){ ?>
							<option value="<?=$row_uom[$i]['UOMCode']."||".$row_uom[$i]['description'];?>"><?=$row_uom[$i]['description'];?></option>
							<? } ?>
						</select></td>
						<td><input class="input-medium" name="txtMaterials" id="txtMaterials" type="text" placeholder="Materials here..." /></td>
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
					  <th>SPECIFICATION</th>
					  <th>REMOVE</th>
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
							$mat = $item[5];
							$uom = $item[6];
							$spec = $item[7];
					?>
					<tr>
						<td align="center"><?=$cnt;?></td>
						<td><?=$size;?></td>
						<td align="center"><?=$qty;?></td>
						<td><?=$color;?></td>
						<td><?=$uom;?></td>
						<td><?=$mat;?></td>
						<td><?=$spec;?></td>
						<td align="center"><a href="#" onClick="RemoveItem('<?=$itemid;?>')"><img src="img/del_ico.png" width="20" border="0" /></td>
					</tr>
					<? $cnt++; } ?>
				</table>
				</div>
				
				<input type="hidden" name="txtItemArray" id="txtItemArr" value="<?=$itemArray;?>" />

				<div class="control-group">
					<label class="control-label" for="txtAmount">Amount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_estmst[0]['amount'];?>" name="txtAmount" id="txtAmount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_estmst[0]['discount'];?>" name="txtDiscount" id="txtDiscount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Sub-Total</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_estmst[0]['subTotal'];?>" name="txtSubTotal" id="txtSubTotal" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtVat">Vat 12%</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_estmst[0]['vat'];?>" name="txtVat" id="txtVat" type="text" onBlur="return ComputeTotal();" readonly placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtTotalAmount">Total Amount</label>
					<div class="controls">
						<input class="input-xlarge" value="<?=$row_estmst[0]['totalAmount'];?>" name="txtTotalAmount" id="txtTotalAmount" onBlur="return ComputeTotal();" readonly type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtStatus">Status</label>
					<div class="controls">
						<select name="txtStatus" id="txtStatus">
							<option value="0" <? if($row_estmst[0]['status'] == 0){ echo 'selected';} ?>>PENDING</option>
							<option value="1" <? if($row_estmst[0]['status'] == 1){ echo 'selected';} ?>>APPROVE</option>
							<option value="3" <? if($row_estmst[0]['status'] == 3){ echo 'selected';} ?>>CANCEL</option>
						</select>
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Save changes" />
					<a href="controlno_add.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="estimateAdd" id="estimateAdd" value="1" />
			 </form>
		</div>
	</div>
</div>
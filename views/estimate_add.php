<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon cog"></i><span class="break"></span><b>Add New Estimate</b></h2>
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
							<input class="input-xlarge" name="txtEstimateNo" id="txtEstimateNo" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtCustomer">Customer</label>
						<div class="controls">
							<select name="txtCustomer" id="txtCustomer">
					  		<option value="">Select Customer</option>
					  		<? for($i=0;$i<count($row_customer);$i++){ ?>
							<option value="<?=$row_customer[$i]['customerCode'];?>"><?=$row_customer[$i]['customerName'];?></option>
							<? } ?>
						</select> <input type="button" class="btn btn-info" value=" New " onClick="" />
						</div>
					</div>
					<span id="divCustInfo">
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
					</span>
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<select name="txtJobType" id="txtJobType">
					  		<option value="">Select Job Type</option>
					  		<? for($i=0;$i<count($row_jobtype);$i++){ ?>
							<option value="<?=$row_jobtype[$i]['jobTypeCode'];?>"><?=$row_jobtype[$i]['description'];?></option>
							<? } ?>
						</select>
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
						<td><select name="txtSize" id="txtSize" style="width: 150px;">
					  		<option value="">Size</option>
					  		<? for($i=0;$i<count($row_sizing);$i++){ ?>
							<option value="<?=$row_sizing[$i]['sizingCode']."||".$row_sizing[$i]['description'];?>"><?=$row_sizing[$i]['description'];?></option>
							<? } ?>
						</select></td>
						<td><input class="input-small" name="txtPieces" id="txtPieces" type="text" placeholder="0" /></td>
						<td><input class="input-small" name="txtColor" id="txtColor" type="text" placeholder="Color here..." /></td>
						<td><select name="txtUOM" id="txtUOM" style="width: 150px;">
					  		<option value="">UOM</option>
					  		<? for($i=0;$i<count($row_uom);$i++){ ?>
							<option value="<?=$row_uom[$i]['UOMCode']."||".$row_uom[$i]['description'];?>"><?=$row_uom[$i]['description'];?></option>
							<? } ?>
						</select></td>
						<td><input class="input-small" name="txtMaterials" id="txtMaterials" type="text" placeholder="Materials here..." /></td>
						<td><input class="input-small" name="txtSpecification" id="txtSpecification" type="text" placeholder="Specification Here..." /></td>
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
					<label class="control-label" for="txtAmount">Amount</label>
					<div class="controls">
						<input class="input-xlarge" name="txtAmount" id="txtAmount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtDiscount">Discount</label>
					<div class="controls">
						<input class="input-xlarge" name="txtDiscount" id="txtDiscount" onBlur="return ComputeTotal();" onKeyUp="return ComputeTotal();" type="text" placeholder="0.00" />
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
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Save changes" />
					<a href="controlno_add.php" class="btn">Cancel</a>
				</div>
				<input type="hidden" name="estimateAdd" id="estimateAdd" value="1" />
			 </form>
		</div>
	</div>
</div>
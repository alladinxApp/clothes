<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon cog"></i><span class="break"></span><b>Add New Estimate</b></h2>
			<div class="box-icon">
				<a href="estimates.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" method="POST">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateNo">Estimate No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtEstimateNo" id="txtEstimateNo" type="text" placeholder="[SYSTEM GENERATED]" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtEstimateDate">Estimate Date</label>
						<div class="controls">
							<input class="input-xlarge" name="txtEstimateDate" id="txtEstimateDate" type="text" value="<?=date('m/d/Y');?>" readonly />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtCustomer">Customer</label>
						<div class="controls">
							<input class="input-xlarge" name="txtCustomer" id="txtCustomer" type="text" placeholder="Customer Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtAddress">Address</label>
						<div class="controls">
							<input class="input-xlarge" name="txtAddress" id="txtAddress" type="text" placeholder="Address Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtTelephoneNo">Telephone No</label>
						<div class="controls">
							<input class="input-xlarge" name="txtTelephoneNo" id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<select name="txtJobType" id="txtJobType">
					  		<option value="">Job Type</option>
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
					<!-- <div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Save changes" />
						<a href="controlno_add.php" class="btn">Cancel</a>
					</div> -->
				</fieldset>
				<!-- <input type="hidden" name="save" id="save" value="1" /> -->
				<hr />
				<div class="control-group">
					<label class="control-label" for="txtSizes">Sizes</label>
					<div class="controls">
						<select name="txtSizes" id="txtSizes">
					  		<option value="">Sizes</option>
					  		<? for($i=0;$i<count($row_sizing);$i++){ ?>
							<option value="<?=$row_sizing[$i]['sizingCode'];?>"><?=$row_sizing[$i]['description'];?></option>
							<? } ?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtPieces">Pieces</label>
					<div class="controls">
						<input class="input-xlarge" name="txtPieces" id="txtPieces" type="text" placeholder="0" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtColor">Color</label>
					<div class="controls">
						<input class="input-xlarge" name="txtColor" id="txtColor" type="text" placeholder="Color here..." />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="txtMaterials">Materials</label>
					<div class="controls">
						<select name="txtMaterials" id="txtMaterials">
					  		<option value="">Materials</option>
					  		<? for($i=0;$i<count($row_material);$i++){ ?>
							<option value="<?=$row_material[$i]['materialCode'];?>"><?=$row_material[$i]['description'];?></option>
							<? } ?>
						</select>
					</div>
				</div>
				<div class="form-actions">
					<input type="button" class="btn btn-primary" value="Add Item" />
				</div>
				<hr />
				<div id="divDetails">
				<table class="table table-bordered table-condensed">
					<tr>
					  <th>#</th>
					  <th>SIZES</th>
					  <th>PCS</th>
					  <th>COLOR</th>
					  <th>MATERIALS</th>
					  <th>REMOVE</th>
					</tr>
				</table>
				<input type="hidden" name="txtItemArray" id="txtItemArray" value="" />
				</div> 

				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Save changes" />
					<a href="controlno_add.php" class="btn">Cancel</a>
				</div>
			 </form>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon cog"></i><span class="break"></span><b>Job Order #<?=$id;?></b>
			</h2>
			<div class="box-icon">
				<span class="break">
				<a href="joborder_edit.php?edit=1&id=<?=$row_jomst[0]['jobOrderReferenceNo'];?>" target="_blank"><i class="halflings-icon edit"></i> EDIT #<?=$id;?></a>
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
				</fieldset>
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Add Department</b></h2>
				</div>
				<table class="table table-bordered table-condensed">
					<tr>
						<td><select name="txtDepartment" id="txtDepartment" style="width: 200px;">
					  		<? for($i=0;$i<count($row_department);$i++){ ?>
							<option value="<?=$row_department[$i]['departmentCode'];?>"><?=$row_department[$i]['description'];?></option>
							<? } ?>
						</select> <input type="button" id="btnAddDepartment" name="btnAddDepartment" class="btn btn-primary" value=" Add Department " onClick="return AddDepartment();" /></td>
					</tr>
				</table>
				<div id="divDetails">
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
						<td><?=$row_jodept[$i]['departmentName'];?></td>
						<td align="center"><?=dateFormat($row_jodept[$i]['startDate'],"M d, Y H:i:s A");?></td>
						<td align="center">
							<?
								if(!empty($row_jodept[$i]['endDate'])){
									echo dateFormat($row_jodept[$i]['endDate'],"M d, Y H:i:s A");
								}else{
							?>
							<input type="button" id="btnEndJob" name="btnEndJob" class="btn btn-primary" value=" End Job " onClick="return EndJob();" />
							<? } ?>
						</td>
						<td>
							<? if(empty($row_jodept[$i]['remarks'])){ ?>
								<textarea rows="2" cols="40" style="resize: none; width: 200px; " name="txtRemarks" id="txtRemarks"></textarea>
								<input type="hidden" name="txtId" id="txtId" value="<?=$row_jodept[$i]['id'];?>">
							<? }else{ echo $row_jodept[$i]['remarks']; }?>
						</td>
					</tr>
					<? $cnt++; } ?>
				</table>
				<input type="hidden" name="txtOpenTransfer" id="txtOpenTransfer" value="<?=$statuscnt;?>">
				</div>
				<input type="hidden" name="txtJOMasterId" id="txtJOMasterId" value="<?=$row_jomst[0]['id'];?>">
			 </form>
		</div>
	</div>
</div>
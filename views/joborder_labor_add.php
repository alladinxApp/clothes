<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-upload-alt"></i><span class="break"></span><b>Job Order Department Labors</b></h2>
			<div class="box-icon">
				<span class="break">
				<a href="joborder_edit.php?edit=1&id=<?=$row_jolabormst[0]['jobOrderReferenceNo'];?>"><i class="halflings-icon edit"></i> EDIT #<?=$row_jolabormst[0]['jobOrderReferenceNo'];?></a>
			</div>
			<div class="box-icon">
				<a href="joborder_labors.php?id=<?=$row_jolabormst[0]['jobOrderReferenceNo'];?>&deptcode=<?=$row_jolabormst[0]['departmentCode'];?>"><i class="halflings-icon backward"></i> Back to Labors</a>
			</div>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="txtJONo"> Job Order #</label>
				<div class="controls">
					<input class="input-xlarge" readonly value="<?=$row_jolabormst[0]['jobOrderReferenceNo'];?>" name="txtJONo" id="txtJONo" type="text" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtCustomerName"> Customer Name </label>
				<div class="controls">
					<input class="input-xlarge" readonly value="<?=$row_jolabormst[0]['customerName'];?>" name="txtCustomerName" id="txtCustomerName" type="text" />
				</div>
			</div>
			<input type="hidden" name="txtJOLaborId" id="txtJOLaborId" value="<?=$id;?>" />
			<div class="control-group">
				<label class="control-label" for="txtEmployeeName"> Employee Name </label>
				<div class="controls">
					<input class="input-xlarge" readonly value="<?=$row_jolabormst[0]['employeeName'];?>" name="txtEmployeeName" id="txtEmployeeName" type="text" />
				</div>
			</div>
			<input type="hidden" name="txtId" id="txtId" value="<?=$row_jodept[0]['id'];?>">
					<input type="hidden" name="txtJono" id="txtJono" value="<?=$id;?>">
					<input type="hidden" name="txtDeptCode" id="txtDeptCode" value="<?=$deptcode;?>">
			<div class="control-group">
				<label class="control-label" for="txtJobDescription"> Job Description </label>
				<div class="controls">
					<input class="input-xlarge" readonly value="<?=$row_jolabormst[0]['jobDescription'];?>" name="txtJobDescription" id="txtJobDescription" type="text" />
				</div>
			</div>
			</form>
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Add Labor</b></h2>
			</div>
			<table class="table table-bordered table-condensed">
				<tr>
					<td>
						<select name="txtLaborCostId" id="txtLaborCostId" style="width: 200px;">
				  		<? for($i=0;$i<count($row_laborcosts);$i++){ ?>
							<option value="<?=$row_laborcosts[$i]['laborCostsCode'];?>"><?=$row_laborcosts[$i]['description'];?></option>
						<? } ?>
						</select>&nbsp;
						<input class="input-small" name="txtQty" id="txtQty" type="text" placeholder="Qty: 0" />&nbsp;
						<input class="input-small" name="txtAmount" id="txtAmount" type="text" placeholder="Amount: 0.00" />&nbsp;
						<input type="button" class="btn btn-primary" value="Add Labor" onClick="AddLabor();" />
					</td>
				</tr>
			</table>
			<div id="divDetails">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Description</th>
				  <th>Quantity</th>
				  <th>Amount</th>
				  <th>Total</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_jolabordtl);$i++){
				?>
				<tr>
					<td align="center"><?=$cnt;?></td>
					<td><?=$row_jolabordtl[$i]['laborCostsDesc'];?></td>
					<td align="center"><?=$row_jolabordtl[$i]['quantity'];?></td>
					<td align="right"><?=number_format($row_jolabordtl[$i]['amount'],2);?></td>
					<td align="right"><?=number_format($row_jolabordtl[$i]['total'],2);?></td>
				</tr>
				<? $cnt++; } ?>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Accounts Receivable Report</b></h2>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtCustomerName">Customer</label>
						<div class="controls">
							<input class="input-xlarge" name="txtCustomerName" readonly id="txtCustomerName" type="text" placeholder="Customer Here..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtDays">Days</label>
						<div class="controls"><select name="txtDays" id="txtDays">
							<option value="0">ALL</option>
							<option value="1">30</option>
							<option value="2">45</option>
							<option value="3">60</option>
							<option value="4">90</option>
							<option value="5">91 UP</option>
						</select></div>
					</div>
					<div class="form-actions">
						<input type="button" name="btnSearch" id="btnSearch" class="btn btn-primary" value=" SUBMIT " />
					</div>
				</fieldset>
				<input type="hidden" name="search" id="search" value="1" />
				<input type="hidden" name="txtCustomer" id="txtCustomer" />
			</form>
		</div>

	</div>
</div>

<div class="row-fluid">		
	<div class="box span12">
		<form method="Post" action="export.php" target="_blank">
			<input type="submit" name="btnExport" id="btnExport" class="btn btn-primary" value=" EXPORT " />
			<input type="hidden" name="txtExport" id="txtExport" value="0" />
			<input type="hidden" name="Type" id="Type" value="accountsreceivablereport" />
			<input type="hidden" name="Customer" id="Customer" />
			<input type="hidden" name="Days" id="Days" />
		</form>
		<div class="body-content">
			<div id="dataSearch"></div>
		</div>
	</div>
</div>

<!-- MODAL BOX FOR CUSTOMER LIST -->
<div id="divCustomersList">
	<div class="box-content">
		<form>
		<div class="control-group">
			<label class="control-label" for="txtSearchCustomer" style="float: left; width: 130px; padding-top: 3px;"> Search Customer </label>
			<div class="controls" style="float: left;">
				<input class="input-xlarge" name="txtSearchCustomer" id="txtSearchCustomer" onKeyUp="return findCustomer(this.value);" type="text" placeholder="Customer Name Here..." />
			</div>
		</div>
		<div id="divCustList">
		<table class="table table-bordered table-condensed" id="customerHeader">
			<tr>
				<th>#</th>
				<th>Customer Code</th>
				<th>Customer Name</th>
				<th>Address</th>
				<th>Contact No</th>
				<th>Birth Date</th>
				<th>TIN</th>
				<th>is VAT</th>
			</tr>
			<? 
				$cnt = 1; 
				for($i=0;$i<count($row_customer);$i++){ 
					$customerCode = $row_customer[$i]['customerCode'];
					$customerName = $row_customer[$i]['customerName'];
					$address = $row_customer[$i]['address'];
					$telephoneNo = $row_customer[$i]['telephoneNo'];
			?>
			<tr id="customerList" style="cursor: pointer;" onclick="SelectCustomer('<?=$customerCode;?>','<?=$customerName;?>');">
				<td><?=$cnt;?></td>
				<td><?=$row_customer[$i]['customerCode'];?></td>
				<td><?=$row_customer[$i]['customerName'];?></td>
				<td><?=$row_customer[$i]['address'];?></td>
				<td><?=$row_customer[$i]['mobileNo'] . ' / ' . $row_customer[$i]['telephoneNo'];?></td>
				<td><?=$row_customer[$i]['birthDate'];?></td>
				<td><?=$row_customer[$i]['TIN'];?></td>
				<td><?=$row_customer[$i]['isVat'];?></td>
			</tr>
			<? $cnt++; } ?>
		</table>
		</div>
		</form>
	</div>
</div>
<!-- END MODAL BOX FOR CUSTOMER LIST -->
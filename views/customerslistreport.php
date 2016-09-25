<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-user"></i><span class="break"></span><b>Customers List Report</b></h2>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtIsVat">Is Vat</label>
						<div class="controls"><select name="txtIsVat" id="txtIsVat">
							<option value="">-- Yes/No --</option>
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select></div>
					</div>
					<div class="control-group">
						<label class="control-label" for="txtStatus">Status</label>
						<div class="controls"><select name="txtStatus" id="txtStatus">
							<option value="">-- Active/Inactive --</option>
							<option value="0">Inactive</option>
							<option value="1">Active</option>
						</select></div>
					</div>
					<div class="form-actions">
						<input type="button" name="btnSearch" id="btnSearch" class="btn btn-primary" value=" SUBMIT " />
					</div>
				</fieldset>
				<input type="hidden" name="search" id="search" value="1" />
			</form>
		</div>

	</div>
</div>

<div class="row-fluid">		
	<div class="box span12">
		<form method="Post" action="export.php" target="_blank">
			<input type="submit" name="btnExport" id="btnExport" class="btn btn-primary" value=" EXPORT " />
			<input type="hidden" name="txtExport" id="txtExport" value="0" />
			<input type="hidden" name="Type" id="Type" value="customerslistreport" />
			<input type="hidden" name="IsVat" id="IsVat" />
			<input type="hidden" name="Status" id="Status" />
		</form>
		<div class="body-content">
			<div id="dataSearch"></div>
		</div>
	</div>
</div>
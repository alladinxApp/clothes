<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-book"></i><span class="break"></span><b>Reminders List Report</b></h2>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtCreatedDate">Created Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtFrom" id="txtFrom" value="<?=date('m/d/Y')?>" readonly type="text" placeholder="From: MM/DD/YYYY" />
							<input class="input-xlarge datepicker" name="txtTo" id="txtTo" value="<?=date('m/d/Y')?>" readonly type="text" placeholder="To: MM/DD/YYYY" />
						</div>
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
			<input type="hidden" name="Type" id="Type" value="reminderslistreport" />
			<input type="hidden" name="From" id="From" />
			<input type="hidden" name="To" id="To" />
		</form>
		<div class="body-content">
			<div id="dataSearch"></div>
		</div>
	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-wrench"></i><span class="break"></span><b>Service Type Sales Report</b></h2>
		</div>
		<div class="body-content" style="padding: 20px;">
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="txtEstimateDate">Estimate Date</label>
						<div class="controls">
							<input class="input-xlarge datepicker" name="txtFrom" id="txtFrom" value="<?=date('m/d/Y')?>" readonly type="text" placeholder="From: MM/DD/YYYY" />
							<input class="input-xlarge datepicker" name="txtTo" id="txtTo" value="<?=date('m/d/Y')?>" readonly type="text" placeholder="To: MM/DD/YYYY" />
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="txtJobType">Job Type</label>
						<div class="controls">
							<input class="input-xlarge" name="txtJobType" id="txtJobType" readonly type="text" placeholder="ALL" />
						</div>
					</div>
					<input type="hidden" name="txtJobTypeCode" id="txtJobTypeCode" />
					<div class="form-actions">
						<input type="button" name="btnSearch" id="btnSearch" class="btn btn-primary" value=" SUBMIT " />
					</div>
				</fieldset>
				<input type="hidden" name="search" id="search" value="1" />
			</form>
		</div>

	</div>
</div>

<!-- MODAL BOX FOR JOB TYPE LIST -->
<div id="divJobTypeList">
	<div class="box-content">
		<table class="table table-bordered table-condensed">
			<tr>
				<th>#</th>
				<th>Job Type Code</th>
				<th>Description</th>
				<th>Lead Time</th>
				<th>Notification Day</th>
			</tr>
			<tr style="cursor: pointer;" onclick="SelectJobType('','ALL');">
				<td>1</td>
				<td>ALL</td>
				<td colspan="3">ALL</td>
			</tr>
			<? 
				$cnt = 2; 
				for($i=0;$i<count($row_jobtype);$i++){
					$jobtypecode = $row_jobtype[$i]['jobTypeCode'];
					$description = $row_jobtype[$i]['description'];
					$leadtime = $row_jobtype[$i]['leadTime'];
			?>
			<tr style="cursor: pointer;" onclick="SelectJobType('<?=$jobtypecode;?>','<?=$description;?>');">
				<td><?=$cnt;?></td>
				<td><?=$jobtypecode;?></td>
				<td><?=$description;?></td>
				<td align="center"><?=$leadtime;?></td>
				<td align="center"><?=$row_jobtype[$i]['notificationDay'];?></td>
			</tr>
			<? $cnt++; } ?>
		</table>
	</div>
</div>
<!-- END MODAL BOX FOR JOB TYPE LIST -->
<div class="row-fluid">		
	<div class="box span12">
		<form method="Post" action="export.php" target="_blank">
			<input type="submit" name="btnExport" id="btnExport" class="btn btn-primary" value=" EXPORT " />
			<input type="hidden" name="txtExport" id="txtExport" value="0" />
			<input type="hidden" name="Type" id="Type" value="servicetypesalesreport" />
			<input type="hidden" name="From" id="From" />
			<input type="hidden" name="To" id="To" />
			<input type="hidden" name="JobTypeCode" id="JobTypeCode" />
		</form>
		<div class="body-content">
			<div id="dataSearch"></div>
		</div>
	</div>
</div>
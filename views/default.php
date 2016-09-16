<div class="row-fluid">	
	<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
		<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
		<div class="number"><?=$num_estimates;?><i class="icon-arrow-up"></i></div>
		<div class="title">Pending Estimates</div>
		<div class="footer">
			<a href="estimates.php"> Go to List </a>
		</div>	
	</div>
	<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
		<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
		<div class="number"><?=$num_joborders;?><i class="icon-arrow-up"></i></div>
		<div class="title">Pending Job Orders</div>
		<div class="footer">
			<a href="joborders.php"> Go to List </a>
		</div>
	</div>
	<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
		<div class="number" style="font-size: 35px;"><?=number_format($amount,2);?><i class="icon-arrow-up"></i></div>
		<div class="title">Accounts Receivable</div>
		<div class="footer">
			<a href="dailycollections.php"> Go to List </a>
		</div>
	</div>
</div>
<div class="row-fluid">	
	<div class="span8" onTablet="span6" onDesktop="span6">
		<div class="box-header" data-original-title>
			<h2><i class="icon-upload-alt"></i><span class="break"></span><b>PENDING JOB ORDERS</b></h2>
		</div>
		<div style="overflow: scroll; height: 300px; border: 1px #fff solid; background: #fff;">
		<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>JO#</th>
					<th>Cust</th>
					<th>Proj</th>
					<th>Due</th>
					<th>Days</th>
					<th>Qty</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_joborders);$i++){
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if(!$cnt%2){
							$bg = 'background: #eee;';
						}

						$style = $bg;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['jobOrderReferenceNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['jobTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=dateFormat($row_joborders[$i]['dueDate'],"M d, Y");?></td>
					<td align="center" style="<?=$style;?>"><?=$row_joborders[$i]['daysOld'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_joborders[$i]['total_qty'];?></td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
	<div class="span4" onTablet="span6" onDesktop="span6" id="divReminderList">
		<div class="box-header" data-original-title>
			<h2><i class="icon-book"></i><span class="break"></span><b>REMINDERS</b></h2>
			<div class="box-icon">
				<input type="button" name="btnNewReminder" id="btnNewReminder" class="btn btn-primary" value="Post Note" />
			</div>
		</div>
		<div style="overflow: scroll; height: 300px; border: 1px #fff solid; background: #fff;">
		<table class="table table-bordered table-condensed">
			<tr>
			  <th>#</th>
			  <th>Title</th>
			</tr>
			<?
				$cnt = 1;
				for($i=0;$i<count($row_remindermst);$i++){
					$reminderCode = $row_remindermst[$i]['reminderCode'];
					$bg = null;
					if($cnt%2){
						$bg = 'background: #eee;';
					}
					$style = $bg;
			?>
			<tr>
				<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
				<td align="left" style="<?=$style;?>"><a href="#" onClick="EditReminder('<?=$reminderCode;?>');"><?=$row_remindermst[$i]['title'];?></a></td>
			</tr>
			<? $cnt++; } ?>
		 </table>
		</div>
	</div>	
</div><br />
<div class="row-fluid">	
	<div class="span8" onTablet="span6" onDesktop="span6">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>ACCOUNTS RECEIVABLE</b></h2>
		</div>
		<div style="overflow: scroll; height: 300px; border: 1px #fff solid; background: #fff;">
		<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>SI#</th>
					<th>JO#</th>
					<th>Cust</th>
					<th>Amnt</th>
					<th>Days</th>
					<th>Qty</th>
				</tr>
				<?
					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row_armst);$i++){
						$bg = null;
						if($cnt%2){
							$bg = 'background: #eee;';
						}

						$style = $bg;
						$total += $row_armst[$i]['balance'];
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_armst[$i]['billingReferenceNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_armst[$i]['jobOrderReferenceNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_armst[$i]['customerName'];?></td>
					<td align="right" style="<?=$style;?>"><?=number_format($row_armst[$i]['balance'],2);?></td>
					<td align="center" style="<?=$style;?>"><?=$row_armst[$i]['daysOld'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_armst[$i]['totalDelivered'];?></td>
				</tr>
				<? $cnt++; } ?>
				<tr>
					<td colspan="4" align="right">Total >>>>>>>>></td>
					<td align="right"><?=number_format($total,2);?></td>
					<td cols="2">&nbsp;</td>
				</tr>
			 </table>  
		</div>
	</div>
	<div class="widget blue span4" onTablet="span6" onDesktop="span6">
		<h2><span class="glyphicons globe"><i></i></span> Works for Due</h2>
		<hr>
		<div class="content">
			<div class="verticalChart">
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>37%</span>
						</div>
					</div>
					<div class="title">JAN</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>16%</span>
						</div>
					</div>
					<div class="title">FEB</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>12%</span>
						</div>
					</div>
					<div class="title">MA</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>9%</span>
						</div>
					</div>
					<div class="title">APR</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>7%</span>
						</div>
					</div>
					<div class="title">MAY</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>6%</span>
						</div>
					</div>
					<div class="title">JUN</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>5%</span>
						</div>
					</div>
					<div class="title">JUL</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>4%</span>
						</div>
					</div>
					<div class="title">AUG</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>3%</span>
						</div>
					</div>
					<div class="title">SEP</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>1%</span>
						</div>
					</div>
					<div class="title">OCT</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>1%</span>
						</div>
					</div>
					<div class="title">NOV</div>
				</div>
				<div class="singleBar">
					<div class="bar">
						<div class="value">
							<span>1%</span>
						</div>
					</div>
					<div class="title">DEC</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div><!--/span-->
</div>

<!-- MODAL BOX FOR NEW REMINDER -->
<div id="divNewReminder">
	<div class="row-fluid">		
		<div class="box span12">
			<div class="box-content">
				<form class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="txtTitle">Title</label>
							<div class="controls">
								<input class="input-xlarge" name="txtTitle" id="txtTitle" type="text" placeholder="Title here..." />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="txtDescription">Description</label>
							<div class="controls"><textarea name="txtDescription" id="txtDescription" rows="10" style="resize: none;" placeholder="Description here..."></textarea></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL BOX FOR NEW REMINDER -->

<!-- MODAL BOX FOR EDIT REMINDER -->
<div id="dataReminder">
	<div id="divEditReminder"></div>
</div>
<!-- END MODAL BOX FOR EDIT REMINDER -->
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-upload-alt"></i><span class="break"></span><b>Job Orders</b></h2>
			<div class="box-icon">
				<a href="joborder_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Job order #</th>
					<th>Estimate No</th>
					<th>Customer</th>
					<th>Department</th>
					<th>Job Type</th>
					<th>Rush</th>
					<th>Due Date</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_joborders);$i++){
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_joborders[$i]['status']){
							case 1:
									$font = 'color: #00ff00';
									$lbl = 'success';
								break;
							case 3:
									$font = 'color: #ff0000';
									$lbl = 'important';
								break;
							default: break;
						}

						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['jobOrderReferenceNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['quoteReferenceNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['department'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_joborders[$i]['jobTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_joborders[$i]['isRushDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=dateFormat($row_joborders[$i]['dueDate'],"M d, Y");?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_joborders[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="joborder_edit.php?edit=1&id=<?=$row_joborders[$i]['jobOrderReferenceNo'];?>" title="Edit <?=$row_joborders[$i]['jobOrderReferenceNo'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-info" href="joborder_transfer.php?edit=1&id=<?=$row_joborders[$i]['jobOrderReferenceNo'];?>" title="Transfer <?=$row_joborders[$i]['jobOrderReferenceNo'];?>">
							<i class="halflings-icon white home"></i>  
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
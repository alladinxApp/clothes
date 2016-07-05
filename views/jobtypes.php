<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon tags"></i><span class="break"></span><b>Job Types</b></h2>
			<div class="box-icon">
				<a href="jobtype_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Description</th>
				  <th>Lead Time</th>
				  <th>Notification Day</th>
				  <th>Status</th>
				  <th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_jobtype);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						if($row_jobtype[$i]['status'] == 0){
							$font = 'color: #ff0000';
							$lbl = 'important';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_jobtype[$i]['description'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_jobtype[$i]['leadTime'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_jobtype[$i]['notificationDay'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_jobtype[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="jobtype_edit.php?edit=1&id=<?=$row_jobtype[$i]['id'];?>" title="Edit <?=$row_jobtype[$i]['description'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="#" onClick="deleteJobType(<?=$row_jobtype[$i]['id'];?>);" title="Delete <?=$row_jobtype[$i]['description'];?>">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
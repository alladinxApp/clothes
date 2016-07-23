<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon cog"></i><span class="break"></span><b>Estimates</b></h2>
			<div class="box-icon">
				<a href="estimate_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Estimate No</th>
					<th>Customer</th>
					<th>Contact No</th>
					<th>Job Type</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_estimates);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						if($row_estimates[$i]['status'] == 1){
							$font = 'color: #00ff00';
							$lbl = 'important';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['quoteReferenceNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['customerTelNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['jobTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_estimates[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="estimate_edit.php?edit=1&id=<?=$row_estimates[$i]['id'];?>" title="Edit <?=$row_estimates[$i]['quoteReferenceNo'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<!-- <a class="btn btn-danger" href="#" onClick="deleteDepartment(<?=$row_estimates[$i]['id'];?>);" title="Delete <?=$row_department[$i]['description'];?>">
							<i class="halflings-icon white trash"></i> 
						</a> -->
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
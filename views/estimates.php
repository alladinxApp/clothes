<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-book"></i><span class="break"></span><b>Estimates</b></h2>
			<div class="box-icon">
				<a href="estimate_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="estimate_search.php"><i class="halflings-icon search"></i> SEARCH</a>
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
					<th>Lead Time</th>
					<th>Due Date</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_estimates);$i++){
						$estNo = $row_estimates[$i]['quoteReferenceNo'];
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_estimates[$i]['status']){
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
					<td align="left" style="<?=$style;?>"><?=$estNo;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['customerTelNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_estimates[$i]['jobTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_estimates[$i]['leadTime'];?></td>
					<td align="center" style="<?=$style;?>"><?=dateFormat($row_estimates[$i]['dueDate'],"M d, Y");?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_estimates[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="estimate_edit.php?edit=1&id=<?=$estNo;?>" title="Edit <?=$estNo;?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-info" href="#" onClick="EstimatePrint('<?=$estNo;?>');" title="Print <?=$estNo;?>">
							<i class="halflings-icon white print"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
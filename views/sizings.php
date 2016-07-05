<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon signal"></i><span class="break"></span><b>Sizings</b></h2>
			<div class="box-icon">
				<a href="sizing_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Description</th>
				  <th>Status</th>
				  <th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_sizing);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						if($row_sizing[$i]['status'] == 0){
							$font = 'color: #ff0000';
							$lbl = 'important';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_sizing[$i]['description'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_sizing[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="sizing_edit.php?edit=1&id=<?=$row_sizing[$i]['id'];?>" title="Edit <?=$row_sizing[$i]['description'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="#" onClick="deleteSizing(<?=$row_sizing[$i]['id'];?>);" title="Delete <?=$row_sizing[$i]['description'];?>">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon list"></i><span class="break"></span><b>Menus</b></h2>
			<div class="box-icon">
				<a href="menu_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Description</th>
				  <th>Maintenance</th>
				  <th>Transcations</th>
				  <th>Reports</th>
				  <th>Status</th>
				  <th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_menu);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						if($row_menu[$i]['status'] == 0){
							$font = 'color: #ff0000';
							$lbl = 'important';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_menu[$i]['description'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_menu[$i]['isMaintenanceDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_menu[$i]['isTransactionsDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_menu[$i]['isReportsDesc'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_menu[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="menu_edit.php?edit=1&id=<?=$row_menu[$i]['id'];?>" title="Edit <?=$row_menu[$i]['description'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="#" onClick="deleteMenu(<?=$row_menu[$i]['id'];?>);" title="Delete <?=$row_menu[$i]['description'];?>">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
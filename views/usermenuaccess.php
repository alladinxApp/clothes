<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon list"></i><span class="break"></span><b>Menu Access (<?=$userid?>)</b></h2>
			<div class="box-icon">
				<a href="users.php"><i class="halflings-icon backward"></i> Back to List</a>
			</div>
		</div>

		<div style="margin-top: 2px;" class="box-header"><h2><b>AVAILABLE MENUS</b></h2></div>
		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Menu Name</th>
				  <th>Type</th>
				  <th>Add</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_availmenu);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_availmenu[$i]['description'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_availmenu[$i]['xType'];?></td>
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-success" href="#" onClick="AddMenu('<?=$username;?>','<?=$row_availmenu[$i]['menuCode'];?>',<?=$id;?>);" title="Add <?=$row_availmenu[$i]['fullName'];?>">
							<i class="halflings-icon white plus"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>

		<div style="margin-top: 2px;" class="box-header"><h2><b>MENUS ACCESS</b></h2></div>
		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Menu Name</th>
				  <th>Type</th>
				  <th>Remove</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_menuaccess);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_menuaccess[$i]['menuDesc'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_menuaccess[$i]['xType'];?></td>
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-danger" href="#" onClick="RemoveMenu('<?=$username;?>','<?=$row_menuaccess[$i]['menuCode'];?>',<?=$id;?>);" title="Remove <?=$row_menuaccess[$i]['fullName'];?>">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Users</b></h2>
			<div class="box-icon">
				<a href="user_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Username</th>
				  <th>Name</th>
				  <th>User Type</th>
				  <th>Status</th>
				  <th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_user);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						if($row_user[$i]['status'] == 0){
							$font = 'color: #ff0000';
							$lbl = 'important';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_user[$i]['userName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_user[$i]['fullName'];?></td>
					<td align="center" style="<?=$style;?>"><?=$row_user[$i]['userTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_user[$i]['statusDesc'];?></span></td>
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-primary" href="usermenuaccess.php?id=<?=$row_user[$i]['id'];?>" title="User <?=$row_user[$i]['fullName'];?> Menu Access">
							<i class="halflings-icon white list"></i>  
						</a>
						<a class="btn btn-info" href="user_edit.php?edit=1&id=<?=$row_user[$i]['id'];?>" title="Edit <?=$row_user[$i]['fullName'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="#" onClick="deleteUser(<?=$row_user[$i]['id'];?>);" title="Delete <?=$row_user[$i]['fullName'];?>">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
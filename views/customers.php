<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span><b>Customers</b></h2>
			<div class="box-icon">
				<a href="customer_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
				  <th>#</th>
				  <th>Customer Name</th>
				  <th>Address</th>
				  <th>Email Address</th>
				  <th>Mobile No</th>
				  <th>Telephone No</th>
				  <th>Birth Date</th>
				  <th>Status</th>
				  <th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_customer);$i++){
						$bg = null;
						$font = null;
						$lbl = 'success';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						if($row_customer[$i]['status'] == 0){
							$font = 'color: #ff0000';
							$lbl = 'important';
						}
						$style = $bg . $font;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_customer[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_customer[$i]['address'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_customer[$i]['emailAddress'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_customer[$i]['mobileNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_customer[$i]['telephoneNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_customer[$i]['birthDate'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_customer[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="customer_edit.php?edit=1&id=<?=$row_customer[$i]['id'];?>" title="Edit <?=$row_customer[$i]['customerName'];?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="customers.php?delete=1&id=<?=$row_customer[$i]['id'];?>" title="Delete <?=$row_customer[$i]['customerName'];?>">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
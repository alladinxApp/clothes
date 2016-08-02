<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-truck"></i><span class="break"></span><b>Deliveries</b></h2>
			<div class="box-icon">
				<a href="delivery_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="delivery_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Delivery No</th>
					<th>Job Order No</th>
					<th>Customer</th>
					<th>Contact No</th>
					<th>Job Type</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_deliveries);$i++){
						$delNo = $row_deliveries[$i]['deliveryCode'];
						$joNo = $row_deliveries[$i]['jobOrderReferenceNo'];
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_deliveries[$i]['status']){
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
					<td align="left" style="<?=$style;?>"><?=$delNo;?></td>
					<td align="left" style="<?=$style;?>"><?=$joNo;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['customerTelNo'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_deliveries[$i]['jobTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_deliveries[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="delivery_edit.php?edit=1&id=<?=$delNo;?>" title="Edit <?=$delNo;?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-info" href="#" onClick="DeliveryPrint('<?=$delNo;?>');" title="Print <?=$delNo;?>">
							<i class="halflings-icon white print"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
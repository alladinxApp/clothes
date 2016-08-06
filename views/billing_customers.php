<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Billing Customers</b></h2>
			<div class="box-icon">
				<a href="billing_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Customer</th>
					<th>Contact No</th>
					<th>Total Billing</th>
					<th>Create Billing</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_billingcustomers);$i++){
						$custCode = $row_billingcustomers[$i]['customerCode'];
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_billingcustomers[$i]['status']){
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
					<td align="left" style="<?=$style;?>"><?=$row_billingcustomers[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_billingcustomers[$i]['telephoneNo'];?></td>
					<td align="right" style="<?=$style;?>"><?=number_format($row_billingcustomers[$i]['totalBilling'],2);?></td>
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="billing_add.php?id=<?=$custCode;?>" title="Add Billing">
							<i class="halflings-icon white qrcode"></i>  
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
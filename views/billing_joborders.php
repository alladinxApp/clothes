<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Billing Job Orders</b></h2>
			<div class="box-icon">
				<a href="billing_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Job Order No</th>
					<th>Customer</th>
					<th>Job Type</th>
					<th>Create Billing</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_billingjos);$i++){
						$joNo = $row_billingjos[$i]['jobOrderReferenceNo'];
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_billingjos[$i]['status']){
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
					<td style="<?=$style;?>"><?=$joNo;?></td>
					<td style="<?=$style;?>"><?=$row_billingjos[$i]['customerName'];?></td>
					<td style="<?=$style;?>"><?=$row_billingjos[$i]['jobTypeDesc'];?></td>
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="billing_add.php?id=<?=$joNo;?>" title="Add Billing">
							<i class="halflings-icon white qrcode"></i>  
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Billings</b></h2>
			<div class="box-icon">
				<a href="billing_joborders.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="billing_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Billing No</th>
					<th>Customer</th>
					<th>Contact No</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_billing);$i++){
						$billNo = $row_billing[$i]['billingCode'];
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_billing[$i]['status']){
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
					<td align="left" style="<?=$style;?>"><?=$billNo;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_billing[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_billing[$i]['customerTelNo'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_billing[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="invoice_edit.php?edit=1&id=<?=$billNo;?>" title="Edit <?=$billNo;?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-info" href="#" onClick="InvoicePrint('<?=$billNo;?>');" title="Print <?=$billNo;?>">
							<i class="halflings-icon white print"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>Invoices</b></h2>
			<div class="box-icon">
				<a href="invoice_add.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div>
			<div class="box-icon">
				<a href="invoice_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div>
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Invoice No</th>
					<th>Customer</th>
					<th>Contact No</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_invoices);$i++){
						$invNo = $row_invoices[$i]['invoiceCode'];
						$bg = null;
						$font = null;
						$lbl = 'warning';
						if($cnt%2){
							$bg = 'background: #eee;';
						}
						switch($row_invoices[$i]['status']){
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
					<td align="left" style="<?=$style;?>"><?=$invNo;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_invoices[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_invoices[$i]['customerTelNo'];?></td>
					<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_invoices[$i]['statusDesc'];?></span></td>                                       
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="invoice_edit.php?edit=1&id=<?=$invNo;?>" title="Edit <?=$invNo;?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-info" href="#" onClick="InvoicePrint('<?=$invNo;?>');" title="Print <?=$invNo;?>">
							<i class="halflings-icon white print"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
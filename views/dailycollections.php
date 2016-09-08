<div class="row-fluid">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="icon-money"></i><span class="break"></span><b>DAILY COLLECTIONS</b></h2>
			<!-- <div class="box-icon">
				<a href="billing_joborders.php"><i class="halflings-icon plus"></i> ADD NEW</a>
			</div> -->
			<!-- <div class="box-icon">
				<a href="billing_search.php"><i class="halflings-icon search"></i> SEARCH</a>
			</div> -->
		</div>

		<div class="box-content">
			<table class="table table-bordered table-condensed">
				<tr>
					<th>#</th>
					<th>Billing No</th>
					<th>Customer</th>
					<th>Contact No</th>
					<th>Amount</th>
					<th>Actions</th>
				</tr>
				<?
					$cnt = 1;
					for($i=0;$i<count($row_billingmst);$i++){
						$billNo = $row_billingmst[$i]['billingReferenceNo'];
						$bg = null;
						if($cnt%2){
							$bg = 'background: #eee;';
						}

						$style = $bg;
				?>
				<tr>
					<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
					<td align="left" style="<?=$style;?>"><?=$billNo;?></td>
					<td align="left" style="<?=$style;?>"><?=$row_billingmst[$i]['customerName'];?></td>
					<td align="left" style="<?=$style;?>"><?=$row_billingmst[$i]['customerTelNo'];?></td>
					<td align="right" style="<?=$style;?>"><?=number_format($row_billingmst[$i]['balance'],2);?></td>
					<td align="center" style="<?=$style;?>">
						<a class="btn btn-info" href="dailycollection_add.php?id=<?=$billNo;?>" title="Add <?=$billNo;?>">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-info" href="#" onClick="billingPrint('<?=$billNo;?>');" title="Print <?=$billNo;?>">
							<i class="halflings-icon white print"></i> 
						</a>
					</td>
				</tr>
				<? $cnt++; } ?>
			 </table>  
		</div>
	</div>
</div>
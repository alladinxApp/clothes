<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$id = $_GET['id'];
	
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET JOB ORDERS
	$jomst = new Table();
	$jomst->setSQLType($csdb->getSQLType());
	$jomst->setInstance($csdb->getInstance());
	$jomst->setView("jobordermaster_v");
	$jomst->setParam("WHERE jobOrderReferenceNo = '$id'");
	$jomst->doQuery("query");
	$row_jomst = $jomst->getLists();

	// SET JOB ORDERS
	$jodtl = new Table();
	$jodtl->setSQLType($csdb->getSQLType());
	$jodtl->setInstance($csdb->getInstance());
	$jodtl->setView("joborderdetail_v");
	$jodtl->setParam("WHERE jobOrderReferenceNo = '$id'");
	$jodtl->doQuery("query");
	$row_jodtl = $jodtl->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<div class="body-content" style="padding: 20px;" id="divCompletedJobOrder">
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" name="estimateForm">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="txtDeliveryCode">Delivery No</label>
				<div class="controls">
					<input class="input-xlarge" name="txtDeliveryCode" id="txtDeliveryCode" type="text" placeholder="[SYSTEM GENERATED]" readonly />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtJobOrderNo">Job Order No</label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$id;?>" name="txtJobOrderNo" id="txtJobOrderNo" type="text" placeholder="Click Here..." readonly />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" disabled for="txtCustomer">Customer</label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$row_jomst[0]['customerName'];?>" name="txtCustomer" readonly id="txtCustomer" type="text" />
				</div>
			</div>
			<span id="divCustInfo">
			<div class="control-group">
				<label class="control-label" for="txtAddress">Address</label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$row_jomst[0]['address'];?>" name="txtAddress" readonly id="txtAddress" type="text" placeholder="Address Here..." />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtTelephoneNo">Telephone No</label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$row_jomst[0]['customerTelNo'];?>" name="txtTelephoneNo" readonly id="txtTelephoneNo" type="text" placeholder="Telephone No Here..." />
				</div>
			</div>
			</span>
			<div class="control-group">
				<label class="control-label" for="txtJobType">Job Type</label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$row_jomst[0]['jobTypeDesc'];?>" name="txtJobType" readonly id="txtJobType" type="text" placeholder="Telephone No Here..." />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="chkIsRush">is Rush?</label>
				<div class="controls">
					<input type="checkbox" name="chkIsRush" id="chkIsRush" disabled <? if($row_jomst[0]['isRush'] > 0){ echo 'checked'; } ?> onClick="RushEstimate();" />
				</div>
			</div>
			<span id="divJobTypeInfo">
			<div class="control-group">
				<label class="control-label" for="txtLeadTime">Lead Time</label>
				<div class="controls">
					<input class="input-xlarge" value="<?=$row_jomst[0]['leadTime'];?>" name="txtLeadTime" readonly id="txtLeadTime" type="text" placeholder="0" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtDueDate">Due Date</label>
				<div class="controls">
					<input class="input-xlarge datepicker" value="<?=dateFormat($row_jomst[0]['dueDate'],"m-d-Y");?>" name="txtDueDate" disabled id="txtDueDate" type="text" placeholder="mm/dd/YYYY" />
				</div>
			</div>
			</span>
			<div class="control-group">
				<label class="control-label" for="txtAttachment"></label>
				<div class="controls">
					<? if(!empty($row_jomst[0]['attachment']) || $row_jomst[0]['attachment'] != "" || $row_jomst[0]['attachment'] != null){ ?>
					<a href="<?=ESTIMATEATTACHMENTS . dateFormat($row_jomst[0]['transactionDate'],"Ym") . "/" . $row_jomst[0]['quoteReferenceNo'] . "/" . $row_jomst[0]['attachment'];?>" target="_blank">
						<img src="<?=ESTIMATEATTACHMENTS . dateFormat($row_jomst[0]['transactionDate'],"Ym") . "/" . $row_jomst[0]['quoteReferenceNo'] . "/" . $row_jomst[0]['attachment'];?>">
					</a>
					<? } ?>
				</div>
			</div>
			<input type="hidden" name="txtCurrentAttachment" id="txtCurrentAttachment" value="<?=$row_jomst[0]['attachment'];?>" />
		</fieldset>
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon shopping-cart"></i><span class="break"></span><b>Items</b></h2>
		</div>
		<div id="divDetails">
		<table class="table table-bordered table-condensed">
			<tr>
			  <th>#</th>
			  <th>SIZES</th>
			  <th>COLOR</th>
			  <th>UOM</th>
			  <th>ACTUAL</th>
			  <th>SPECIFICATION</th>
			  <th>PRICE</th>
			  <th>QUANTITY</th>
			  <th>TOTAL</th>
			</tr>
			<?
				$cnt = 1;
				$arrItems = "";
				for($i=0;$i<count($row_jodtl);$i++){
					$arrItems .= $row_jodtl[$i]['id'] . ":";
			?>
			<tr>
				<td align="center"><?=$cnt;?></td>
				<td><?=$row_jodtl[$i]['sizeDesc'];?></td>
				<td><?=$row_jodtl[$i]['color'];?></td>
				<td><?=$row_jodtl[$i]['uomDesc'];?></td>
				<td align="center"><?=$row_jodtl[$i]['qty_remaining'];?></td>
				<td><?=$row_jodtl[$i]['specification'];?></td>
				<td align="center">
					<input class="input-small" onKeyUp="return ComputeTotal();" style="text-align:right;" type="text" name="txtPrice<?=$row_jodtl[$i]['id'];?>" id="txtPrice<?=$row_jodtl[$i]['id'];?>" value="0.00" placeholder="0.00" />
				</td>
				<td align="center">
					<input class="input-small" onKeyUp="return ComputeTotal();" style="text-align:center;" type="text" name="txtActual_<?=$row_jodtl[$i]['id'];?>" id="txtActual_<?=$row_jodtl[$i]['id'];?>" value="<?=$row_jodtl[$i]['qty_remaining'];?>" />
				</td>
				<td align="right"><input class="input-small" readonly style="text-align:right;" type="text" name="txtTotal_<?=$row_jodtl[$i]['id'];?>" id="txtTotal_<?=$row_jodtl[$i]['id'];?>" /></td>
			</tr>
			<? $cnt++; } $arrItems = rtrim($arrItems,":"); ?>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right">Total</td>
				<td align="right"><input class="input-small" readonly style="text-align:right;" type="text" name="txtAmount" id="txtAmount" /></td>
			</tr>
		</table>
		</div>
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon home"></i><span class="break"></span><b>Department History</b></h2>
		</div>
		<table class="table table-bordered table-condensed">
			<tr>
			  <th>#</th>
			  <th>DEPARTMENT</th>
			  <th>START DATE</th>
			  <th>END DATE</th>
			  <th>REMARKS</th>
			</tr>
			<?
				$cnt = 1;
				$statuscnt = 0;
				for($i=0;$i<count($row_jodept);$i++){
					if($row_jodept[$i]['status'] == 0){
						$statuscnt++;
					}
			?>
			<tr>
				<td align="center"><?=$cnt;?></td>
				<td><? 
					echo $row_jodept[$i]['departmentName'];

					if($row_jodept[$i]['isCurrent'] == 1){
						echo ' <i class="halflings-icon ok"></i> ';
					}
					
				?></td>
				<td align="center"><?=dateFormat($row_jodept[$i]['startDate'],"M d, Y H:i:s A");?></td>
				<td align="center">
					<?
						if(!empty($row_jodept[$i]['endDate'])){
							echo dateFormat($row_jodept[$i]['endDate'],"M d, Y H:i:s A");
						}else{  } ?>
				</td>
				<td>
					<? if(empty($row_jodept[$i]['remarks'])){ }else{ echo $row_jodept[$i]['remarks']; }?>
				</td>
			</tr>
			<? $cnt++; } ?>
		</table>
		<?
			$discount = 0.00;
			if($row_jomst[0]['discount'] > 0 && $row_jomst[0]['isAppliedDiscount'] == 0){
				$discount = $row_jomst[0]['discount'];
			}
		?>
		<div class="control-group">
			<label class="control-label" for="txtDiscount">Discount</label>
			<div class="controls">
				<input class="input-xlarge" readonly onKeyUp="return ComputeTotal();" value="<?=number_format($discount,2);?>" name="txtDiscount" id="txtDiscount" style="text-align:right;" type="text" placeholder="0.00" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtSubTotal">Sub-Total</label>
			<div class="controls">
				<input class="input-xlarge" name="txtSubTotal" id="txtSubTotal" style="text-align:right;" readonly type="text" placeholder="0.00" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtVat">Vat 12%</label>
			<div class="controls">
				<input class="input-xlarge"  name="txtVat" id="txtVat" type="text" style="text-align:right;" readonly placeholder="0.00" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtTotalAmount">Total Amount</label>
			<div class="controls">
				<input class="input-xlarge" name="txtTotalAmount" id="txtTotalAmount" style="text-align:right;" readonly type="text" placeholder="0.00" />
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" name="btnDeliverySave" id="btnDeliverySave" class="btn btn-primary" value=" Save changes " />
			<a href="delivery_add.php" class="btn">Cancel</a>
		</div>
		<input type="hidden" name="deliverySave" id="deliverySave" value="1" />
		<input type="hidden" name="joNo" id="joNo" value="<?=$id;?>" />
		<input type="hidden" name="estNo" id="estNo" value="<?=$row_jomst[0]['quoteReferenceNo'];?>" />
		<input type="hidden" name="isVat" id="isVat" value="<?=$row_jomst[0]['isVat'];?>" />
		<input type="hidden" name="arrItems" id="arrItems" value="<?=$arrItems;?>" />
	 </form>
</div>
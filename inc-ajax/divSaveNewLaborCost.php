<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$laborcostid = $_GET['laborcostid'];
	$qty = $_GET['qty'];
	$amount = $_GET['amount'];
	$id = $_GET['id'];

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// CHECK EMPLOYEE LABOR COST
	$chkjolabordtl = new Table();
	$chkjolabordtl->setSQLType($csdb->getSQLType());
	$chkjolabordtl->setInstance($csdb->getInstance());
	$chkjolabordtl->setView("jolaborcostsdetail_v");
	$chkjolabordtl->setParam("WHERE joLaborCostMasterId = '$id' AND laborCostsCode = '$laborcostid'");
	$chkjolabordtl->doQuery("query");
	$num_chkjolabordtl = $chkjolabordtl->getNumRows();
	
	if($num_chkjolabordtl == 0){
		// INSERT NEW EMPLOYEE LABOR COST
		$jolaborcost = new Table();
		$jolaborcost->setSQLType($csdb->getSQLType());
		$jolaborcost->setInstance($csdb->getInstance());
		$jolaborcost->setTable("jolaborcostsdetail");
		$jolaborcost->setField("joLaborCostMasterId,laborCostsCode,quantity,amount");
		$jolaborcost->setValues("'$id','$laborcostid','$qty','$amount'");
		$jolaborcost->doQuery("save");
	}else{
		// UPDATE EMPLOYEE LABOR COST
		$jolaborcost = new Table();
		$jolaborcost->setSQLType($csdb->getSQLType());
		$jolaborcost->setInstance($csdb->getInstance());
		$jolaborcost->setTable("jolaborcostsdetail");
		$jolaborcost->setParam("WHERE joLaborCostMasterId = '$id' AND laborCostsCode = '$laborcostid'");
		$jolaborcost->setValues("quantity = '$qty', amount = '$amount'");
		$jolaborcost->doQuery("update");
	}

	// SET EMPLOYEE LABOR COST
	$jolabordtl = new Table();
	$jolabordtl->setSQLType($csdb->getSQLType());
	$jolabordtl->setInstance($csdb->getInstance());
	$jolabordtl->setView("jolaborcostsdetail_v");
	$jolabordtl->setParam("WHERE joLaborCostMasterId = '$id'");
	$jolabordtl->doQuery("query");
	$row_jolabordtl = $jolabordtl->getLists();

	// CLOSE DB
	$csdb->DBClose();

?>
<div id="divDetails">
<table class="table table-bordered table-condensed">
	<tr>
	  <th>#</th>
	  <th>Description</th>
	  <th>Quantity</th>
	  <th>Amount</th>
	  <th>Total</th>
	</tr>
	<?
		$cnt = 1;
		for($i=0;$i<count($row_jolabordtl);$i++){
	?>
	<tr>
		<td align="center"><?=$cnt;?></td>
		<td><?=$row_jolabordtl[$i]['laborCostsDesc'];?></td>
		<td align="center"><?=$row_jolabordtl[$i]['quantity'];?></td>
		<td align="right"><?=number_format($row_jolabordtl[$i]['amount'],2);?></td>
		<td align="right"><?=number_format($row_jolabordtl[$i]['total'],2);?></td>
	</tr>
	<? $cnt++; } ?>
</table>
</div>
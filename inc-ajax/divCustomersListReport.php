<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$stat = $_GET['status'];
	$vat = $_GET['isvat'];
	$status = "";
	$isvat = "";

	if($stat != ""){
		$status = " AND Status = '$stat'";
	}
	if($vat != ""){
		$isvat = " AND isVat = '$vat'";
	}

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET CUSTOMER
	$customermst = new Table();
	$customermst->setSQLType($csdb->getSQLType());
	$customermst->setInstance($csdb->getInstance());
	$customermst->setView("customersmaster_v");
	$customermst->setParam("WHERE 1 $status $isvat ORDER BY customerName");
	$customermst->doQuery("query");
	$row_customermst = $customermst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
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
	</tr>
	<?
		$cnt = 1;
		for($i=0;$i<count($row_customermst);$i++){
			$bg = null;
			$font = null;
			$lbl = 'success';
			if($cnt%2){
				$bg = 'background: #eee;';
			}
			if($row_customermst[$i]['status'] == 0){
				$font = 'color: #ff0000';
				$lbl = 'important';
			}
			$style = $bg . $font;
	?>
	<tr>
		<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
		<td align="left" style="<?=$style;?>"><?=$row_customermst[$i]['customerName'];?></td>
		<td align="left" style="<?=$style;?>"><?=$row_customermst[$i]['address'];?></td>
		<td align="left" style="<?=$style;?>"><?=$row_customermst[$i]['emailAddress'];?></td>
		<td align="left" style="<?=$style;?>"><?=$row_customermst[$i]['mobileNo'];?></td>
		<td align="left" style="<?=$style;?>"><?=$row_customermst[$i]['telephoneNo'];?></td>
		<td align="center" style="<?=$style;?>"><?=dateFormat($row_customermst[$i]['birthDate'],"M d, Y");?></td>
		<td align="center" style="<?=$style;?>"><span class="label label-<?=$lbl;?>"><?=$row_customermst[$i]['statusDesc'];?></span></td>
	</tr>
	<? $cnt++; } ?>
 </table>  
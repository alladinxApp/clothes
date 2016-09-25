<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$q = $_GET['q'];
	
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET EMPLOYEE
	$employee = new Table();
	$employee->setSQLType($csdb->getSQLType());
	$employee->setInstance($csdb->getInstance());
	$employee->setView("jolaborcostsmaster_v");
	$employee->setCol("DISTINCT jolaborcostsmaster_v.employeeName");
	$employee->setParam("WHERE jolaborcostsmaster_v.employeeName LIKE '$q%' ORDER BY jolaborcostsmaster_v.employeeName");
	$employee->doQuery("query");
	$row_employee = $employee->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<div id="divEmpList">
	<table class="table table-bordered table-condensed" id="employeeHeader">
		<tr>
			<th>#</th>
			<th>Employee</th>
		</tr>
		<tr id="employeeList" style="cursor: pointer;" onclick="SelectEmployee('ALL');">
			<td>ALL</td>
			<td>ALL</td>
		</tr>
		<? 
			$cnt = 1; 
			if(count($row_employee) > 0){
			for($i=0;$i<count($row_employee);$i++){ 
				$empname = $row_employee[$i]['employeeName'];
		?>
		<tr id="employeeList" style="cursor: pointer;" onclick="SelectEmployee('<?=$empname;?>');">
			<td><?=$cnt;?></td>
			<td><?=$empname;?></td>
		</tr>
		<? $cnt++; }}else{ ?>
		<tr>
			<td colspan="2" align="center">No Records Found!</td>
		</tr>
		<? } ?>
	</table>
</div>
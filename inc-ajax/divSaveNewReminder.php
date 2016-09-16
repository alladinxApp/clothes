<?
	require_once("../inc/_basic.php");
	require_once("../inc/Browser.php");
	require_once("../inc/Database.php");
	require_once("../inc/DBConfig.php");
	require_once("../inc/Table.php");
	require_once("../inc/MessageAlert.php");
	require_once("../inc/functions.php");

	$title = $_GET['title'];
	$desc = $_GET['desc'];

	// GET NEW CONTROL NO
	$newNum = getNewCtrlNo('REMINDER');

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// INSERT NEW REMINDER
	$insremindermst = new Table();
	$insremindermst->setSQLType($csdb->getSQLType());
	$insremindermst->setInstance($csdb->getInstance());
	$insremindermst->setTable("remindermaster");
	$insremindermst->setField("reminderCode,title,description,createdDate,createdBy");
	$insremindermst->setValues("'$newNum','$title','$desc','$today','$userid'");
	$insremindermst->doQuery("save");

	// SET REMINDER MST
	$remindermst = new Table();
	$remindermst->setSQLType($csdb->getSQLType());
	$remindermst->setInstance($csdb->getInstance());
	$remindermst->setView("remindermaster_v");
	$remindermst->setParam("WHERE status = 0");
	$remindermst->doQuery("query");
	$row_remindermst = $remindermst->getLists();

	// CLOSE DB
	$csdb->DBClose();

	// UPDATE CONTROL NUMBER
	UpdateCtrlNo('REMINDER');
?>
<div class="span4" onTablet="span6" onDesktop="span6" id="divReminderList">
<div class="box-header" data-original-title>
	<h2><i class="icon-book"></i><span class="break"></span><b>REMINDERS</b></h2>
	<div class="box-icon">
		<input type="button" name="btnNewReminder" id="btnNewReminder" class="btn btn-primary" value="Post Note" />
	</div>
</div>
<div style="overflow: scroll; height: 300px; border: 1px #fff solid; background: #fff;">
<table class="table table-bordered table-condensed">
	<tr>
	  <th>#</th>
	  <th>Title</th>
	</tr>
	<?
		$cnt = 1;
		for($i=0;$i<count($row_remindermst);$i++){
			$reminderCode = $row_remindermst[$i]['reminderCode'];
			$bg = null;
			if($cnt%2){
				$bg = 'background: #eee;';
			}
			$style = $bg;
	?>
	<tr>
		<td align="center" style="<?=$style;?>"><?=$cnt;?></td>
		<td align="left" style="<?=$style;?>"><a href="#" onClick="EditReminder('<?=$reminderCode;?>');"><?=$row_remindermst[$i]['title'];?></a></td>
	</tr>
	<? $cnt++; } ?>
</table>
</div>
</div>
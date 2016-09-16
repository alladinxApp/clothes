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

	// SET REMINDER MST
	$remindermst = new Table();
	$remindermst->setSQLType($csdb->getSQLType());
	$remindermst->setInstance($csdb->getInstance());
	$remindermst->setView("remindermaster_v");
	$remindermst->setParam("WHERE reminderCode = '$id'");
	$remindermst->doQuery("query");
	$row_remindermst = $remindermst->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
<div class="row-fluid">		
	<div class="box span12">
		<div class="box-content">
			<form class="form-horizontal">
				<fieldset>
					<div class="control-group" id="dataTitle">
						<label class="control-label" for="txtTitle">Title</label>
						<div class="controls">
							<input class="input-xlarge" name="txtTitle" id="txtTitle" type="text" readonly value="<?=$row_remindermst[0]['title'];?>" />
						</div>
					</div>
					<div class="control-group" id="dataDescription">
						<label class="control-label" for="txtDescription">Description</label>
						<div class="controls"><textarea name="txtDescription" id="txtDescription" readonly rows="5" style="width: 270px; resize: none;" placeholder="Description here..."><?=$row_remindermst[0]['description'];?></textarea></div>
					</div>
					<? if($row_remindermst[0]['status'] == 0){ ?>
					<div class="control-group" id="dataDescription">
						<label class="control-label" for="txtDescription">Status</label>
						<div class="controls"><select name="txtStatus" id="txtStatus">
							<option value="0" selected>OPEN</option>
							<option value="1">CLOSE</option>
						</select></div>
					</div>
					<? } ?>
					<input type="hidden" name="txtReminderCode" id="txtReminderCode" value="<?=$row_remindermst[0]['reminderCode'];?>" />
				</fieldset>
			</form>
		</div>
	</div>
</div>
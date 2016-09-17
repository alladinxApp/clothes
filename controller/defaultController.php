<?
	$curYear = date("Y");

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET ESTIMATES
	$estimates = new Table();
	$estimates->setSQLType($csdb->getSQLType());
	$estimates->setInstance($csdb->getInstance());
	$estimates->setView("estimatemaster_v");
	$estimates->setParam("WHERE status = '0'");
	$estimates->doQuery("query");
	$num_estimates = $estimates->getNumRows();

	// SET JOB ORDERS
	$joborders = new Table();
	$joborders->setSQLType($csdb->getSQLType());
	$joborders->setInstance($csdb->getInstance());
	$joborders->setView("jobordermaster_v");
	$joborders->setParam("WHERE status = '0'");
	$joborders->doQuery("query");
	$num_joborders = $joborders->getNumRows();
	$row_joborders = $joborders->getLists();

	// SET AR
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setView("armaster_v");
	$armst->setParam("WHERE status = '0'");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	$amount = 0;
	for($i=0;$i<count($row_armst);$i++){
		$amount += $row_armst[$i]['balance'];
	}

	// SET REMINDER MST
	$remindermst = new Table();
	$remindermst->setSQLType($csdb->getSQLType());
	$remindermst->setInstance($csdb->getInstance());
	$remindermst->setView("remindermaster_v");
	$remindermst->setParam("WHERE status = 0 ORDER BY createdDate");
	$remindermst->doQuery("query");
	$row_remindermst = $remindermst->getLists();

	// SET BILLING MST
	$billingmst = new Table();
	$billingmst->setSQLType($csdb->getSQLType());
	$billingmst->setInstance($csdb->getInstance());
	$billingmst->setView("billingmaster_v");
	$billingmst->setParam("WHERE status IN(1)");
	$billingmst->doQuery("query");
	$row_billingmst = $billingmst->getLists();

	// SET DELIVERY MST
	$dueJO = new Table();
	$dueJO->setSQLType($csdb->getSQLType());
	$dueJO->setInstance($csdb->getInstance());
	$dueJO->setView("jobordermaster_v");
	$dueJO->setParam("WHERE dueYear = '$curYear'");
	$dueJO->doQuery("query");
	$row_dueJO = $dueJO->getLists();

	$rowJanOpen = 0; $rowJanClose = 0;
	$rowFebOpen = 0; $rowFebClose = 0;
	$rowMarOpen = 0; $rowMarClose = 0;
	$rowAprOpen = 0; $rowAprClose = 0;
	$rowMayOpen = 0; $rowMayClose = 0;
	$rowJunOpen = 0; $rowJunClose = 0;
	$rowJulOpen = 0; $rowJulClose = 0;
	$rowAugOpen = 0; $rowAugClose = 0;
	$rowSepOpen = 0; $rowSepClose = 0;
	$rowOctOpen = 0; $rowOctClose = 0;
	$rowNovOpen = 0; $rowNovClose = 0;
	$rowDecOpen = 0; $rowDecClose = 0;
	$perJan = 0; $rowJan = 0;
	$perFeb = 0; $rowFeb = 0;
	$perMar = 0; $rowMar = 0;
	$perApr = 0; $rowApr = 0;
	$perMay = 0; $rowMay = 0;
	$perJun = 0; $rowJun = 0;
	$perJul = 0; $rowJul = 0;
	$perAug = 0; $rowAug = 0;
	$perSep = 0; $rowSep = 0;
	$perOct = 0; $rowOct = 0;
	$perNov = 0; $rowNov = 0;
	$perDec = 0; $rowDec = 0;

	for($i=0;$i<count($row_dueJO);$i++){
		switch($row_dueJO[$i]['dueMonth']){
			case 1: 
					$rowJan++;
					if($row_dueJO[$i]['status'] == 0){
						$rowJanOpen++;
					}
				break;
			case 2: 
					$rowFeb++;
					if($row_dueJO[$i]['status'] == 0){
						$rowFebOpen++;
					}
				break;
			case 3: 
					$rowMar++;
					if($row_dueJO[$i]['status'] == 0){
						$rowMarOpen++;
					}
				break;
			case 4: 
					$rowApr++;
					if($row_dueJO[$i]['status'] == 0){
						$rowAprOpen++;
					}
				break;
			case 5: 
					$rowMay++;
					if($row_dueJO[$i]['status'] == 0){
						$rowMayOpen++;
					}
				break;
			case 6: 
					$rowJun++;
					if($row_dueJO[$i]['status'] == 0){
						$rowJunOpen++;
					}
				break;
			case 7: 
					$rowJul++;
					if($row_dueJO[$i]['status'] == 0){
						$rowJulOpen++;
					}
				break;
			case 8: 
					$rowAug++;
					if($row_dueJO[$i]['status'] == 0){
						$rowAugOpen++;
					}
				break;
			case 9: 
					$rowSep++;
					if($row_dueJO[$i]['status'] == 0){
						$rowSepOpen++;
					}
				break;
			case 10: 
					$rowOct++;
					if($row_dueJO[$i]['status'] == 0){
						$rowOctOpen++;
					}
				break;
			case 11: 
					$rowNov++;
					if($row_dueJO[$i]['status'] == 0){
						$rowNovOpen++;
					}
				break;
			case 12: 
					$rowDec++;
					if($row_dueJO[$i]['status'] == 0){
						$rowDecOpen++;
					}
				break;
		}
	}

	// CLOSE DB
	$csdb->DBClose();

	$perJan = (($rowJanOpen / $rowJan) * 100);
	$perFeb = (($rowJanOpen / $rowJan) * 100);
	$perMar = (($rowJanOpen / $rowJan) * 100);
	$perApr = (($rowJanOpen / $rowJan) * 100);
	$perMay = (($rowJanOpen / $rowJan) * 100);
	$perJun = (($rowJanOpen / $rowJan) * 100);
	$perJul = (($rowJanOpen / $rowJan) * 100);
	$perAug = (($rowJanOpen / $rowJan) * 100);
	$perSep = (($rowSepOpen / $rowSep) * 100);
	$perOct = (($rowOctOpen / $rowOct) * 100);
	$perNov = (($rowJanOpen / $rowJan) * 100);
	$perDec = (($rowJanOpen / $rowJan) * 100);
?>
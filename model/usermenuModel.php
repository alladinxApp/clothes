<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET USER MENU
	$usermenu = new Table();
	$usermenu->setSQLType($csdb->getSQLType());
	$usermenu->setInstance($csdb->getInstance());
	$usermenu->setView("usermenuaccess_v");
	$usermenu->setParam("WHERE userName = '$userid' ORDER BY sortNo,menuDesc");
	$usermenu->doQuery("query");
	$row_usermenu = $usermenu->getLists();
	
	for($i=0;$i<count($row_usermenu);$i++){
		// MAINTENANCE MENU
		if($row_usermenu[$i]['isMaintenance'] > 0){
			$menuMain[] = array("menuDesc" => $row_usermenu[$i]['menuDesc']
								,"link" => $row_usermenu[$i]['link']
								,"icon" => $row_usermenu[$i]['icon']);
		}

		// TRANSACTIONS MENU
		if($row_usermenu[$i]['isTransactions'] > 0){
			$menuTrans[] = array("menuDesc" => $row_usermenu[$i]['menuDesc']
								,"link" => $row_usermenu[$i]['link']
								,"icon" => $row_usermenu[$i]['icon']);
		}

		// REPORTS MENU
		if($row_usermenu[$i]['isReports'] > 0){
			$menuReps[] = array("menuDesc" => $row_usermenu[$i]['menuDesc']
								,"link" => $row_usermenu[$i]['link']
								,"icon" => $row_usermenu[$i]['icon']);
		}
	}

	// CLOSE DB
	$csdb->DBClose();
?>
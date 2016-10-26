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
	$joborders->setCol("jobordermaster.jobOrderReferenceNo
		,customersmaster.customerName
		,jobtypemaster.description AS jobTypeDesc
		,estimatemaster.dueDate
		,(TO_DAYS(CURDATE()) - TO_DAYS(`jobordermaster`.`createdDate`)) AS `daysOld`
		,(SELECT 
			SUM(CASE 
				WHEN (`joborderdetail`.`actual` > 0) 
					THEN (`joborderdetail`.`actual`) 
				ELSE `joborderdetail`.`quantity` 
				END) FROM joborderdetail
			WHERE joborderdetail.jobOrderReferenceNo = jobordermaster.jobOrderReferenceNo) AS total_qty");
	$joborders->setView("jobordermaster
		JOIN estimatemaster ON estimatemaster.quoteReferenceNo = jobordermaster.quoteReferenceNo
		JOIN customersmaster ON customersmaster.customerCode = estimatemaster.customerCode
		JOIN jobtypemaster ON jobtypemaster.jobTypeCode = estimatemaster.jobType");
	$joborders->setParam("WHERE jobordermaster.status = 0");
	$joborders->doQuery("query");
	$num_joborders = $joborders->getNumRows();
	$row_joborders = $joborders->getLists();

	// SET AR
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setCol("armaster.billingReferenceNo 
				,billingmaster.jobOrderReferenceNo 
				,customersmaster.customerName 
				,armaster.balance 
				,(TO_DAYS(CURDATE()) - TO_DAYS(armaster.createdDate)) AS daysOld 
				,(SELECT SUM(`joborderdetail_v`.`qty_delivered`) AS `COUNT(joborderdetail_v.qty_delivered)` 
					FROM `joborderdetail_v` 
					WHERE (`joborderdetail_v`.`jobOrderReferenceNo` = `jobordermaster`.`jobOrderReferenceNo`)) AS totalDelivered ");
	$armst->setView("armaster 
				JOIN billingmaster ON billingmaster.billingReferenceNo = armaster.billingReferenceNo 
				JOIN jobordermaster ON jobordermaster.jobOrderReferenceNo = billingmaster.jobOrderReferenceNo 
				JOIN estimatemaster ON estimatemaster.quoteReferenceNo = jobordermaster.quoteReferenceNo 
				JOIN customersmaster ON customersmaster.customerCode = estimatemaster.customerCode");
	$armst->setParam("WHERE armaster.status = '0'");
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
	// $billingmst = new Table();
	// $billingmst->setSQLType($csdb->getSQLType());
	// $billingmst->setInstance($csdb->getInstance());
	// $billingmst->setView("billingmaster_v");
	// $billingmst->setParam("WHERE status IN(1)");
	// $billingmst->doQuery("query");
	// $row_billingmst = $billingmst->getLists();

	// SET DELIVERY MST
	$dueJO = new Table();
	$dueJO->setSQLType($csdb->getSQLType());
	$dueJO->setInstance($csdb->getInstance());
	$dueJO->setCol("MONTH(estimatemaster.dueDate) AS dueMonth,
  				YEAR(estimatemaster.dueDate) AS dueYear");
	$dueJO->setView("jobordermaster
				JOIN estimatemaster
     				ON estimatemaster.quoteReferenceNo = jobordermaster.quoteReferenceNo");
	$dueJO->setParam("WHERE YEAR(estimatemaster.dueDate) = '$curYear'");
	$dueJO->doQuery("query");
	$row_dueJO = $dueJO->getLists();

	$rowJanOpen = 0;
	$rowFebOpen = 0;
	$rowMarOpen = 0;
	$rowAprOpen = 0;
	$rowMayOpen = 0;
	$rowJunOpen = 0;
	$rowJulOpen = 0;
	$rowAugOpen = 0;
	$rowSepOpen = 0;
	$rowOctOpen = 0;
	$rowNovOpen = 0;
	$rowDecOpen = 0;

	for($i=0;$i<count($row_dueJO);$i++){
		switch($row_dueJO[$i]['dueMonth']){
			case 1: 
					if($row_dueJO[$i]['status'] == 0){
						$rowJanOpen++;
					}
				break;
			case 2: 
					if($row_dueJO[$i]['status'] == 0){
						$rowFebOpen++;
					}
				break;
			case 3: 
					if($row_dueJO[$i]['status'] == 0){
						$rowMarOpen++;
					}
				break;
			case 4: 
					if($row_dueJO[$i]['status'] == 0){
						$rowAprOpen++;
					}
				break;
			case 5: 
					if($row_dueJO[$i]['status'] == 0){
						$rowMayOpen++;
					}
				break;
			case 6: 
					if($row_dueJO[$i]['status'] == 0){
						$rowJunOpen++;
					}
				break;
			case 7: 
					if($row_dueJO[$i]['status'] == 0){
						$rowJulOpen++;
					}
				break;
			case 8: 
					if($row_dueJO[$i]['status'] == 0){
						$rowAugOpen++;
					}
				break;
			case 9: 
					if($row_dueJO[$i]['status'] == 0){
						$rowSepOpen++;
					}
				break;
			case 10: 
					if($row_dueJO[$i]['status'] == 0){
						$rowOctOpen++;
					}
				break;
			case 11: 
					if($row_dueJO[$i]['status'] == 0){
						$rowNovOpen++;
					}
				break;
			case 12: 
					if($row_dueJO[$i]['status'] == 0){
						$rowDecOpen++;
					}
				break;
			default: break;
		}
	}

	// CLOSE DB
	$csdb->DBClose();
?>
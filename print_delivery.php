<?
	require_once("inc/global.php");
	require_once(MODEL_PATH . PRINTDELIVERYMODEL);

	$id = $_SESSION['id'];

	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERY MASTER
	$deliverymst = new Table();
	$deliverymst->setSQLType($csdb->getSQLType());
	$deliverymst->setInstance($csdb->getInstance());
	$deliverymst->setView("deliverymaster_v");
	$deliverymst->setParam("WHERE deliveryCode = '$id'");
	$deliverymst->doQuery("query");
	$row_deliverymst = $deliverymst->getLists();

	if(count($row_deliverymst) == 0){
		$alert = new MessageAlert();
		$alert->setMessage("Invalid URL!");
		$alert->setURL(BASE_URL . "deliveries.php");
		$alert->Alert();
	}

	// SET DELIVERY DETAIL
	$deliverydtl = new Table();
	$deliverydtl->setSQLType($csdb->getSQLType());
	$deliverydtl->setInstance($csdb->getInstance());
	$deliverydtl->setView("deliverydetail_v");
	$deliverydtl->setParam("WHERE deliveryCode = '$id'");
	$deliverydtl->doQuery("query");
	$row_deliverydtl = $deliverydtl->getLists();

	// CLOSE DB
	$csdb->DBClose();

	$pdf = new PrintDelivery;
	$pdf->setDelMaster($row_deliverymst[0]);
	$pdf->setDelDetail($row_deliverydtl);

	$pdf->AddPage();
	$pdf->ImprovedTable();

	// I = WEB VIEW, D = DOWNLOAD PDF FILE
	$pdf->Output($id . '.pdf','I');
	// $_SESSION['id'] = null;
?>
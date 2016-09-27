<?
	require_once("inc/global.php");
	require_once(MODEL_PATH . PRINTSIMODEL);

	$id = $_SESSION['id'];

	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET AR MASTER
	$armst = new Table();
	$armst->setSQLType($csdb->getSQLType());
	$armst->setInstance($csdb->getInstance());
	$armst->setView("armaster_v");
	$armst->setParam("WHERE ARNo = '$id'");
	$armst->doQuery("query");
	$row_armst = $armst->getLists();

	$sino = $row_armst[0]['billingReferenceNo'];

	// SET DELIVERY MASTER
	$billingmst = new Table();
	$billingmst->setSQLType($csdb->getSQLType());
	$billingmst->setInstance($csdb->getInstance());
	$billingmst->setView("billingmaster_v");
	$billingmst->setParam("WHERE billingReferenceNo = '$sino'");
	$billingmst->doQuery("query");
	$row_billingmst = $billingmst->getLists();

	if(count($row_billingmst) == 0){
		$alert = new MessageAlert();
		$alert->setMessage("Invalid URL!");
		$alert->setURL(BASE_URL . "deliveries.php");
		$alert->Alert();
	}

	$JONo = $row_billingmst[0]['jobOrderReferenceNo'];

	// SET DELIVERY DTL
	$delDtl = new Table();
	$delDtl->setSQLType($csdb->getSQLType());
	$delDtl->setInstance($csdb->getInstance());
	$delDtl->setView("deliverydetail_v JOIN deliverymaster_v ON deliverymaster_v.deliveryCode = deliverydetail_v.deliveryCode");
	$delDtl->setParam("WHERE deliverymaster_v.jobOrderReferenceNo = '$JONo'");
	$delDtl->doQuery("query");
	$row_delDtl = $delDtl->getLists();

	// CLOSE DB
	$csdb->DBClose();

	$pdf = new PrintSalesInvoice;
	$pdf->setARMst($row_armst[0]);
	$pdf->setBillingMst($row_billingmst[0]);
	$pdf->setDeliveryDtl($row_delDtl);

	$pdf->AddPage();
	$pdf->ImprovedTable();

	// I = WEB VIEW, D = DOWNLOAD PDF FILE
	$pdf->Output($id . '.pdf','I');
	// $_SESSION['id'] = null;
?>
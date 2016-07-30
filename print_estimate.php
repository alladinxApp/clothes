<?
	require_once("inc/global.php");
	require_once(MODEL_PATH . PRINTESTIMATEMODEL);

	$id = $_SESSION['id'];

	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET ESTIMATES MASTER
	$estmst = new Table();
	$estmst->setSQLType($csdb->getSQLType());
	$estmst->setInstance($csdb->getInstance());
	$estmst->setView("estimatemaster_v");
	$estmst->setParam("WHERE quoteReferenceNo = '$id'");
	$estmst->doQuery("query");
	$row_estmst = $estmst->getLists();

	if(count($row_estmst) == 0){
		$alert = new MessageAlert();
		$alert->setMessage("Invalid URL!");
		$alert->setURL(BASE_URL . "estimates.php");
		$alert->Alert();
	}

	// SET ESTIMATES DETAIL
	$estdtl = new Table();
	$estdtl->setSQLType($csdb->getSQLType());
	$estdtl->setInstance($csdb->getInstance());
	$estdtl->setView("estimatedetail_v");
	$estdtl->setParam("WHERE quoteReferenceNo = '$id'");
	$estdtl->doQuery("query");
	$row_estdtl = $estdtl->getLists();

	// CLOSE DB
	$csdb->DBClose();
	
	function getImageWidthHeight($img){
		$imgDimension = getimagesize($img);
		$a = explode(" ",$imgDimension[3]);
		$w = explode("=",str_replace('"','',$a[0]));
		$h = explode("=",str_replace('"','',$a[1]));
		$width = $w[1];
		$height = $h[1];
		
		return array("width" => $width, "height" => $height);
	}

	$attachment = ESTIMATEATTACHMENTS . dateFormat($row_estmst[0]['transactionDate'], "Ym") . "/" . $id . "/" . $row_estmst[0]['attachment'];
	
	$imgWidthHeight = getImageWidthHeight($attachment);

	$pdf = new PrintEstimate;
	$pdf->setEstMaster($row_estmst[0]);
	$pdf->setEstDetail($row_estdtl);
	$pdf->setAttachment($attachment);
	$pdf->setAttachmentW($imgWidthHeight['width']);
	$pdf->setAttachmentH($imgWidthHeight['height']);

	$pdf->AddPage();
	$pdf->ImprovedTable();

	// I = WEB VIEW, D = DOWNLOAD PDF FILE
	$pdf->Output($id . '.pdf','I');
	// $_SESSION['id'] = null;
?>
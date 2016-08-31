<?
	require_once("inc/global.php");
	require_once(MODEL_PATH . PRINTJOBORDERMODEL);

	$id = $_SESSION['id'];

	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET ESTIMATES MASTER
	$jomst = new Table();
	$jomst->setSQLType($csdb->getSQLType());
	$jomst->setInstance($csdb->getInstance());
	$jomst->setView("jobordermaster_v");
	$jomst->setParam("WHERE jobOrderReferenceNo = '$id'");
	$jomst->doQuery("query");
	$row_jomst = $jomst->getLists();

	if(count($row_jomst) == 0){
		$alert = new MessageAlert();
		$alert->setMessage("Invalid URL!");
		$alert->setURL(BASE_URL . "joborders.php");
		$alert->Alert();
	}

	$estRefNo = $row_jomst[0]['quoteReferenceNo'];

	// SET ESTIMATES DETAIL
	$jodtl = new Table();
	$jodtl->setSQLType($csdb->getSQLType());
	$jodtl->setInstance($csdb->getInstance());
	$jodtl->setView("joborderdetail_v");
	$jodtl->setParam("WHERE jobOrderReferenceNo = '$id'");
	$jodtl->doQuery("query");
	$row_jodtl = $jodtl->getLists();

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

	$imgWidthHeight = array("width" => 0, "height" => 0);
	if(!empty($row_jomst[0]['attachment'])){
		$attachment = ESTIMATEATTACHMENTS . dateFormat($row_jomst[0]['transactionDate'], "Ym") . "/" . $estRefNo . "/" . $row_jomst[0]['attachment'];
		$imgWidthHeight = getImageWidthHeight($attachment);
	}

	$pdf = new PrintJobOrder;
	$pdf->setJOMaster($row_jomst[0]);
	$pdf->setJODetail($row_jodtl);
	$pdf->setAttachment($attachment);
	$pdf->setAttachmentW($imgWidthHeight['width']);
	$pdf->setAttachmentH($imgWidthHeight['height']);

	$pdf->AddPage();
	$pdf->ImprovedTable();

	// I = WEB VIEW, D = DOWNLOAD PDF FILE
	$pdf->Output($id . '.pdf','I');
	// $_SESSION['id'] = null;
?>
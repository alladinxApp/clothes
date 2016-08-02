<?
	require_once("inc/global.php");
	require_once(MODEL_PATH . PRINTEMPLOYEELABORMODEL);

	$id = $_SESSION['id'];

	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET EMPLOYEE LABOR MASTER
	$emplabormst = new Table();
	$emplabormst->setSQLType($csdb->getSQLType());
	$emplabormst->setInstance($csdb->getInstance());
	$emplabormst->setView("jolaborcostsmaster_v");
	$emplabormst->setParam("WHERE id = '$id'");
	$emplabormst->doQuery("query");
	$row_emplabormst = $emplabormst->getLists();

	if(count($row_emplabormst) == 0){
		$alert = new MessageAlert();
		$alert->setMessage("Invalid URL!");
		$alert->setURL(BASE_URL . "joborders.php");
		$alert->Alert();
	}

	// SET EMPLOYEE LABOR DETAIL
	$emplabordtl = new Table();
	$emplabordtl->setSQLType($csdb->getSQLType());
	$emplabordtl->setInstance($csdb->getInstance());
	$emplabordtl->setView("jolaborcostsdetail_v");
	$emplabordtl->setParam("WHERE joLaborCostMasterId = '$id'");
	$emplabordtl->doQuery("query");
	$row_emplabordtl = $emplabordtl->getLists();

	// SET LABOR COST MASTER
	$laborcostmst = new Table();
	$laborcostmst->setSQLType($csdb->getSQLType());
	$laborcostmst->setInstance($csdb->getInstance());
	$laborcostmst->setView("laborcostsmaster_v");
	$laborcostmst->setParam("WHERE status = '1'");
	$laborcostmst->doQuery("query");
	$row_laborcostmst = $laborcostmst->getLists();

	// CLOSE DB
	$csdb->DBClose();
	
	$pdf = new PrintEmployeeLabor;
	$pdf->setEmpLaborMaster($row_emplabormst[0]);
	$pdf->setEmpLaborDetail($row_emplabordtl);
	$pdf->setLaborCostMaster($row_laborcostmst);

	$pdf->AddPage();
	$pdf->ImprovedTable();

	// I = WEB VIEW, D = DOWNLOAD PDF FILE
	$pdf->Output($id . '.pdf','I');
	// $_SESSION['id'] = null;
?>
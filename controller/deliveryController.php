<?
	// SAVE DELIVERY
	if(isset($_POST['deliverySave']) && !empty($_POST['deliverySave']) && $_POST['deliverySave'] == 1){
		$id = $_POST['joNo'];

		$amount = str_replace(",","",$_POST['txtAmount']);
		$discount = str_replace(",","",$_POST['txtDiscount']);
		$subtotal = str_replace(",","",$_POST['txtSubTotal']);
		$vat = str_replace(",","",$_POST['txtVat']);
		$totalamount = str_replace(",","",$_POST['txtTotalAmount']);

		// GET CONTROL NO
		$newNum = getNewCtrlNo("DELIVERY");

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SAVE DELIVERY MASTER
		$deliverymst = new Table();
		$deliverymst->setSQLType($csdb->getSQLType());
		$deliverymst->setInstance($csdb->getInstance());
		$deliverymst->setTable("deliverymaster");
		$deliverymst->setField("deliveryCode,jobOrderReferenceNo,amount,discount,vat,subTotal,totalAmount,createdBy,createdDate");
		$deliverymst->setValues("'$newNum','$id','$amount','$discount','$vat','$subtotal','$totalamount','$userid','$today'");
		$deliverymst->doQuery("save");

		// SET JOB ORDER DETAIL
		$jodtl = new Table();
		$jodtl->setSQLType($csdb->getSQLType());
		$jodtl->setInstance($csdb->getInstance());
		$jodtl->setView("joborderdetail_v");
		$jodtl->setParam("WHERE jobOrderReferenceNo = '$id' ORDER BY id");
		$jodtl->doQuery("query");
		$row_jodtl = $jodtl->getLists();

		for($i=0;$i<count($row_jodtl);$i++){
			$dtlid = $row_jodtl[$i]['id'];
			$qty = $_POST['txtActual_'.$dtlid];
			$price = $_POST['txtPrice'.$dtlid];

			// SAVE DELIVERY DETAIL
			$deliverydtl = new Table();
			$deliverydtl->setSQLType($csdb->getSQLType());
			$deliverydtl->setInstance($csdb->getInstance());
			$deliverydtl->setTable("deliverydetail");
			$deliverydtl->setField("deliveryCode,JODtlId,quantity,price");
			$deliverydtl->setValues("'$newNum','$dtlid','$qty','$price'");
			$deliverydtl->doQuery("save");

			// UPDATE JOB ORDER DETAIL
			$updjodtl = new Table();
			$updjodtl->setSQLType($csdb->getSQLType());
			$updjodtl->setInstance($csdb->getInstance());
			$updjodtl->setTable("joborderdetail");
			$updjodtl->setValues("qty_delivered = (qty_delivered + $qty)");
			$updjodtl->setParam("WHERE id = '$dtlid'");
			$updjodtl->doQuery("update");
		}

		// SET JOB ORDERS
		$joborders = new Table();
		$joborders->setSQLType($csdb->getSQLType());
		$joborders->setInstance($csdb->getInstance());
		$joborders->setView("jobordermaster_v");
		$joborders->setParam("WHERE status = '1' AND jobOrderReferenceNo = '$id'");
		$joborders->doQuery("query");
		$num_joborders = $joborders->getNumRows();
		$row_joborders = $joborders->getLists();

		$totalQty = $row_joborders[0]['total_qty'];

		// if($totalQty == 0 && $num_joborders > 0){
		// 	// UPDATE JOB ORDER MASTER
		// 	$jomst = new Table();
		// 	$jomst->setSQLType($csdb->getSQLType());
		// 	$jomst->setInstance($csdb->getInstance());
		// 	$jomst->setTable("jobordermaster");
		// 	$jomst->setValues("status = '2', acknowledgeBy = '$userid', acknowledgeDate = '$today'");
		// 	$jomst->setParam("WHERE jobOrderReferenceNo = '$id'");
		// 	$jomst->doQuery("update");
		// }

		// CLOSE DB
		$csdb->DBClose();

		// UPDATE CONTROL NO
		UpdateCtrlNo("DELIVERY");
		
		$alert = new MessageAlert();
		$alert->setMessage("New delivery successfully saved.");
		$alert->setURL(BASE_URL . "deliveries.php");
		$alert->Alert();
	}
	// END SAVE DELIVERY
	// EDIT DELIVERY
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
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
	}
	// END EDIT DELIVERY
	// UPDATE DELIVERY
	if(isset($_POST['deliveryUpdate']) && !empty($_POST['deliveryUpdate']) && $_POST['deliveryUpdate'] == 1){
		$id = $_POST['delNo'];

		$amount = str_replace(",","",$_POST['txtAmount']);
		$discount = str_replace(",","",$_POST['txtDiscount']);
		$subtotal = str_replace(",","",$_POST['txtSubTotal']);
		$vat = str_replace(",","",$_POST['txtVat']);
		$totalamount = str_replace(",","",$_POST['txtTotalAmount']);
		$status = $_POST['txtStatus'];

		if($status == 1){
			$ack = ",preparedBy = '$userid',preparedDate = '$today'";
		}else{
			$ack = ",modifiedBy = '$userid',modifiedDate = '$today'";
		}

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE DELIVERY MASTER
		$deliverymst = new Table();
		$deliverymst->setSQLType($csdb->getSQLType());
		$deliverymst->setInstance($csdb->getInstance());
		$deliverymst->setTable("deliverymaster");
		$deliverymst->setValues("amount = '$amount',discount = '$discount',subTotal = '$subtotal',vat = '$vat',totalAmount = '$totalamount',status = '$status' $ack");
		$deliverymst->setParam("WHERE deliveryCode = '$id'");
		$deliverymst->doQuery("update");
		$row_deliverymst = $deliverymst->getLists();

		// CLOSE DB
		$csdb->DBClose();

		$alert = new MessageAlert();
		$alert->setMessage("Delivery successfully updated.");
		$alert->setURL(BASE_URL . "deliveries.php");
		$alert->Alert();
	}
	// END UPDATE DELIVERY

	// SEARCH DELIVERY
	if(isset($_POST['deliverySearch']) && !empty($_POST['deliverySearch']) && $_POST['deliverySearch'] == 1){
		$delNo = "";
		$xDate = "";
		$stat = "";

		// TRANSACTION DATE
		if(!empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtFrom'],"Y-m-d");
			$dtto = dateFormat($_POST['txtTo'],"Y-m-d");
			$xDate = " AND createdDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else if(!empty($_POST['txtFrom']) && empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtFrom'],"Y-m-d");
			$dtto = dateFormat($_POST['txtFrom'],"Y-m-d");
			$xDate = " AND createdDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else if(empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtTo'],"Y-m-d");
			$dtto = dateFormat($_POST['txtTo'],"Y-m-d");
			$xDate = " AND createdDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else{ }

		// DELIVERY NO
		if(isset($_POST['txtDeliveryCode']) && !empty($_POST['txtDeliveryCode'])){
			$delCode = $_POST['txtDeliveryCode'];
			$delNo = " AND deliveryCode = '$delCode'";
		}

		// STATUS
		if(isset($_POST['txtStatus']) && !empty($_POST['txtStatus'])){
			$status = $_POST['txtStatus'];
			$stat = " AND status = '$status'";
		}

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET DELIVERIES
		$deliveries = new Table();
		$deliveries->setSQLType($csdb->getSQLType());
		$deliveries->setInstance($csdb->getInstance());
		$deliveries->setView("deliverymaster_v");
		$deliveries->setParam("WHERE 1 $delNo $xDate $stat ORDER BY createdDate");
		$deliveries->doQuery("query");
		$row_deliveries = $deliveries->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END SEARCH DELIVERY
?>
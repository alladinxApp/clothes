<?
	// EDIT ESTIMATE
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET JOB ORDER MASTER
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

		// SET JOB ORDER DETAIL
		$jodtl = new Table();
		$jodtl->setSQLType($csdb->getSQLType());
		$jodtl->setInstance($csdb->getInstance());
		$jodtl->setView("joborderdetail_v");
		$jodtl->setParam("WHERE jobOrderReferenceNo = '$id'");
		$jodtl->doQuery("query");
		$row_jodtl = $jodtl->getLists();

		// id | sizeid | size | qty | color | uomid | uom | material | specification
		for($i=0;$i<count($row_jodtl);$i++){
			$rand = generateRandomString(6);
			$itemArray .= $row_jodtl[$i]['id']
						 . "||" . $row_jodtl[$i]['size']
						 . "||" . $row_jodtl[$i]['sizeDesc']
						 . "||" . $row_jodtl[$i]['quantity']
						 . "||" . $row_jodtl[$i]['color']
						 . "||" . $row_jodtl[$i]['uom']
						 . "||" . $row_jodtl[$i]['uomDesc']
						 . "||" . $row_jodtl[$i]['material']
						 . "||" . $row_jodtl[$i]['specification']
						 . "||" . $row_jodtl[$i]['actual'] . "::";
		}
		$itemArray = rtrim($itemArray,"::");

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT ESTIMATE

	// UPDATE ESTIMATE
	if(isset($_POST['jobOrderUpdate']) && !empty($_POST['jobOrderUpdate']) && $_POST['jobOrderUpdate'] == 1){
		$id = $_GET['id'];

		$amount = str_replace(",","",$_POST['txtAmount']);
		$discount = str_replace(",","",$_POST['txtDiscount']);
		$subtotal = str_replace(",","",$_POST['txtSubTotal']);
		$vat = str_replace(",","",$_POST['txtVat']);
		$totalamount = str_replace(",","",$_POST['txtTotalAmount']);
		$status = $_POST['txtStatus'];
		
		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// UPDATE JOB ORDER MASTER
		$jomst = new Table();
		$jomst->setSQLType($csdb->getSQLType());
		$jomst->setInstance($csdb->getInstance());
		$jomst->setTable("jobordermaster");
		$jomst->setValues("amount = '$amount', vat = '$vat', discount = '$discount', subTotal = '$subtotal', totalAmount = '$totalamount', modifiedBy = '$userid', modifiedDate = '$today', status = '$status'");
		$jomst->setParam("WHERE jobOrderReferenceNo = '$id'");
		$jomst->doQuery("update");

		for($i=0;$i<count($row_jodtl);$i++){
			$dtlid = $row_jodtl[$i]['id'];
			$mat = $_POST['txtMaterial_'.$dtlid];
			
			// UPDATE JOB ORDER DETAIL
			$jodtl = new Table();
			$jodtl->setSQLType($csdb->getSQLType());
			$jodtl->setInstance($csdb->getInstance());
			$jodtl->setTable("joborderdetail");
			$jodtl->setValues("actual = '$mat'");
			$jodtl->setParam("WHERE id = '$dtlid'");
			$jodtl->doQuery("update");
		}

		// CLOSE DB
		$csdb->DBClose();

		// CLOSE DB
		$csdb->DBClose();

		$alert = new MessageAlert();
		$alert->setMessage($msg);
		$alert->setURL(BASE_URL . "joborder_edit.php?edit=1&id=".$id);
		$alert->Alert();
	}
	// END UPDATE ESTIMATE

	// SEARCH ESTIMATE
	if(isset($_POST['jobOrderSearch']) && !empty($_POST['jobOrderSearch']) && $_POST['jobOrderSearch'] == 1){
		$xDate = "";
		$jono = "";
		$jtNo = "";
		$stat = "";
		// TRANSACTION DATE
		if(!empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtFrom'],"Y-m-d");
			$dtto = dateFormat($_POST['txtTo'],"Y-m-d");
			$xDate = " AND createDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else if(!empty($_POST['txtFrom']) && empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtFrom'],"Y-m-d");
			$dtto = dateFormat($_POST['txtFrom'],"Y-m-d");
			$xDate = " AND createDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else if(empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
			$dtfrom = dateFormat($_POST['txtTo'],"Y-m-d");
			$dtto = dateFormat($_POST['txtTo'],"Y-m-d");
			$xDate = " AND createDate between '$dtfrom 00:00:00' AND '$dtto 23:59:00'";
		}else{ }

		// ESTIMATE NO
		if(isset($_POST['txtJobOrderNo']) && !empty($_POST['txtJobOrderNo'])){
			$joborderno = $_POST['txtJobOrderNo'];
			$jono = " AND jobOrderReferenceNo = '$joborderno'";
		}

		// CUSTOMER CODE
		if(isset($_POST['txtCustomerCode']) && !empty($_POST['txtCustomerCode'])){
			$customerCode = $_POST['txtCustomerCode'];
			$cCode = " AND customerCode = '$customerCode'";
		}

		// JOB TYPE
		if(isset($_POST['txtJobTypeCode']) && !empty($_POST['txtJobTypeCode'])){
			$jobTypeNo = $_POST['txtJobTypeCode'];
			$jtNo = " AND jobType = '$jobTypeNo'";
		}

		// STATUS
		if(isset($_POST['txtStatus']) && !empty($_POST['txtStatus'])){
			$status = $_POST['txtStatus'];
			$stat = " AND status = '$status'";
		}

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// SET ESTIMATES MASTER
		$joborders = new Table();
		$joborders->setSQLType($csdb->getSQLType());
		$joborders->setInstance($csdb->getInstance());
		$joborders->setView("jobordermaster_v");
		$joborders->setParam("WHERE 1 $xDate $jono $cCode $jtNo $stat ORDER BY transactionDate DESC");
		$joborders->doQuery("query");
		$row_joborders = $joborders->getLists();

		// CLOSE DB
		$csdb->DBClose();
	}
	// END SEARCH ESTIMATE
?>
<?
	// SAVE ESTIMATE
	if(isset($_POST['estimateAdd']) && !empty($_POST['estimateAdd']) && $_POST['estimateAdd'] == 1){
		$newNum = getNewCtrlNo("ESTIMATE");
		$tDate = Date("Y-m-d h:i:s");
		$custCode = $_POST['txtCustomer'];
		$jobtype = $_POST['txtJobType'];
		$specs = $_POST['txtSpecification'];
		$file = $_FILES['txtAttachment']['name'];
		$nFile = date("Ymdhis") . $file;
		$amount = $_POST['txtAmount'];
		$discount = $_POST['txtDiscount'];
		$subtotal = $_POST['txtSubTotal'];
		$vat = $_POST['txtVat'];
		$totalamount = $_POST['txtTotalAmount'];
		$items = explode("::",$_POST['txtItemArray']);
		UpdateCtrlNo("ESTIMATE");

		$dir = ESTIMATEATTACHMENTS . Date("Ym") . "/" . $newNum;

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT ESTIMATE MASTER
		$estmst = new Table();
		$estmst->setSQLType($csdb->getSQLType());
		$estmst->setInstance($csdb->getInstance());
		$estmst->setTable("estimatemaster");
		$estmst->setField("quoteReferenceNo,transactionDate,customerCode,jobType,attachment,amount,discount,subTotal,vat,totalAmount,createdBy");
		$estmst->setValues("'$newNum','$tDate','$custCode','$jobtype','$nFile','$amount','$discount','$subtotal','$vat','$totalamount','$userid'");
		$estmst->doQuery("save");
		$newid = $estmst->getNewID();
		
		for($i=0;$i<count($items);$i++){
			$item = explode("||",$items[$i]);
			$size = $item[1];
			$qty = $item[3];
			$color = $item[4];
			$mat = $item[5];
			$uom = $item[6];
			$spec = $item[7];

			// INSERT ESTIMATE DETAIL
			$estdtl = new Table();
			$estdtl->setSQLType($csdb->getSQLType());
			$estdtl->setInstance($csdb->getInstance());
			$estdtl->setTable("estimatedetail");
			$estdtl->setField("estimateMasterId,quoteReferenceNo,specification,size,quantity,color,uom,material");
			$estdtl->setValues("'$newid','$newNum','$spec','$size','$qty','$color','$uom','$mat'");
			$estdtl->doQuery("save");
		}

		if($_FILES['txtAttachment']['size'] > 0){
			if (!file_exists($dir . "/" . $nFile)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($_FILES['txtAttachment']['tmp_name'], $dir . '/' . $nFile);
		}

		// CLOSE DB
		$csdb->DBClose();

		$alert = new MessageAlert();
		$alert->setMessage("New estimate successfully saved.");
		$alert->setURL(BASE_URL . "estimate_edit.php?edit=1&id=".$newNum);
		$alert->Alert();
	}
	// END SAVE ESTIMATE

	// EDIT ESTIMATE
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1){
		$id = $_GET['id'];

		// OPEN DB
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

		// SET ESTIMATES DETAIL
		$estdtl = new Table();
		$estdtl->setSQLType($csdb->getSQLType());
		$estdtl->setInstance($csdb->getInstance());
		$estdtl->setView("estimatedetail_v");
		$estdtl->setParam("WHERE quoteReferenceNo = '$id'");
		$estdtl->doQuery("query");
		$row_estdtl = $estdtl->getLists();

		for($i=0;$i<count($row_estdtl);$i++){
			$rand = generateRandomString(6);
			$itemArray .= $rand
						 . "||" . $row_estdtl[$i]['size']
						 . "||" . $row_estdtl[$i]['sizeDesc']
						 . "||" . $row_estdtl[$i]['quantity']
						 . "||" . $row_estdtl[$i]['color']
						 . "||" . $row_estdtl[$i]['material']
						 . "||" . $row_estdtl[$i]['uom']
						 . "||" . $row_estdtl[$i]['specification'] . "::";
		}
		$itemArray = rtrim($itemArray,"::");

		// CLOSE DB
		$csdb->DBClose();
	}
	// END EDIT ESTIMATE
?>
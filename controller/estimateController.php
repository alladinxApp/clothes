<?
	// SAVE ESTIMATE
	if(isset($_POST['estimateAdd']) && !empty($_POST['estimateAdd']) && $_POST['estimateAdd'] == 1){
		$newNum = getNewCtrlNo("ESTIMATE");
		$tDate = Date("Y-m-d h:i:s");
		$custCode = $_POST['txtCustomer'];
		$jobtype = $_POST['txtJobType'];
		$specs = $_POST['txtSpecification'];
		$file = $_FILES['txtAttachment']['name'];
		$amount = $_FILES['txtAmount'];
		$discount = $_FILES['txtDiscount'];
		$subtotal = $_FILES['txtSubTotal'];
		$vat = $_FILES['txtVat'];
		$totalamount = $_FILES['txtTotalAmount'];
		$items = explode("::",$_POST['txtItemArray']);
		UpdateCtrlNo("ESTIMATE");

		$dir = ESTIMATEATTACHMENTS . $newNum;

		// OPEN DB
		$csdb = new DBConfig();
		$csdb->setClothesDB();

		// INSERT ESTIMATE MASTER
		$estmst = new Table();
		$estmst->setSQLType($csdb->getSQLType());
		$estmst->setInstance($csdb->getInstance());
		$estmst->setTable("estimatemaster");
		$estmst->setField("quoteReferenceNo,transactionDate,customerCode,jobType,attachment,amount,discount,subTotal,vat,totalAmount,createdBy");
		$estmst->setValues("'$newNum','$tDate','$custCode','$jobtype','$file','$amount','$discount','$subtotal','$val','$totalamount','$userid'");
		$estmst->doQuery("save");
		$newid = $estmst->getNewID();

		for($i=0;$i<count($items);$i++){
			$item = explode("::",$items[$i]);
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
			if (!file_exists($dir . "/" . $file)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($_FILES['txtAttachment']['tmp_name'], $dir . '/' . $file);
		}

		// CLOSE DB
		$csdb->DBClose();
		
		$alert = new MessageAlert();
		$alert->setMessage("New estimate successfully saved.");
		$alert->setURL(BASE_URL . "estimate_edit.php?id=".$newNum);
		$alert->Alert();
	}
	// END SAVE ESTIMATE
?>
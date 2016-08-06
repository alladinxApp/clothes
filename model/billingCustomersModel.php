<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERIES
	$billingcustomers = new Table();
	$billingcustomers->setSQLType($csdb->getSQLType());
	$billingcustomers->setInstance($csdb->getInstance());
	$billingcustomers->setView("customersmaster_v");
	$billingcustomers->setCol("customerCode,customerName,mobileNo,telephoneNo,(SELECT SUM(totalAmount) FROM deliverymaster_v WHERE customersmaster_v.customerCode = deliverymaster_v.customerCode) AS totalBilling");
	$billingcustomers->setParam("WHERE customerCode IN(SELECT customerCode FROM deliverymaster_v WHERE deliverymaster_v.status = 1)");
	$billingcustomers->doQuery("query");
	$row_billingcustomers = $billingcustomers->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
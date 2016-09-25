<?
	require_once("inc/_basic.php");
	require_once("inc/Browser.php");
	require_once("inc/Database.php");
	require_once("inc/DBConfig.php");
	require_once("inc/Table.php");
	require_once("inc/MessageAlert.php");
	require_once("inc/functions.php");

	if(isset($_POST['txtExport']) && !empty($_POST['txtExport']) && $_POST['txtExport'] == 1){
		$report = $_POST['Type'];
		$dt = date("Ymdhis");

		switch($report){
			case "servicetypesalesreport":
					$frm = dateFormat($_POST['From'],"Y-m-d") . ' 00:00:00';
					$to = dateFormat($_POST['To'],"Y-m-d") . ' 23:59:59';
					$jtype = $_POST['JobTypeCode'];
					$jobType = "";
					
					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET SERVICE TYPE REPORT
					$strpt = new Table();
					$strpt->setSQLType($csdb->getSQLType());
					$strpt->setInstance($csdb->getInstance());
					$strpt->setView("jobtypemaster_v");
					if(!empty($jtype)){
						$jobType = " AND deliverymaster_v.jobType = '$jtype'";
						$strpt->setParam("WHERE jobtypemaster_v.jobTypeCode = '$jtype'");
					}
					$strpt->setCol("jobtypemaster_v.description
									,(SELECT SUM(totalAmount) AS amount 
										FROM deliverymaster_v 
										WHERE (deliverymaster_v.status = 1)
											AND (deliverymaster_v.jobType = jobtypemaster_v.jobTypeCode)
											AND (deliverymaster_v.createdDate between '$frm' AND '$to')
											$jobType) AS amount");
					$strpt->doQuery("query");
					$row = $strpt->getLists();

					if(!empty($jtype)){
						$jobTypeDesc = $row[0]['description'];
					}
					// CLOSE DB
					$csdb->DBClose();

					$ln .= "SERVICE TYPE SALES REPORT\r\n\r\n";
					
					$ln .= "From: ," . dateFormat($frm,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($to,"m/d/Y") . "\r\n";

					if(!empty($jtype)){
						$ln .= "Job Type: ," . $jobTypeDesc . "\r\n";
					}else{
						$ln .= "Job Type: ,ALL\r\n";
					}

					$ln .= "\r\n#,Job Type,Amount\r\n";

					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row);$i++){
						$amount = $row[$i]['amount'] == "" ? "0.00" : $row[$i]['amount'];
						$ln .= $cnt . "," . $row[$i]['description'] . "," . $amount . "\r\n";
						$total += $row[$i]['amount'];
						$cnt++;
					}
					$ln .= ",Total >>>>>>>>>>," . $total;

					$data = trim($ln);
					$filename = "service_type_sales_report_" . $dt . ".csv";
				break;
			case "reminderslistreport":
					$frm = dateFormat($_POST['From'],"Y-m-d") . ' 00:00:00';
					$to = dateFormat($_POST['To'],"Y-m-d") . ' 23:59:59';

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET REMINDERS LIST REPORT
					$remindermst = new Table();
					$remindermst->setSQLType($csdb->getSQLType());
					$remindermst->setInstance($csdb->getInstance());
					$remindermst->setView("remindermaster_v");
					$remindermst->setParam("WHERE createdDate between '$frm' AND '$to' ORDER BY createdDate");
					$remindermst->doQuery("query");
					$row = $remindermst->getLists();

					// CLOSE DB
					$csdb->DBClose();
					
					$ln .= "REMINDERS LIST REPORT\r\n\r\n";
					
					$ln .= "From: ," . dateFormat($frm,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($to,"m/d/Y") . "\r\n";

					$ln .= "\r\n#,Title,Description,Created Date,Created By,Status\r\n";

					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row);$i++){
						$ln .= $cnt . "," . $row[$i]['title']
								. "," . $row[$i]['description']
								. "," . dateFormat($row[$i]['createdDate'],"m/d/Y")
								. "," . $row[$i]['createdBy']
								. "," . $row[$i]['statusDesc']
								. "," . "\r\n";
						$cnt++;
					}

					$data = trim($ln);
					$filename = "reminders_list_report_" . $dt . ".csv";
				break;
			case "customersalesreport":
					$frm = dateFormat($_POST['From'],"Y-m-d") . ' 00:00:00';
					$to = dateFormat($_POST['To'],"Y-m-d") . ' 23:59:59';
					$cust = $_POST['Customer'];
					$customer = "";

					if(!empty($cust)){
						$customer = " AND customerCode = '$cust'";
					}

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET CUSTOMER
					$customermst = new Table();
					$customermst->setSQLType($csdb->getSQLType());
					$customermst->setInstance($csdb->getInstance());
					$customermst->setView("customersmaster_v");
					$customermst->setParam("WHERE 1 $customer ORDER BY customerName");
					$customermst->doQuery("query");
					$row = $customermst->getLists();

					// SET BILLING
					$billingmst = new Table();
					$billingmst->setSQLType($csdb->getSQLType());
					$billingmst->setInstance($csdb->getInstance());
					$billingmst->setView("billingmaster_v");
					$billingmst->setParam("WHERE billedDate BETWEEN '$frm' AND '$to'");
					$billingmst->doQuery("query");
					$row_billingmst = $billingmst->getLists();

					// CLOSE DB
					$csdb->DBClose();

					$ln .= "CUSTOMER SALES REPORT\r\n\r\n";
					
					$ln .= "From: ," . dateFormat($frm,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($to,"m/d/Y") . "\r\n";

					$custln = "Customer: ,ALL";
					if(!empty($cust)){
						$custln = "Customer: ," . $row[0]['customerName'];
					}
					$ln .= $custln . "\r\n";

					$ln .= "\r\n#,Customer,Amount\r\n";

					$cnt = 1;
					$totalsales = 0;
					if(count($row) > 0){
						for($i=0;$i<count($row);$i++){
							$total = 0;
							for($a=0;$a<count($row_billingmst);$a++){
								if($row[$i]['customerCode'] == $row_billingmst[$a]['customerCode']){
									$total += $row_billingmst[$a]['totalAmount'];
								}
							}
							if($total > 0){
								$totalsales += $total;
								$ln .= $cnt . "," . $row[$i]['customerName']
										. "," . $total
										. "," . "\r\n";
								$cnt++;
							}
						}
					}else{
						$ln .= "No Results Found!";
					}
					if($totalsales == 0){
						$ln .= "No Results Found!";
					}
					$ln .= ",Total >>>>>>>>>>," . $totalsales . "\r\n";

					$data = trim($ln);
					$filename = "customer_sales_report_" . $dt . ".csv";
				break;
			case "pendingjobordersreport":
					$frm = dateFormat($_POST['From'],"Y-m-d") . ' 00:00:00';
					$to = dateFormat($_POST['To'],"Y-m-d") . ' 23:59:59';
					$jtype = $_POST['JobType'];
					$cust = $_POST['Customer'];
					$jobType = "";
					$customer = "";

					if(!empty($cust)){
						$customer = " AND customerCode = '$cust'";
					}
					if(!empty($jtype)){
						$jobType = " AND jobType = '$jobType'";
					}

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET BILLING
					$jomst = new Table();
					$jomst->setSQLType($csdb->getSQLType());
					$jomst->setInstance($csdb->getInstance());
					$jomst->setView("jobordermaster_v");
					$jomst->setParam("WHERE 1 $customer $jobType AND createdDate BETWEEN '$frm' AND '$to' AND status = 0 ORDER BY dueDate");
					$jomst->doQuery("query");
					$row = $jomst->getLists();

					// CLOSE DB
					$csdb->DBClose();

					$ln .= "PENDING JOB ORDERS REPORT\r\n\r\n";
					
					$ln .= "From: ," . dateFormat($frm,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($to,"m/d/Y") . "\r\n";

					$custln = "Customer: ,ALL";
					if(!empty($cust)){
						$custln = "Customer: ," . $row[0]['customerName'];
					}
					$ln .= $custln . "\r\n";

					$jtypeln = "Job Type: ,ALL";
					if(!empty($jtype)){
						$jtypeln = "Job Type: ," . $row[0]['jobTypeDesc'];
					}
					$ln .= $jtypeln . "\r\n";

					$ln .= "\r\n#,Job Order No,Due Date,Customer,Amount\r\n";

					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row);$i++){
						$ln .= $cnt . "," . $row[$i]['jobOrderReferenceNo']
								. "," . dateFormat($row[$i]['dueDate'],"m/d/Y")
								. "," . $row[$i]['customerName']
								. "," . $row[$i]['totalAmount']
								. "," . "\r\n";
						$cnt++;
					}

					$data = trim($ln);
					$filename = "pending_job_orders_report_" . $dt . ".csv";
				break;
			case "accountsreceivablereport":
					$days = $_POST['Days'];
					$cust = $_POST['Customer'];
					$nodays = "";
					$customer = "";

					if(!empty($cust)){
						$customer = " AND customerCode = '$cust'";
					}
					if(!empty($days)){
						switch($days){
							case "1":
									$nodays = " AND daysOld <= 30";
									$nodlbl = "30 Days";
								break;
							case "2":
									$nodays = " AND daysOld <= 45";
									$nodlbl = "45 Days";
								break;
							case "3":
									$nodays = " AND daysOld <= 60";
									$nodlbl = "60 Days";
								break;
							case "4":
									$nodays = " AND daysOld <= 90";
									$nodlbl = "90 Days";
								break;
							case "5":
									$nodays = " AND daysOld > 90";
									$nodlbl = "90 Days Up";
								break;
							default: $nodlbl = "ALL"; break;
						}
					}

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET AR
					$armst = new Table();
					$armst->setSQLType($csdb->getSQLType());
					$armst->setInstance($csdb->getInstance());
					$armst->setView("armaster_v");
					$armst->setParam("WHERE 1 $customer $nodays AND status = 0 ORDER BY daysOld DESC");
					$armst->doQuery("query");
					$row = $armst->getLists();

					// CLOSE DB
					$csdb->DBClose();

					$ln .= "ACCOUNTS RECEIVABLE REPORT\r\n\r\n";

					$custln = "Customer: ,ALL";
					if(!empty($cust)){
						$custln = "Customer: ," . $row[0]['customerName'];
					}
					$ln .= $custln . "\r\n";

					$nodln = "No Of Days: ,ALL";
					if(!empty($days)){
						$nodln = "No Of Days: ," . $nodlbl;
					}
					$ln .= $nodln . "\r\n";

					$ln .= "\r\n#,Customer,No of Days,Amount\r\n";

					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row);$i++){
						$ln .= $cnt . "," . $row[$i]['customerName']
								. "," . $row[$i]['daysOld']
								. "," . $row[$i]['balance']
								. "," . "\r\n";
						$cnt++;
					}

					$data = trim($ln);
					$filename = "accounts_receivable_report_" . $dt . ".csv";
				break;
			case "dailycashiersreport":
					$date = $_POST['Date'];
					$frm = dateFormat($date,"Y-m-d") . ' 00:00:00';
					$to = dateFormat($date,"Y-m-d") . ' 23:59:59';
					$cust = $_POST['Customer'];
					$customer = "";

					if(!empty($cust)){
						$customer = " AND customerCode = '$cust'";
					}

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET AR
					$armst = new Table();
					$armst->setSQLType($csdb->getSQLType());
					$armst->setInstance($csdb->getInstance());
					$armst->setView("armaster_v");
					$armst->setParam("WHERE 1 $customer AND createdDate BETWEEN '$frm' AND '$to' ORDER BY createdDate");
					$armst->doQuery("query");
					$row = $armst->getLists();

					// CLOSE DB
					$csdb->DBClose();

					$ln .= "ACCOUNTS RECEIVABLE REPORT\r\n\r\n";

					$ln .= "Date: ," . dateFormat($date,"m/d/Y") . "\r\n";
					$custln = "Customer: ,ALL";
					if(!empty($cust)){
						$custln = "Customer: ," . $row[0]['customerName'];
					}
					$ln .= $custln . "\r\n";

					$ln .= "\r\n#,SI,Customer,A/R,Payment,Balance,Remarks\r\n";

					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row);$i++){
						$total += $row[$i]['tender'];
						$ln .= $cnt . "," . $row[$i]['billingReferenceNo']
								. "," . $row[$i]['customerName']
								. "," . $row[$i]['amount']
								. "," . $row[$i]['tender']
								. "," . $row[$i]['balance']
								. "," . $row[$i]['remarks']
								. "," . "\r\n";
						$cnt++;
					}
					$ln .= ",,,Total >>>>>>>>>>," . $total . "\r\n";

					$data = trim($ln);
					$filename = "daily_cashiers_report_" . $dt . ".csv";
				break;
			case "laborsreport":
					$frm = dateFormat($_POST['From'],"Y-m-d") . ' 00:00:00';
					$to = dateFormat($_POST['To'],"Y-m-d") . ' 23:59:59';
					$emp = $_POST['Employee'];

					if($emp == ""){
						$emplbl = "ALL";
					}else{
						$emplbl = $emp;
					}

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET LABOR
					$labor = new Table();
					$labor->setSQLType($csdb->getSQLType());
					$labor->setInstance($csdb->getInstance());
					$labor->setView("jolaborcostsmaster_v");
					$labor->setParam("WHERE jolaborcostsmaster_v.createdDate between '$frm' AND '$to' AND jolaborcostsmaster_v.employeeName LIKE '$emp%' ORDER BY jolaborcostsmaster_v.employeeName");
					$labor->doQuery("query");
					$row = $labor->getLists();

					// CLOSE DB
					$csdb->DBClose();

					$ln .= "LABORS REPORT\r\n\r\n";

					$ln .= "From: ," . dateFormat($frm,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($to,"m/d/Y") . "\r\n";

					$ln .=  "Employee: ," . $emplbl . "\r\n";

					if($emp != "ALL"){
						$ln .= "\r\n#,Job Order No,Revenue,Freight Cost,Labor,Retention,%\r\n";
					}else{
						$ln .= "\r\n#,Employee,Job Order No,Revenue,Freight Cost,Labor,Retention,%\r\n";
					}

					$cnt = 1;
					$total = 0;
					if($emp != "ALL"){
						for($i=0;$i<count($row);$i++){
							$retention = (($row[$i]['totalAmount'] - $row[$i]['freightCost']) - $row[$i]['totalLabor']);
							$per = (($retention / $row[$i]['totalAmount']) * 100);

							$ln .= $cnt
									. "," . $row[$i]['jobOrderReferenceNo']
									. "," . $row[$i]['totalAmount']
									. "," . $row[$i]['freightCost']
									. "," . $row[$i]['totalLabor']
									. "," . $retention
									. "," . number_format($per,2) . "%"
									. "," . "\r\n";
							$cnt++;
						}
					}else{
						for($i=0;$i<count($row);$i++){
							$retention = (($row[$i]['totalAmount'] - $row[$i]['freightCost']) - $row[$i]['totalLabor']);
							$per = (($retention / $row[$i]['totalAmount']) * 100);

							$ln .= $cnt
									. "," . $row[$i]['employeeName']
									. "," . $row[$i]['jobOrderReferenceNo']
									. "," . $row[$i]['totalAmount']
									. "," . $row[$i]['freightCost']
									. "," . $row[$i]['totalLabor']
									. "," . $retention
									. "," . number_format($per,2) . "%"
									. "," . "\r\n";
							$cnt++;
						}
					}

					$data = trim($ln);
					$filename = "labors_report_" . $dt . ".csv";
				break;
			case "customerslistreport":
					$stat = $_POST['Status'];
					$vat = $_POST['IsVat'];
					$status = "";
					$isvat = "";
					$statlbl = "ACTIVE / INACTIVE";
					$isvatlbl = "YES / NO";

					if($stat != ""){
						$status = " AND Status = '$stat'";
						if($stat == 0){
							$statlbl = "INACTIVE";
						}else{
							$statlbl = "ACTIVE";
						}
					}
					if($vat != ""){
						$isvat = " AND isVat = '$vat'";
						if($vat == 0){
							$isvatlbl = "NO";
						}else{
							$isvatlbl = "YES";
						}
					}

					// OPEN DB
					$csdb = new DBConfig();
					$csdb->setClothesDB();

					// SET CUSTOMER
					$customermst = new Table();
					$customermst->setSQLType($csdb->getSQLType());
					$customermst->setInstance($csdb->getInstance());
					$customermst->setView("customersmaster_v");
					$customermst->setParam("WHERE 1 $status $isvat ORDER BY customerName");
					$customermst->doQuery("query");
					$row = $customermst->getLists();

					// CLOSE DB
					$csdb->DBClose();

					$ln .= "CUSTOMERS LIST REPORT\r\n\r\n";

					$ln .= "Is Vat: ," . $isvatlbl . "\r\n";
					$ln .= "Status: ," . $statlbl . "\r\n";

					$ln .= "\r\n#,Customer Code,Customer Name,Address,Mobile No,Telephone No,Fax No,Email Address,Birth Date,TIN,Is Vat,Status\r\n";

					$cnt = 1;
					$total = 0;
					for($i=0;$i<count($row);$i++){
						$ln .= $cnt . "," . $row[$i]['customerCode']
								. "," . $row[$i]['customerName']
								. "," . $row[$i]['address']
								. "," . $row[$i]['mobileNo']
								. "," . $row[$i]['telephoneNo']
								. "," . $row[$i]['faxNo']
								. "," . $row[$i]['emailAddress']
								. "," . dateFormat($row[$i]['birthDate'],"m/d/Y")
								. "," . $row[$i]['TIN']
								. "," . $row[$i]['isVat']
								. "," . $row[$i]['statusDesc']
								. "," . "\r\n";
						$cnt++;
					}

					$data = trim($ln);
					$filename = "customers_list_report_" . $dt . ".csv";
				break;
			default: break;
		}

		if(!empty($data) && !empty($filename)){
			exportRowData($data,"excel",$filename);
		}
	}
	exit();
?>
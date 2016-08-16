<?
	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET DELIVERIES
	$joborders = new Table();
	$joborders->setSQLType($csdb->getSQLType());
	$joborders->setInstance($csdb->getInstance());
	$joborders->setView("jobordermaster_v JOIN joborderdepartment_v ON jobordermaster_v.jobOrderReferenceNo = joborderdepartment_v.jobOrderReferenceNo");
	$joborders->setParam("WHERE joborderdepartment_v.status = 1 AND jobordermaster_v.total_qty > 0 ORDER BY joborderdepartment_v.createdDate");
	$joborders->doQuery("query");
	$row_joborders = $joborders->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
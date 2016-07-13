<?
	$id = $_GET['id'];

	// OPEN DB
	$csdb = new DBConfig();
	$csdb->setClothesDB();

	// SET USER MENU
	$menuaccess = new Table();
	$menuaccess->setSQLType($csdb->getSQLType());
	$menuaccess->setInstance($csdb->getInstance());
	$menuaccess->setView("usermenuaccess_v");
	$menuaccess->setParam("WHERE userId = '$id' ORDER BY xType,menuDesc");
	$menuaccess->doQuery("query");
	$row_menuaccess = $menuaccess->getLists();

	// SET USER
	$user = new Table();
	$user->setSQLType($csdb->getSQLType());
	$user->setInstance($csdb->getInstance());
	$user->setView("usermaster_v");
	$user->setParam("WHERE id = '$id'");
	$user->doQuery("query");
	$row_user = $user->getLists();

	$username = $row_user[0]['userName'];

	// AVAILABLE MENU
	$availmenu = new Table();
	$availmenu->setSQLType($csdb->getSQLType());
	$availmenu->setInstance($csdb->getInstance());
	$availmenu->setView("menumaster_v");
	$availmenu->setParam("WHERE menumaster_v.menuCode NOT IN(SELECT usermenuaccess_v.menuCode FROM usermenuaccess_v WHERE usermenuaccess_v.userId = '$id') ORDER BY menumaster_v.xType,menumaster_v.description");
	$availmenu->doQuery("query");
	$row_availmenu = $availmenu->getLists();

	// CLOSE DB
	$csdb->DBClose();
?>
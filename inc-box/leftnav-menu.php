<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<? if(count($row_usermenu) > 0){ ?>
		<ul class="nav nav-tabs nav-stacked main-menu">
			<? if(count($menuMain) > 0){ ?>
			<li>
				<a class="dropmenu" href="#"><i class="icon-align-justify"></i> <span class="hidden-tablet">Maintenance</span></a>
				<ul>
					<? for($i=0;$i<count($menuMain);$i++){ ?>
					<li><a class="submenu" href="<?=$menuMain[$i]['link'];?>.php"><i class="<?=$menuMain[$i]['icon'];?>"></i> <span class="hidden-tablet"><?=$menuMain[$i]['menuDesc'];?></span></a></li>
					<? } ?>
					<!-- <li><a class="submenu" href="customers.php"><i class="icon-group"></i> <span class="hidden-tablet">Customers</span></a></li>
					<li><a class="submenu" href="departments.php"><i class="icon-home"></i> <span class="hidden-tablet">Departments</span></a></li>
					<li><a class="submenu" href="jobtypes.php"><i class="icon-tags"></i> <span class="hidden-tablet">Job Types</span></a></li>
					<li><a class="submenu" href="materials.php"><i class="icon-barcode"></i> <span class="hidden-tablet">Materials</span></a></li>
					<li><a class="submenu" href="menus.php"><i class="icon-list"></i> <span class="hidden-tablet">Menus</span></a></li>
					<li><a class="submenu" href="sizings.php"><i class="icon-bar-chart"></i> <span class="hidden-tablet">Sizing Patterns</span></a></li>
					<li><a class="submenu" href="uoms.php"><i class="icon-signal"></i> <span class="hidden-tablet">UOMs</span></a></li>
					<li><a class="submenu" href="users.php"><i class="icon-user"></i> <span class="hidden-tablet">Users</span></a></li> -->
				</ul>	
			</li>
			<? } if(count($menuTrans) > 0){ ?>
			<li>
				<a class="dropmenu" href="#"><i class="icon-bar-chart"></i> <span class="hidden-tablet">Transactions</span></a>
				<ul>
					<? for($i=0;$i<count($menuTrans);$i++){ ?>
					<li><a class="submenu" href="<?=$menuTrans[$i]['link'];?>.php"><i class="<?=$menuTrans[$i]['icon'];?>"></i> <span class="hidden-tablet"><?=$menuTrans[$i]['menuDesc'];?></span></a></li>
					<? } ?>
					<!-- <li><a class="submenu" href="joborders.php"><i class="icon-briefcase"></i> <span class="hidden-tablet">Job Orders</span></a></li> -->
				</ul>	
			</li>
			<? } if(count($menuReps) > 0){ ?>
			<li>
				<a class="dropmenu" href="#"><i class="icon-calendar"></i> <span class="hidden-tablet">Reports</span></a>
				<ul>
					<? for($i=0;$i<count($menuReps);$i++){ ?>
					<li><a class="submenu" href="<?=$menuReps[$i]['link'];?>.php"><i class="<?=$menuReps[$i]['icon'];?>"></i> <span class="hidden-tablet"><?=$menuReps[$i]['menuDesc'];?></span></a></li>
					<? } ?>
				</ul>	
			</li>
			<? } ?>
		</ul>
		<? }else{ ?>
		<p><br />Please contact the administrator for your menu access.</p>
		<? } ?>
	</div>
</div>
<!-- end: Main Menu -->
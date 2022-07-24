<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
require_once("config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("index.php");
}

// set page title
$title = "Dashboard";

// if the rights are not set then add them in the current session
if (!isset($_SESSION["access"])) {

    try {

        $sql = "SELECT mod_modulegroupcode, mod_modulegroupname FROM module "
                . " WHERE 1 GROUP BY `mod_modulegroupcode` "
                . " ORDER BY `mod_modulegrouporder` ASC, `mod_moduleorder` ASC  ";


        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $commonModules = $stmt->fetchAll();

        $sql = "SELECT mod_modulegroupcode, mod_modulegroupname, mod_modulepagename,  mod_modulecode, mod_modulename FROM module "
                . " WHERE 1 "
                . " ORDER BY `mod_modulegrouporder` ASC, `mod_moduleorder` ASC  ";

        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $allModules = $stmt->fetchAll();

        $sql = "SELECT rr_modulecode, rr_create,  rr_edit, rr_delete, rr_view FROM role_rights "
                . " WHERE  rr_rolecode = :rc "
                . " ORDER BY `rr_modulecode` ASC  ";

        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":rc", $_SESSION["rolecode"]);
        
        
        $stmt->execute();
        $userRights = $stmt->fetchAll();

        $_SESSION["access"] = set_rights($allModules, $userRights, $commonModules);

    } catch (Exception $ex) {

        echo $ex->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Button Tex || Label Tex </title>


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard.php" class="logo"><span>Button<span>Tex</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li>
								<a href="#" class="menu-item"><?php echo date("Y-m-d h:i:sa"); ?></a>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                     <i class="mdi mdi-logout"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
										<?php if($_SESSION["rolecode"] == 'ADMIN'){ ?>
                                        <h5>Hi, <?php echo $_SESSION["rolecode"]; ?></h5>
										<?php }
										else if($_SESSION["rolecode"] != 'ADMIN'){ ?>
                                        <h5>Hi, <?php echo $_SESSION["username"]; ?></h5>
										<?php } ?>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigation</li>
								<li>
									<a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span></a>
								</li>
							
							
							<?php if($_SESSION["rolecode"] == 'ADMIN' || $_SESSION["rolecode"] == 'Order'){ ?>
								<li>
									<a href="orders.php" class="waves-effect"><i class="mdi mdi-basket"></i><span> Orders </span></a>
								</li>
								<li>
									<a href="invoices.php" class="waves-effect"><i class="mdi mdi-coin"></i><span> Invoices </span></a>
								</li>
								<li>
									<a href="lc.php" class="waves-effect"><i class="mdi mdi-coin"></i><span> LC </span></a>
								</li>
							<?php }?>
							
							
							<?php if($_SESSION["rolecode"] == 'ADMIN' || $_SESSION["rolecode"] == 'Store'){ ?>
								<li class="has_sub">
									<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart"></i><span> Store </span> <span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="plainDrum.php"> Plain Drum Add</a></li>
										<li><a href="plainDrumList.php"> Plain Drum List</a></li>
										<li><a href="undolationDrum.php"> Undulation Drum Add</a></li>
										<li><a href="undolationDrumList.php"> Undulation Drum List</a></li>
										<li><a href="rodDrum.php"> Rod Add</a></li>
										<li><a href="rodDrumList.php"> Rod List</a></li>
										<li><a href="drumSearch.php"> Search</a></li>
										<li><a href="orderReport.php"> Order Report</a></li>
										<li><a href="consumptionDaily.php"> Daily Consumption</a></li>
										<li><a href="consumptionMonthly.php"> Monthly Consumption</a></li>
									</ul>
								</li>
							<?php }?>
							
							<?php if($_SESSION["rolecode"] == 'ADMIN' || $_SESSION["rolecode"] == 'Casting'){ ?>
								<li class="has_sub">
									<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-basket-fill"></i><span> Casting </span> <span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="casting.php"> Casting Add</a></li>
										<li><a href="castinglist.php"> Casting List</a></li>
									</ul>
								</li>
							<?php }?>
							
							<?php if($_SESSION["rolecode"] == 'ADMIN' || $_SESSION["rolecode"] == 'Turning'){ ?>
								<li class="has_sub">
									<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-basket-unfill"></i><span> Turning </span> <span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="turning.php"> Turning Add</a></li>
										<li><a href="turninglist.php"> Turning List</a></li>
									</ul>
								</li>
							<?php }?>
							
							<?php if($_SESSION["rolecode"] == 'ADMIN' || $_SESSION["rolecode"] == 'Delivery'){ ?>
								<li class="has_sub">
									<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-basket-unfill"></i><span> Challan </span> <span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="new_ch.php"> Challan Add</a></li>
										<li><a href="challan.php"> Challan List</a></li>
										<li><a href="deliveryview.php"> Order Status</a></li>
									</ul>
								</li>
							<?php }?>
							
							<?php if($_SESSION["rolecode"] == 'ADMIN'){ ?>
								<li class="has_sub">
									<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-basket-unfill"></i><span> Users </span> <span class="menu-arrow"></span></a>
									<ul class="list-unstyled">
										<li><a href="user-list.php"> Users List</a></li>
									</ul>
								</li>
							<?php }?>
							
							<li>
                                <a href="setting.php" class="waves-effect"><i class="mdi mdi-wrench"></i><span> Settings </span></a>
                            </li>

                            

                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0"><i class="mdi mdi-headset"></i> Helpline </h5>
                        <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+880) 1729 714 503</p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>
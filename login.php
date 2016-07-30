<?
    require_once("inc/global.php");
    require_once(MODEL_PATH . USERMODEL);
    require_once(CONTROLLER_PATH . LOGINCONTROLLER);
?>
<!DOCTYPE html>
<html>

<head>
   <!-- start: Meta -->
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <meta name="description" content="Clothes Station">
    <meta name="author" content="Clothes Station">
    <meta name="keyword" content="Clothes">
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="css/admin-forms.css">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <? require_once("inc-box/fonts.php"); ?>
    <!-- end: CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>
            <div style="background-color: #D3D925; padding: 15px; border-bottom: 2px solid #000; text-align: center;">
                <a class="brand" href="index.html"><img src="img/logo.png" border="0" width="180" /></a>
            </div>
            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">
                        <!-- <div class="col-xs-6 va-m pln">
                            <a href="dashboard.html" title="Return to Dashboard">
                                <img src="assets/img/logos/logo_white.png" title="AdminDesigns Logo" class="img-responsive w250">
                            </a>
                        </div> -->

                        <!-- <div class="col-xs-6 text-right va-b pr5">
                            <div class="login-links">
                                <a href="pages_login.html" class="active" title="Sign In">Sign In</a>
                                <span class="text-white"> | </span>
                                <a href="pages_register.html" class="" title="Register">Register</a>
                            </div>

                        </div> -->

                    </div>

                    <div class="panel panel-info mt10 br-n">

                        <div class="panel-heading heading-border bg-white">
                            <span class="panel-title hidden"><i class="fa fa-sign-in"></i>Register</span>
                            <div class="section row mn">
                                <div class="col-sm-6">
                                    <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                        <span><i class="fa fa-facebook"></i>
                                        </span>Facebook</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                        <span><i class="fa fa-twitter"></i>
                                        </span>Twitter</a>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <a href="#" class="button btn-social googleplus span-left btn-block">
                                        <span><i class="fa fa-google-plus"></i>
                                        </span>Google+</a>
                                </div> -->
                            </div>
                        </div>

                        <!-- end .form-header section -->
                        <form method="post" id="login-form" name="login-form">
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                    <div class="col-sm-12 pr30">

                                        <!-- <div class="section row hidden">
                                            <div class="col-md-6">
                                                <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                                    <span><i class="fa fa-facebook"></i>
                                                    </span>Facebook</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                                    <span><i class="fa fa-twitter"></i>
                                                    </span>Twitter</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class="button btn-social googleplus span-left btn-block">
                                                    <span><i class="fa fa-google-plus"></i>
                                                    </span>Google+</a>
                                            </div>
                                        </div> -->
                                        
                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" name="txtUsername" id="txtUsername" class="gui-input" placeholder="Enter username">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="txtPassword" id="txtPassword" class="gui-input" placeholder="Enter password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                    <!-- <div class="col-sm-5 br-l br-grey pl30">
                                        <h3 class="mb25"> You'll Have Access To Your:</h3>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Email Storage</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Photo Sharing/Storage</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Downloads</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Service Tickets</p>
                                    </div> -->
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <button type="submit" id="btnLogin" name="btnLogin" class="button btn-primary mr10 pull-right">Login</button>
                                <label class="switch block switch-primary pull-left input-align mt10">
                                    <input type="checkbox" name="remember" id="remember" checked>
                                    <label for="remember" data-on="YES" data-off="NO"></label>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <!-- end .form-footer section -->
                            <input type="hidden" name="validateuser" id="validateuser" value="1" />
                        </form>
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            $("#txtUsername").focus();
            
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
</body>
</html>
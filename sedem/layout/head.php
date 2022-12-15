<?php
@session_start();
include 'includes/all.php';
if(!$_SESSION['username'] AND !$_SESSION['pin'] AND !$_SESSION['access_level'] || $_SESSION['app_status']!=4){
    echo "<script>
                window.location='login.php';
        </script>";
}

$msg='';
$err='';
$warn='';


//COUNT FOR COMPANY DASHBOARD

$comp = Users::find_by_level();
$chk_num_rows_comp = $database->num_rows($comp);

$ap_com = Apply_Company_Advert::find_approve();
$chk_num_rows_ap_com = $database->num_rows($ap_com);

$re_com = Apply_Company_Advert::find_reject();
$chk_num_rows_re_com = $database->num_rows($re_com);

$pen_com = Apply_Company_Advert::find_pending();
$chk_num_rows_pen_com = $database->num_rows($pen_com);

$rej_com = Company::find_rej();
$chk_num_rows_rej_com = $database->num_rows($rej_com);

$Total_com_apply = $chk_num_rows_ap_com + $chk_num_rows_re_com + $chk_num_rows_pen_com;

//COUNT FOR COMPANY DASHBOARD BY SESSION
$ap_com_session = Apply_Company_Advert::find_approve_session();
$chk_num_rows_ap_com_session = $database->num_rows($ap_com_session);

$tcomp = Company_Post_Adverts::find_by_company_id_session($_SESSION['username']);
$chk_num_rows_tcomp = $database->num_rows($tcomp);

$re_com_session = Apply_Company_Advert::find_reject_session();
$chk_num_rows_re_com_session = $database->num_rows($re_com_session);

$pen_com_session = Apply_Company_Advert::find_pending_session();
$chk_num_rows_pen_com_session = $database->num_rows($pen_com_session);

$app_com = Users::approved_company();
$chk_app_com = $database->num_rows($app_com);

$Total_com_apply_session = $chk_num_rows_ap_com_session + $chk_num_rows_re_com_session + $chk_num_rows_pen_com_session;

//COUNT FOR DEPARTMENT DASHBOARD 
$dep = Department_Post_Adverts::fetch_all();
$chk_num_rows_dep_post_offer = $database->num_rows($dep);

$ap_dep = Apply_Department_Advert::find_approve();
$chk_num_rows_ap_dep = $database->num_rows($ap_dep);

$re_dep = Apply_Department_Advert::find_reject();
$chk_num_rows_re_dep = $database->num_rows($re_dep);

$pen_dep = Apply_Department_Advert::find_pending();
$chk_num_rows_pen_dep = $database->num_rows($pen_dep);

$Total_dep_apply = $chk_num_rows_ap_dep + $chk_num_rows_re_dep + $chk_num_rows_pen_dep;


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery-1.12.4.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
    
    
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/css/font-awesome.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery-1.12.4.js"></script>
  <script src="../assets/js/jquery-ui.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
    
    <!--
  <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap.min.css">
-->
<!--  <script src="../../assets/js/jquery.min.js"></script>-->
<!--  <script src="../../assets/js/bootstrap.min.js"></script>-->
<!--  <script src="../../assets/js/jquery-1.12.4.js"></script>-->
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
    
    <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <style type="text/css">
        h1.page-header {
    margin-top: -5px;
}

.sidebar {
	padding-left: 0;
}
        
 .reqiure{
    color: red;
}

.main-container { 
	background: #FFF;
	padding-top: 15px;
	margin-top: -20px;
}

.footer {
	width: 100%;
}  

:focus {
	outline: none;
}

.easypiechart-panel {
	text-align: center;
	padding: 1px 0;
	margin-bottom: 20px;
}

.placeholder h2 {
	margin-bottom: 0px;
}

.donut {
	width: 100%;
}

.easypiechart {
	position: relative;
	text-align: center;
	width: 120px;
	height: 120px;
	margin: 20px auto 10px auto;
}

.easypiechart .percent {
	display: block;
	position: absolute;
	font-size: 26px;
	top: 38px;
	width: 120px;
}

#easypiechart-blue .percent { color: #30a5ff;}
#easypiechart-teal .percent { color: #1ebfae;}
#easypiechart-orange .percent { color: #ffb53e;}
#easypiechart-red .percent { color: #ef4040;}

.side-menu {
	position: relative;
	width: 100%;
	height: 100%;
	background-color: #f8f8f8;
	border-right: 1px solid #e7e7e7;
}
.side-menu .navbar {
	border: none;
}
.side-menu .navbar-header {
	width: 100%;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav .active a {
	background-color: transparent;
	margin-right: -1px;
	border-right: 5px solid #e7e7e7;
}
.side-menu .navbar-nav li {
	display: block;
	width: 100%;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu .navbar-nav li a {
	padding: 15px;
}
.side-menu .navbar-nav li a .glyphicon {
	padding-right: 10px;
}
.side-menu #dropdown {
	border: 0;
	margin-bottom: 0;
	border-radius: 0;
	background-color: transparent;
	box-shadow: none;
}
.side-menu #dropdown .caret {
	float: right;
	margin: 9px 5px 0;
}
.side-menu #dropdown .indicator {
	float: right;
}
.side-menu #dropdown > a {
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body {
	padding: 0;
	background-color: #f3f3f3;
}
.side-menu #dropdown .panel-body .navbar-nav {
	width: 100%;
}
.side-menu #dropdown .panel-body .navbar-nav li {
	padding-left: 15px;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body .navbar-nav li:last-child {
	border-bottom: none;
}
.side-menu #dropdown .panel-body .panel > a {
	margin-left: -20px;
	padding-left: 35px;
}
.side-menu #dropdown .panel-body .panel-body {
	margin-left: -15px;
}
.side-menu #dropdown .panel-body .panel-body li {
	padding-left: 30px;
}
.side-menu #dropdown .panel-body .panel-body li:last-child {
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #search-trigger {
	background-color: #f3f3f3;
	border: 0;
	border-radius: 0;
	position: absolute;
	top: 0;
	right: 0;
	padding: 15px 18px;
}
.side-menu .brand-name-wrapper {
	min-height: 50px;
}
.side-menu .brand-name-wrapper .navbar-brand {
	display: block;
}
.side-menu #search {
	position: relative;
	z-index: 1000;
}
.side-menu #search .panel-body {
	padding: 0;
}
.side-menu #search .panel-body .navbar-form {
	padding: 0;
	padding-right: 50px;
	width: 100%;
	margin: 0;
	position: relative;
	border-top: 1px solid #e7e7e7;
}
.side-menu #search .panel-body .navbar-form .form-group {
	width: 100%;
	position: relative;
}
.side-menu #search .panel-body .navbar-form input {
	border: 0;
	border-radius: 0;
	box-shadow: none;
	width: 100%;
	height: 50px;
}
.side-menu #search .panel-body .navbar-form .btn {
	position: absolute;
	right: 0;
	top: 0;
	border: 0;
	border-radius: 0;
	background-color: #f3f3f3;
	padding: 15px 18px;
}
/* Main body section */
.side-body {
	margin-left: 310px;
}
/* small screen */
@media (max-width: 768px) {
	.side-menu {
		position: relative;
		width: 100%;
		height: 0;
		border-right: 0;
	}

	.side-menu .navbar {
		z-index: 999;
		position: relative;
		height: 0;
		min-height: 0;
		background-color:none !important;
		border-color: none !important;
	}
	.side-menu .brand-name-wrapper .navbar-brand {
		display: inline-block;
	}
	/* Slide in animation */
	@-moz-keyframes slidein {
		0% {
			left: -300px;
		}
		100% {
			left: 10px;
		}
	}
	@-webkit-keyframes slidein {
		0% {
			left: -300px;
		}
		100% {
			left: 10px;
		}
	}
	@keyframes slidein {
		0% {
			left: -300px;
		}
		100% {
			left: 10px;
		}
	}
	@-moz-keyframes slideout {
		0% {
			left: 0;
		}
		100% {
			left: -300px;
		}
	}
	@-webkit-keyframes slideout {
		0% {
			left: 0;
		}
		100% {
			left: -300px;
		}
	}
	@keyframes slideout {
		0% {
			left: 0;
		}
		100% {
			left: -300px;
		}
	}
	/* Slide side menu*/
	/* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
	.side-menu-container > .navbar-nav.slide-in {
		-moz-animation: slidein 300ms forwards;
		-o-animation: slidein 300ms forwards;
		-webkit-animation: slidein 300ms forwards;
		animation: slidein 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	.side-menu-container > .navbar-nav {
		/* Add position:absolute for scrollable menu -> see top comment */
		position: fixed;
		left: -300px;
		width: 300px;
		top: 43px;
		height: 100%;
		border-right: 1px solid #e7e7e7;
		background-color: #f8f8f8;
		overflow: auto;
		-moz-animation: slideout 300ms forwards;
		-o-animation: slideout 300ms forwards;
		-webkit-animation: slideout 300ms forwards;
		animation: slideout 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	@-moz-keyframes bodyslidein {
		0% {
			left: 0;
		}
		100% {
			left: 300px;
		}
	}
	@-webkit-keyframes bodyslidein {
		0% {
			left: 0;
		}
		100% {
			left: 300px;
		}
	}
	@keyframes bodyslidein {
		0% {
			left: 0;
		}
		100% {
			left: 300px;
		}
	}
	@-moz-keyframes bodyslideout {
		0% {
			left: 300px;
		}
		100% {
			left: 0;
		}
	}
	@-webkit-keyframes bodyslideout {
		0% {
			left: 300px;
		}
		100% {
			left: 0;
		}
	}
	@keyframes bodyslideout {
		0% {
			left: 300px;
		}
		100% {
			left: 0;
		}
	}
	/* Slide side body*/
	.side-body {
		margin-left: 5px;
		margin-top: 70px;
		position: relative;
		-moz-animation: bodyslideout 300ms forwards;
		-o-animation: bodyslideout 300ms forwards;
		-webkit-animation: bodyslideout 300ms forwards;
		animation: bodyslideout 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	.body-slide-in {
		-moz-animation: bodyslidein 300ms forwards;
		-o-animation: bodyslidein 300ms forwards;
		-webkit-animation: bodyslidein 300ms forwards;
		animation: bodyslidein 300ms forwards;
		-webkit-transform-style: preserve-3d;
		transform-style: preserve-3d;
	}
	/* Hamburger */
	.navbar-toggle-sidebar {
		border: 0;
		float: left;
		padding: 18px;
		margin: 0;
		border-radius: 0;
		background-color: #f3f3f3;
	}
	/* Search */
	#search .panel-body .navbar-form {
		border-bottom: 0;
	}
	#search .panel-body .navbar-form .form-group {
		margin: 0;
	}
	.side-menu .navbar-header {
		/* this is probably redundant */
		position: fixed;
		z-index: 3;
		background-color: #f8f8f8;
	}
	/* Dropdown tweek */
	#dropdown .panel-body .navbar-nav {
		margin: 0;
	}
}
        #datepicker{
            background-color: #fff;
        }
    </style>
<!--
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
-->
    
        <script>
  $( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
    $( "#datepicker3" ).datepicker();
    $( "#datepicker4" ).datepicker();
    $( "#datepicker5" ).datepicker();
  } );
  </script>
    
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Administrator
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
<!--
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
-->
			<ul class="nav navbar-nav navbar-right">
<!--				<li><a href="http://www.pingpong-labs.com" target="_blank">Visit Site</a></li>-->
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php
                            $comp = Company::find_by_id($_SESSION['username']);
                            $cm = $database->fetch_array($comp);
                            
                            echo "<strong>".$cm['company_name']."</strong> ";
                        ?>
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
                            <?php if($_SESSION['access_level']==2){ ?>
							<li class="dropdown-header">SETTINGS</li>
							<!--<li class=""><a href="#">Backup</a></li>-->
                            <?php } ?>
<!--							<li class=""><a href="#">Other Link</a></li>
							<li class=""><a href="#">Other Link</a></li>
-->
							<li class="divider"></li>
							<li><a href="logout">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
  <div>
     <!---Printing messages to the user-->
                <?php if($msg){ ?>
                    <h5 class="text-center alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $msg; ?>
                    </h5>
                <?php } ?>
                
                <?php if($err){ ?>
                    <h5 class="text-center alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $err; ?>
                    </h5>
                <?php } ?>
                    <!--- End of Printing messages to the user-->
    </div>
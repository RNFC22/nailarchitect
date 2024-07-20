<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
        .panel-heading {
            background-color: #dbbfaf !important;
            border-color: #dbbfaf !important;
        }

        .panel-heading:hover {
            background-color: #dbbfaf !important;
            border-color: #dbbfaf !important;
        }
        .btn-default:hover {
            background-color: #ffffff !important;
            color: #dbbfaf !important;
            border-color: #dbbfaf !important;
        }
        .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    color: #dbbfaf; 
     background-color: #ffffff;
     border-color: #dbbfaf;
}

        .btn-primary:hover {
            background-color: #ffffff !important;
            color: #dbbfaf !important;
            border-color: #dbbfaf !important;
        }

        .btn-primary {
            background-color: #ffffff !important;
            color: black !important;
            border-color: #dbbfaf !important;
        }

        .top-navbar {
	background:#dbbfaf;
	border-bottom:none;
}

.top-navbar .nav > li > a:hover, .top-navbar .nav > li > a:focus {
    text-decoration: none;
    background-color: #dbbfaf;
    color: #fff;
}
.active-menu {
    background-color:white!important;
}

.btn-primary .badge {
    color: #dbbfaf;
    background-color: #fff;
}
.top-navbar .navbar-brand {
color: #fff ;
width: 260px;
text-align: left;
height: 60px;
font-size: 30px;
font-weight: 700;
text-transform: uppercase;
line-height: 30px;
background: #dbbfaf;
}
.sidebar-collapse .nav > li > a {
    color: #000;
    background: transparent;
    text-shadow: none;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 40px;
    color: #fff;
}
    </style>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="analytics.php"><i class="fa fa-bar-chart"></i> Analytics</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li><a href="analytics.php"><i class="fa fa-bar-chart"></i>Trends</a>
                        </li>
                        <li><a href="view_bookings.php"><i class="fa fa-bar-chart"></i>View Bookings</a>
                        </li>    

                    

                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

						
									
									

						
					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        Welcome to the Administrator Side <?php echo $_SESSION["user"]; ?> </a>!
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
<?php
include('db.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservation Nail Salon</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .panel-primary > .panel-heading {
            color: #dbbfaf;
            background-color: #fff;
            border-color: #dbbfaf;
        }

        .btn-primary {
            color: #dbbfaf;
            background-color: #000000;
            border-color: #000000;
        }

        .btn-primary:hover {
            color: #000000;
            background-color: #ffffff;
            border-color: #000000;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #dbbfaf;
            background-color: #fff;
            background-image: none;
            border: 1px solid #000000;
            border-color: #dbbfaf;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .form-control:focus {
            border-color: #dbbfaf;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        }
    .btn-primary {
    color: #fff;
    background-color: #dbbfaf;
    border-color: #dbbfaf;
}
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                </ul>
            </div>
        </nav>
       
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Reservation <small></small>
                        </h1>
                    </div>
                </div> 
                 
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Personal Information
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="fname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Type of Nail *</label>
                                        <select name="nail_type" class="form-control" required>
                                            <option value="" disabled selected>Select nail type</option>
                                            <option value="Acrylic">Acrylic</option>
                                            <option value="Press Ons">Press Ons</option>
                                            <option value="Shellac">Shellac</option>
                                            <option value="Dip Powder">Dip Powder</option>
                                            <option value="Plexigel Manicure.">Plexigel Manicure.</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date *</label>
                                        <input name="date" type="date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Time *</label>
                                        <select name="appointment_time" class="form-control" required>
                                            <option value="" disabled selected>Select time</option>
                                            <option value="8:30-10:30">8:30 PM - 9:30 AM</option>
                                            <option value="10:00-12:00">10:00 AM - 12:00 PM</option>
                                            <option value="12:30-2:30">12:30 PM - 2:30 PM</option>
                                            <option value="3:30-5:30">3:30 PM - 5:30 PM</option>
                                            <option value="6:00-8:00">6:00 PM - 8:00 PM</option>
                                            <option value="8:30-10:30">8:30 PM - 10:30 PM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        // Initialize variables
                                        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
                                        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
                                        $email = isset($_POST['email']) ? $_POST['email'] : '';
                                        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                                        $nail_type = isset($_POST['nail_type']) ? $_POST['nail_type'] : '';
                                        $date = isset($_POST['date']) ? $_POST['date'] : '';
                                        $appointment_time = isset($_POST['appointment_time']) ? $_POST['appointment_time'] : '';

                                        // Validate and sanitize input
                                        $fname = mysqli_real_escape_string($con, $fname);
                                        $lname = mysqli_real_escape_string($con, $lname);
                                        $email = mysqli_real_escape_string($con, $email);
                                        $phone = mysqli_real_escape_string($con, $phone);
                                        $nail_type = mysqli_real_escape_string($con, $nail_type);
                                        $date = mysqli_real_escape_string($con, $date);
                                        $appointment_time = mysqli_real_escape_string($con, $appointment_time);

                                        $con = mysqli_connect("localhost", "root", "", "salone");
                                        if (!$con) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }

                                        $query = "INSERT INTO nail_bookings (fname, lname, email, phone, nail_type, date, appointment_time, status) 
                                                  VALUES ('$fname', '$lname', '$email', '$phone', '$nail_type', '$date', '$appointment_time', 'Not Confirmed')";
                                        if (mysqli_query($con, $query)) {
                                            echo "<script type='text/javascript'> alert('Your booking has been successfully submitted.'); </script>";
                                        } else {
                                            echo "<script type='text/javascript'> alert('Error adding booking to the database: " . mysqli_error($con) . "'); </script>";
                                        }

                                        mysqli_close($con);
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>

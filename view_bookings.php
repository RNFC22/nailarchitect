<?php
// Start session and include database connection
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
    exit();
}

include('db.php');

header('Content-Type: text/html; charset=utf-8');

// Check if this is an AJAX request for DataTables
if (isset($_GET['draw'])) {
    // DataTables parameters
    $start = $_GET['start'];
    $length = $_GET['length'];
    $search = $_GET['search']['value'];

    // Total records
    $totalQuery = "SELECT COUNT(*) as count FROM nail_bookings";
    $totalResult = mysqli_query($con, $totalQuery);
    $totalCount = mysqli_fetch_assoc($totalResult)['count'];

    // Filtered records
    $searchQuery = "";
    if (!empty($search)) {
        $searchQuery = "WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR nail_type LIKE '%$search%' OR date LIKE '%$search%' OR appointment_time LIKE '%$search%'";
    }

    $query = "SELECT id, fname, lname, email, phone, nail_type, date, appointment_time FROM nail_bookings $searchQuery LIMIT $start, $length";
    $result = mysqli_query($con, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    $response = [
        "draw" => intval($_GET['draw']),
        "recordsTotal" => $totalCount,
        "recordsFiltered" => count($data),
        "data" => $data
    ];

    echo json_encode($response);
    mysqli_close($con);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nail Bookings</title>
    <!-- Bootstrap Styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- DataTables Styles -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles -->
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        .table-container {
            margin-top: 30px;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h1 class="page-header">Nail Bookings</h1>
        <table id="nailBookingsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Nail Type</th>
                    <th>Date</th>
                    <th>Appointment Time</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated by DataTables -->
            </tbody>
        </table>
    </div>

    <!-- jQuery and DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <!-- Bootstrap Scripts -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#nailBookingsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "", // URL to the PHP script
                    "type": "GET"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "fname" },
                    { "data": "lname" },
                    { "data": "email" },
                    { "data": "phone" },
                    { "data": "nail_type" },
                    { "data": "date" },
                    { "data": "appointment_time" }
                ]
            });
        });
    </script>
</body>
</html>

<?php
header('Content-Type: application/json');

include('db.php');

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
    $searchQuery = "WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR nail_type LIKE '%$search%' OR date LIKE '%$search%' OR appointment_time LIKE '%$search%' OR status LIKE '%$search%'";
}

$query = "SELECT id, fname, lname, email, phone, nail_type, date, appointment_time, status FROM nail_bookings $searchQuery LIMIT $start, $length";
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
?>

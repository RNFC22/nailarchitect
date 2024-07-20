<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}

include('db.php'); 

$nailTypeQuery = "SELECT nail_type, COUNT(*) as count FROM nail_bookings GROUP BY nail_type";
$nailTypeResult = mysqli_query($con, $nailTypeQuery);

$appointmentTimeQuery = "SELECT appointment_time, COUNT(*) as count FROM nail_bookings GROUP BY appointment_time";
$appointmentTimeResult = mysqli_query($con, $appointmentTimeQuery);

$nailTypes = [];
$nailCounts = [];
$appointmentTimes = [];
$appointmentCounts = [];


while ($row = mysqli_fetch_assoc($nailTypeResult)) {
    $nailTypes[] = $row['nail_type'];
    $nailCounts[] = $row['count'];
}

while ($row = mysqli_fetch_assoc($appointmentTimeResult)) {
    $appointmentTimes[] = $row['appointment_time'];
    $appointmentCounts[] = $row['count'];
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Analytics - Nail Salon</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }
        .container {
            margin-top: 30px;
        }
        .page-header {
            margin-bottom: 40px;
            color: #fff ;
            font-weight: bold;
            padding 20px;
            background: #dbbfaf;
        
        }
        .interpretation {
            margin-top: 20px;
            color: #555;
            font-size: 16px;
        }
        .btn-print {
            margin-top: 20px;
        }
        canvas {
            background-color: #f9f9f9;
        }
        .chartjs-render-monitor {
            font-size: 16px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #000;
        }
        th {
            background-color: #f4f4f4;
        }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #dbbfaf;
    border-color: #f02828;
}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-header">Analytics</h1>
        
        <div class="row">
            <div class="col-md-6">
                <h2>Most Popular Nail Types</h2>
                <div class="chart-container">
                    <canvas id="nailTypeChart"></canvas>
                </div>
                <div class="interpretation">
                    <p>The chart above displays the distribution of different nail types based on the number of bookings. This allows us to identify which nail types are the most popular among our clients.</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nail Type</th>
                            <th>Number of Bookings</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nailTypes as $index => $type) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($type); ?></td>
                                <td><?php echo htmlspecialchars($nailCounts[$index]); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h2>Most Popular Appointment Times</h2>
                <div class="chart-container">
                    <canvas id="appointmentTimeChart"></canvas>
                </div>
                <div class="interpretation">
                    <p>The chart above shows the distribution of bookings across different appointment times. It helps us understand peak times and plan our scheduling more efficiently.</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Appointment Time</th>
                            <th>Number of Bookings</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointmentTimes as $index => $time) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($time); ?></td>
                                <td><?php echo htmlspecialchars($appointmentCounts[$index]); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="btn btn-primary btn-print" onclick="window.print()">Print Report</button>
    </div>

    <script>
        // Data for nail types
        var ctxNailType = document.getElementById('nailTypeChart').getContext('2d');
        var nailTypeChart = new Chart(ctxNailType, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nailTypes); ?>,
                datasets: [{
                    label: 'Number of Bookings',
                    data: <?php echo json_encode($nailCounts); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#333',
                            font: {
                                size: 16
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });

        // Data for appointment times
        var ctxAppointmentTime = document.getElementById('appointmentTimeChart').getContext('2d');
        var appointmentTimeChart = new Chart(ctxAppointmentTime, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($appointmentTimes); ?>,
                datasets: [{
                    label: 'Number of Bookings',
                    data: <?php echo json_encode($appointmentCounts); ?>,
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#333',
                            font: {
                                size: 16
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#333',
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

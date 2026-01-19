<?php
include "../PHP/Dashboard_counts.php";
include "../PHP/Appointment_stats.php";
include "../PHP/Payment_stats.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../Css/Dashboard.css">
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a class="active" href="../Html/Dashboard.php">Dashboard</a></li>
        <li><a href="../Html/Doctors.php">Doctors</a></li>
        <li><a href="../Html/appointments.php">Appointments</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>

<div class="main-content">

    <div class="header">
        <h1>Admin Dashboard</h1>
        <p>Online Doctor Appointment Management System</p>
    </div>

    <div class="card-container">
        <div class="card">
            <h3>Total Doctors</h3>
            <p><?php echo $totalDoctors; ?></p>
        </div>

        <div class="card">
            <h3>Total Patients</h3>
            <p><?php echo $totalPatients; ?></p>
        </div>

        <div class="card">
            <h3>Total Appointments</h3>
            <p><?php echo $totalAppointments; ?></p>
        </div>
    </div>

    <div class="analytics-section">
        <h2>System Usage Analytics</h2>

        <div class="analytics-container">

            <div class="analytics-box">
                <h3>Appointment Flow Status</h3>

                <div class="circle-chart">
                    <div class="circle"
                         style="background: conic-gradient(
                            #f59e0b 0% <?php echo $pendingPercent; ?>%,
                            #3b82f6 <?php echo $pendingPercent; ?>% <?php echo $pendingPercent + $acceptedPercent; ?>%,
                            #22c55e <?php echo $pendingPercent + $acceptedPercent; ?>% 100%
                         );">

                        <span>
                            Pending <?php echo $pendingPercent; ?>%<br>
                            Accepted <?php echo $acceptedPercent; ?>%<br>
                            Completed <?php echo $completedPercent; ?>%
                        </span>
                    </div>
                </div>

                <div class="legend">
                    <div><span class="dot pending"></span> Pending</div>
                    <div><span class="dot approved"></span> Accepted</div>
                    <div><span class="dot completed"></span> Completed</div>
                </div>
            </div>

            <div class="analytics-box">
                <h3>Payment Status</h3>

                <div class="bar">
                    <span>Paid</span>
                    <div class="progress">
                        <div class="fill paid" style="width:<?php echo $paidPercent; ?>%"></div>
                    </div>
                </div>

                <div class="bar">
                    <span>Unpaid</span>
                    <div class="progress">
                        <div class="fill unpaid" style="width:<?php echo $unpaidPercent; ?>%"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>

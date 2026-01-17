<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="Doctors.php">Doctors</a></li>
        <li><a href="#">Diagnostic Labs</a></li>
        <li><a href="#">Appointments</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">

    <!-- Header -->
    <div class="header">
        <h1>Admin Dashboard</h1>
        <p>Online Doctor Appointment & Diagnostic Management System</p>
    </div>

    <!-- Summary Cards -->
    <div class="card-container">
        <div class="card">
            <h3>Total Doctors</h3>
            <p>45</p>
        </div>
        <div class="card">
            <h3>Total Patients</h3>
            <p>320</p>
        </div>
        <div class="card">
            <h3>Total Appointments</h3>
            <p>128</p>
        </div>
        <div class="card">
            <h3>Diagnostic Orders</h3>
            <p>76</p>
        </div>
    </div>

    <!-- System Usage Analytics -->
    <div class="analytics-section">
        <h2>📊 System Usage Analytics</h2>

        <div class="analytics-container">

            <!-- Appointment Flow -->
            <div class="analytics-box">
                <h3>Appointment Flow Status</h3>

                <div class="circle-chart">
                    <div class="circle">
                        <span>
                            Pending 20%<br>
                            Approved 35%<br>
                            Completed 45%
                        </span>
                    </div>
                </div>

                <div class="legend">
                    <div><span class="dot pending"></span> Pending</div>
                    <div><span class="dot approved"></span> Approved</div>
                    <div><span class="dot completed"></span> Completed</div>
                </div>
            </div>

            <!-- Payment Status -->
            <div class="analytics-box">
                <h3>Payment Status</h3>

                <div class="bar">
                    <span>Paid</span>
                    <div class="progress">
                        <div class="fill paid"></div>
                    </div>
                </div>

                <div class="bar">
                    <span>Unpaid</span>
                    <div class="progress">
                        <div class="fill unpaid"></div>
                    </div>
                </div>
            </div>

            <!-- Report Delivery -->
            <div class="analytics-box">
                <h3>Diagnostic Report Delivery</h3>

                <div class="bar">
                    <span>Delivered</span>
                    <div class="progress">
                        <div class="fill delivered"></div>
                    </div>
                </div>

                <div class="bar">
                    <span>Pending</span>
                    <div class="progress">
                        <div class="fill report-pending"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>

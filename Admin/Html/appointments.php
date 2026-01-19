<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="../Css/appointment.css">
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="../Html/Dashboard.php">Dashboard</a></li>
        <li><a href="../Html/Doctors.php">Doctors</a></li>
        <li><a href="../Html/appointments.php" class="active">Appointments</a></li>
        <li><a href="../PHP/Logout.php">Logout</a></li>
    </ul>
</div>

<div class="main-content">

    <div class="header">
        <h1>Appointment Flow Monitor</h1>
        <p>Manage appointment requests and history</p>
    </div>

    <div class="tab-buttons">
        <button class="tab-btn active" onclick="loadAppointments('Pending', this)">Pending</button>
        <button class="tab-btn" onclick="loadAppointments('Accepted', this)">Accepted</button>
        <button class="tab-btn" onclick="loadAppointments('Completed', this)">Completed</button>
        <button class="tab-btn" onclick="loadAppointments('Canceled', this)">Canceled</button>
    </div>
    <div class="form-section">
        <table>
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Serial / Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="appointmentData">
                <tr>
                    <td colspan="7" style="text-align:center;">Loading...</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<script src="../JS/appointment.js"></script>
<script src="../JS/load_appointments.js"></script>

</body>
</html>
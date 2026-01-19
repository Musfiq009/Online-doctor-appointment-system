<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="appointment.css">
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="Dashboard.php">Dashboard</a></li>
        <li><a href="Doctors.php">Doctors</a></li>
        <li><a href="#" class="active">Appointments</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>

<div class="main-content">

    <div class="header">
        <h1>Appointment Flow Monitor</h1>
        <p>Manage appointment requests and history</p>
    </div>

    <div class="tab-buttons">
        <button class="">Pending</button>
        <button class="">Accepted</button>
        <button class="">Completed</button>
        <button class="">Canceled</button>
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
</body>
</html>
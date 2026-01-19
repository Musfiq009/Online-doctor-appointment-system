<?php
include "../DB/configDB.php";

$qDoctors = mysqli_query($conn, "SELECT COUNT(*) AS total FROM doctors");
$totalDoctors = mysqli_fetch_assoc($qDoctors)['total'];

$qPatients = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='patient'");
$totalPatients = mysqli_fetch_assoc($qPatients)['total'];

$qAppointments = mysqli_query($conn, "SELECT COUNT(*) AS total FROM appointments");
$totalAppointments = mysqli_fetch_assoc($qAppointments)['total'];
?>
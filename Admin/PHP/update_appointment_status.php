<?php
include "../DB/configDB.php";

if (!isset($_GET['id'], $_GET['action'])) {
    die("Missing parameters");
}

$id = (int)$_GET['id'];
$action = $_GET['action'];

if ($action === 'accept') {
    $infoSql = "
    SELECT doctor_id, appointment_date, consultation_type
    FROM appointments
    WHERE appointment_id = $id
    ";
    $infoResult = mysqli_query($conn, $infoSql);
    $appointment = mysqli_fetch_assoc($infoResult);

    if (!$appointment) {
        die("Appointment not found");
    }



    if (!mysqli_query($conn, $sql)) {
        die("SQL Error: " . mysqli_error($conn));
    }

    echo "Accepted successfully";
}


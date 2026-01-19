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

    $doctorId = $appointment['doctor_id'];
    $date = $appointment['appointment_date'];
    $type = $appointment['consultation_type'];

    if ($type === 'Online' && !empty($_GET['time'])) {

        $time = mysqli_real_escape_string($conn, $_GET['time']);

        $sql = "
            UPDATE appointments
            SET status='Accepted', appointment_time='$time'
            WHERE appointment_id=$id
        ";
    }

    else {

        $serialSql = "
            SELECT MAX(serial_number) AS last_serial
            FROM appointments
            WHERE doctor_id = $doctorId
              AND appointment_date = '$date'
              AND consultation_type = 'Onsite'
              AND status IN ('Accepted','Completed')
        ";

        $serialResult = mysqli_query($conn, $serialSql);
        $row = mysqli_fetch_assoc($serialResult);

        $nextSerial = ($row['last_serial'] ?? 0) + 1;

        $sql = "
            UPDATE appointments
            SET status='Accepted', serial_number=$nextSerial
            WHERE appointment_id=$id
        ";
    }

    if (!mysqli_query($conn, $sql)) {
        die("SQL Error: " . mysqli_error($conn));
    }

    echo "Accepted successfully";
}

elseif ($action === 'reject') {

    $sql = "UPDATE appointments SET status='Canceled' WHERE appointment_id=$id";

    if (!mysqli_query($conn, $sql)) {
        die("SQL Error: " . mysqli_error($conn));
    }

    echo "Rejected successfully";
}

elseif ($action === 'complete') {

    $sql = "UPDATE appointments SET status='Completed' WHERE appointment_id=$id";

    if (!mysqli_query($conn, $sql)) {
        die("SQL Error: " . mysqli_error($conn));
    }

    echo "Completed successfully";
}

else {
    echo "Invalid action";
}

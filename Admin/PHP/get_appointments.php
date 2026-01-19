<?php
include "../DB/configDB.php";

$status = $_GET['status'] ?? 'Pending';
$sql = "
SELECT 
a.appointment_id,
u.full_name AS patient_name,
d.full_name AS doctor_name,
a.appointment_date,
a.consultation_type,
a.serial_number,
a.appointment_time,
a.status
FROM appointments a
JOIN users u ON a.patient_id = u.user_id
JOIN doctors d ON a.doctor_id = d.doctor_id
WHERE a.status = '$status'
ORDER BY a.appointment_date DESC
";

$result = mysqli_query($conn, $sql);

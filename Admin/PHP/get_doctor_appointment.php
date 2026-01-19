<?php
include "../DB/configDB.php";

$sql = "
    SELECT 
    a.appointment_id,
    a.appointment_date,
    a.appointment_time,
    a.consultation_type,
    u.full_name AS patient_name
    FROM appointments a
    JOIN users u ON a.patient_id = u.user_id
    WHERE a.doctor_id = $doctor_id
    AND a.status = 'Completed'
    ORDER BY a.appointment_date DESC
";

$appointmentResult = mysqli_query($conn, $sql);

if (!$appointmentResult || mysqli_num_rows($appointmentResult) === 0) {
    echo "<p style='color:#64748b;'>No completed appointments found.</p>";
    return;
}
?>
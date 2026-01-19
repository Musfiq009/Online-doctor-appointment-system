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

if (!$result) {
    echo "<tr><td colspan='7' style='text-align:center;color:red;'>SQL Error: ".mysqli_error($conn)."</td></tr>";
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "<tr><td colspan='7' style='text-align:center;'>No appointments found</td></tr>";
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
    $appointmentId = $row['appointment_id'];
    $type = $row['consultation_type'];
    $serialOrTime = ($type === 'Onsite') ? ($row['serial_number'] ?? '-') : ($row['appointment_time'] ?? '-');
    ?>
    <tr>
        <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
        <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
        <td><?php echo $row['appointment_date']; ?></td>
        <td><?php echo $type; ?></td>
        <td><?php echo $serialOrTime; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <?php if ($row['status'] === 'Pending') { ?>
                <button class="action-btn accept" onclick="acceptAppointment(<?php echo $appointmentId; ?>,'<?php echo $type; ?>')">Accept</button>
                <button class="action-btn reject" onclick="rejectAppointment(<?php echo $appointmentId; ?>)">Reject</button>
            <?php } elseif ($row['status'] === 'Accepted') { ?>
                <button class="action-btn complete" onclick="completeAppointment(<?php echo $appointmentId; ?>)">Complete</button>
            <?php } else { ?>
                -
            <?php } ?>
        </td>
    </tr>
<?php } ?>

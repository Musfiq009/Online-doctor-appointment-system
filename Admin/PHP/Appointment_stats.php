<?php
include "../DB/configDB.php";

$pending = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM appointments WHERE status='Pending'")
)['total'];

$accepted = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM appointments WHERE status='Accepted'")
)['total'];

$completed = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM appointments WHERE status='Completed'")
)['total'];

$totalFlow = $pending + $accepted + $completed;

$pendingPercent   = $totalFlow ? round(($pending / $totalFlow) * 100) : 0;
$acceptedPercent  = $totalFlow ? round(($accepted / $totalFlow) * 100) : 0;
$completedPercent = $totalFlow ? round(($completed / $totalFlow) * 100) : 0;
?>
<?php
include "../DB/configDB.php";

$paid = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM payments WHERE payment_status='Paid'")
)['total'];

$unpaid = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM payments WHERE payment_status='Pending'")
)['total'];

$totalPayments = $paid + $unpaid;

$paidPercent   = $totalPayments ? round(($paid / $totalPayments) * 100) : 0;
$unpaidPercent = $totalPayments ? round(($unpaid / $totalPayments) * 100) : 0;
?>
<?php
include "configDB.php";

if (!isset($_GET['id'])) {
    die("Doctor ID not provided");
}

$id = (int) $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM doctors WHERE doctor_id=$id");
$doctor = mysqli_fetch_assoc($result);

if (!$doctor) {
    die("Doctor not found");
}
?>
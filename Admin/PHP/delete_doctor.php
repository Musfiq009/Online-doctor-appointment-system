<?php
include "../DB/configDB.php";
header('Content-Type: application/json');

if (!isset($_POST['id'])) {
    echo json_encode(["status" => "error", "message" => "ID missing"]);
    exit;
}

$doctor_id = (int) $_POST['id'];

$result = mysqli_query($conn, "SELECT photo FROM doctors WHERE doctor_id = $doctor_id");
$doctor = mysqli_fetch_assoc($result);

if (!$doctor) {
    echo json_encode(["status" => "error", "message" => "Doctor not found"]);
    exit;
}

$photo_path = "../Images/" . $doctor['photo'];
if (file_exists($photo_path)) {
    unlink($photo_path);
}

if (mysqli_query($conn, "DELETE FROM doctors WHERE doctor_id = $doctor_id")) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Delete failed"]);
}
?>
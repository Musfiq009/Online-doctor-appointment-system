<?php
session_start();
include "../db/configDB.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "
SELECT 
    u.user_id,
    u.full_name,
    u.email,
    u.phone,
    u.role,
    p.gender,
    p.age,
    p.blood_group,
    p.address
FROM users u
LEFT JOIN patient_profiles p
ON u.user_id = p.patient_id
WHERE u.user_id = '$user_id'
";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

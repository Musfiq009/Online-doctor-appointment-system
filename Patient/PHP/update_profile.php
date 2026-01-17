<?php
session_start();
include "../db/configDB.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$full_name   = $_POST['full_name'];
$phone       = $_POST['phone'];
$gender      = $_POST['gender'];
$age         = $_POST['age'];
$blood_group = $_POST['blood_group'];
$address     = $_POST['address'];

/* Update users table */
mysqli_query($conn, "
UPDATE users SET
full_name = '$full_name',
phone = '$phone'
WHERE user_id = '$user_id'
");

/* Check if profile exists */
$check = mysqli_query($conn, "SELECT * FROM patient_profiles WHERE patient_id='$user_id'");

if (mysqli_num_rows($check) > 0) {

    mysqli_query($conn, "
    UPDATE patient_profiles SET
    gender='$gender',
    age='$age',
    blood_group='$blood_group',
    address='$address'
    WHERE patient_id='$user_id'
    ");

} else {

    mysqli_query($conn, "
    INSERT INTO patient_profiles
    (patient_id, gender, age, blood_group, address)
    VALUES
    ('$user_id','$gender','$age','$blood_group','$address')
    ");
}

$_SESSION['success_msg'] = "Information saved successfully";
header("Location: ../html/userprofile.php");
exit();

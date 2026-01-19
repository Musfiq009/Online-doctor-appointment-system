<?php
session_start();
include "../db/configDB.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../html/login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $consultation_type = $_POST['consultation_type'];
    $appointment_date = $_POST['appointment_date'];

    if($consultation_type == "Online"){
        $appointment_time = NULL;
    }

    if($consultation_type == "Onsite"){
        $appointment_time = "17:00:00";
    }

    $sql = "INSERT INTO appointments (patient_id, doctor_id, consultation_type, appointment_date, appointment_time, status)
            VALUES ('$patient_id', '$doctor_id', '$consultation_type', '$appointment_date', '$appointment_time', 'Pending')";

    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['msg'] = "Appointment request sent successfully!";
        header("Location: ../html/logedinDashboard.php");
    } else {
        $_SESSION['msg'] = "Failed to send request!";
        header("Location: ../html/appointmentForm.php?doctor_id=$doctor_id");
    }
}
?>

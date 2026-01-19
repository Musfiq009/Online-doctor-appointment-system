<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../html/login.php");
    exit();
}

include "../db/configDB.php";

$doctor_id = $_GET['doctor_id']; 
$patient_id = $_SESSION['user_id'];

$sql = "SELECT * FROM doctors WHERE doctor_id='$doctor_id'";
$result = mysqli_query($conn, $sql);
$doctor = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../Css/appointment.css">
</head>
<body>

<div class="doctor-box">
    <img src="../Images/<?php echo $doctor['photo']; ?>" alt="Doctor Photo">
    <h3><?php echo $doctor['full_name']; ?></h3>
    <p><?php echo $doctor['specialization']; ?> | <?php echo $doctor['category']; ?></p>
</div>

<form method="POST" action="../php/saveAppointment.php">
    <h2>Book Appointment</h2>

    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
    <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

    <label>Consultation Type</label>
    <select name="consultation_type" required>
        <option value="">Select Type</option>
        <option value="Online">Online</option>
        <option value="Onsite">Onsite</option>
    </select>

    <label>Appointment Date</label>
    <input type="date" name="appointment_date" required>

    <button type="submit">Send Request</button>
</form>

</body>
</html>

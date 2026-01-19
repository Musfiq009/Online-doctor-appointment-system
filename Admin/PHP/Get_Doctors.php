<?php
include "../DB/configDB.php";

$sql = "SELECT * FROM doctors ORDER BY doctor_id DESC";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>

<div id="doctor-<?php echo $row['doctor_id']; ?>" class="doctor-card">

    <img src="../Images/<?php echo $row['photo']; ?>" alt="Doctor">

    <h3><?php echo $row['full_name']; ?></h3>
    <p><strong>Degree:</strong> <?php echo $row['degree']; ?></p>
    <p><strong>Specialization:</strong> <?php echo $row['specialization']; ?></p>
    <p><strong>Status:</strong> 
        <span style="color:<?php echo $row['status']=='Available'?'green':'red'; ?>">
            <?php echo $row['status']; ?>
        </span>
    </p>

   <div class="card-buttons">
    <a href="../Html/edit_doctor.php?id=<?php echo $row['doctor_id'];?>" 
       target="_blank" 
       class="btn-edit">
        Edit
    </a>

    <a href="#" 
     class="btn-delete"
     onclick="deleteDoctor(<?php echo $row['doctor_id']; ?>)">
     Delete
   </a>
    </div>
<script src="../JS/delete_DoctorCard.js"></script>

</div>
<?php } ?>

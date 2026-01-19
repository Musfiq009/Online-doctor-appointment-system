<?php
include "../DB/configDB.php";

$keyword = "";

if (isset($_GET['keyword'])) {
    $keyword = trim($_GET['keyword']);
}

$sql = "SELECT * FROM doctors WHERE status='Available'";

if (!empty($keyword)) {
    $keyword = mysqli_real_escape_string($conn, $keyword);

    $sql .= " AND (
        full_name LIKE '%$keyword%'
        OR specialization LIKE '%$keyword%'
        OR category LIKE '%$keyword%'
    )";
}

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="doctor-card">
            <img src="../images/<?php echo $row['photo']; ?>" alt="Doctor">
            <h3><?php echo $row['full_name']; ?></h3>
            <p><?php echo $row['specialization']; ?></p>
            <p><?php echo $row['degree']; ?></p>

            <a href="appointmentForm.php?doctor_id=<?php echo $row['doctor_id']; ?>">
                <button>Book Now</button>
            </a>
        </div>
        <?php
    }

} else {
    echo "<p style='text-align:center;'>No doctors found</p>";
}
?>

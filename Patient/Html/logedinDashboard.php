<?php
include "../db/configDB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prescripto | Doctor Appointment</title>
    <link rel="stylesheet" href="../css/logedinDashboard.css">
</head>
<body>

<header class="navbar">
    <div class="logo">consultation time</div>
    <nav>
        <a href="">Home</a>
        <a href="../html/bookappointment.php">All Doctors</a>
        <a href="">About</a>
        <a href="">Contact</a>
        <a href="../html/userprofile.php"><button class="nav-btn">Profile</button></a>
    </nav>
</header>

<section class="hero">
    <div class="hero-text">
        <h1>Book Appointment<br>With Trusted Doctors</h1>
        <p>Simply browse through our extensive list of trusted doctors and schedule your appointment hassle-free.</p>
        <a href="../html/bookappointment.php"><button>Book appointment</button></a>
    </div>
</section>
<section class="speciality">
    <h2>Find by Speciality</h2>
    <p>Simply browse through our extensive list of trusted doctors.</p>

    <div class="speciality-grid">
        <button class="speciality">General physician</button>
        <button class="speciality">Gynecologist</button>
        <button class="speciality">Dermatologist</button>
        <button class="speciality">Pediatricians</button>
        <button class="speciality">Neurologist</button>
        <button class="speciality">Gastroenterologist</button>
    </div>
</section>

<section class="doctors">
    <h2>Top Doctors to Book</h2>
    <p>Simply browse through our extensive list of trusted doctors.</p>

    <div class="doctor-grid">

        <?php
        $sql = "SELECT * FROM doctors WHERE status='Available'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="doctor-card">
                    <img src="../images/<?php echo $row['photo']; ?>" alt="Doctor Image">
                    <h3><?php echo $row['full_name']; ?></h3>
                    <p><?php echo $row['degree']; ?></p>
                    <p><?php echo $row['specialization']; ?></p>

                    <button class="book-btn">Book Appointment</button>
                </div>
        <?php
            }
        } else {
            echo "<p>No doctors available right now.</p>";
        }
        ?>

    </div>
</section>

<section class="cta">
    <div class="cta-text">
        <h2>Book Appointment<br>With 100+ Trusted Doctors</h2>
        <button>Create account</button>
    </div>
</section>

</body>
</html>

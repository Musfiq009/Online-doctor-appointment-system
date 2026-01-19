<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="../Css/Doctors.css">
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="../Html/Dashboard.php">Dashboard</a></li>
        <li><a href="../Html/Doctors.php" class="active">Doctors</a></li>
        <li><a href="../Html/appointments.php">Appointments</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>

<div class="main-content">

    <div class="header">
        <h1>Doctors Management</h1>
        <p>Add and view doctors</p>
    </div>

    <div class="tab-buttons">
        <button class="tab-btn active" onclick="showTab('addDoctor')">Add Doctor</button>
        <button class="tab-btn" onclick="showTab('viewDoctors')">View All Doctors</button>
    </div>

    <?php if(isset($_SESSION['errors'])): ?>
        <div class="error-msg">
            <?php 
            foreach($_SESSION['errors'] as $err) {
                echo htmlspecialchars($err) . "<br>";
            }
            unset($_SESSION['errors']); 
            ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="success-msg">
            <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <div id="addDoctor" class="tab-content" style="display:block;">
        <div class="form-section">

            <form action="../PHP/Add_doctor.php" method="POST" enctype="multipart/form-data">

                <label>Full Name</label>
                <input type="text" name="full_name" required
                       value="<?= isset($_SESSION['old_values']['full_name']) ? htmlspecialchars($_SESSION['old_values']['full_name']) : '' ?>">

                <label>Degree</label>
                <input type="text" name="degree" required
                       value="<?= isset($_SESSION['old_values']['degree']) ? htmlspecialchars($_SESSION['old_values']['degree']) : '' ?>">

                <label>Email</label>
                <input type="email" name="email" required
                       value="<?= isset($_SESSION['old_values']['email']) ? htmlspecialchars($_SESSION['old_values']['email']) : '' ?>">

                <label>Address</label>
                <textarea name="address" required><?= isset($_SESSION['old_values']['address']) ? htmlspecialchars($_SESSION['old_values']['address']) : '' ?></textarea>

                <label>Phone Number</label>
                <input type="text" name="phone" required
                       value="<?= isset($_SESSION['old_values']['phone']) ? htmlspecialchars($_SESSION['old_values']['phone']) : '' ?>">

                <label>Specialization</label>
                <input type="text" name="specialization" required
                       value="<?= isset($_SESSION['old_values']['specialization']) ? htmlspecialchars($_SESSION['old_values']['specialization']) : '' ?>">

                <label>Category</label>
                <select name="category" required>
                    <option value="">Select Category</option>
                    <option value="Cardiology" <?= (isset($_SESSION['old_values']['category']) && $_SESSION['old_values']['category'] == 'Cardiology') ? 'selected' : '' ?>>Cardiology</option>
                    <option value="Neurology" <?= (isset($_SESSION['old_values']['category']) && $_SESSION['old_values']['category'] == 'Neurology') ? 'selected' : '' ?>>Neurology</option>
                    <option value="Dermatology" <?= (isset($_SESSION['old_values']['category']) && $_SESSION['old_values']['category'] == 'Dermatology') ? 'selected' : '' ?>>Dermatology</option>
                    <option value="Orthopedics" <?= (isset($_SESSION['old_values']['category']) && $_SESSION['old_values']['category'] == 'Orthopedics') ? 'selected' : '' ?>>Orthopedics</option>
                    <option value="General Physician" <?= (isset($_SESSION['old_values']['category']) && $_SESSION['old_values']['category'] == 'General Physician') ? 'selected' : '' ?>>General Physician</option>
                </select>

                <label>Doctor Photo</label>
                <input type="file" name="photo" accept="image/*" required>

                <button type="submit" name="add_doctor" class="btn-add">
                    Add Doctor
                </button>

            </form>
        </div>
    </div>

    <div id="viewDoctors" class="tab-content" style="display:none;">
        <div id="doctorCards">
            <?php include "../PHP/Get_Doctors.php"; ?>
        </div>
    </div>

</div>

<script src="../JS/Doctor_tab.js"></script>

</body>
</html>

<?php unset($_SESSION['old_values']); 

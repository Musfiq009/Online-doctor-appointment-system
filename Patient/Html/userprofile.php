<?php include "../php/userprofile.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/userprofile.css">
</head>
<body>

<header class="navbar">
    <div class="logo">Consultation Time</div>
    <nav>
        <a href="logedinDashboard.php">Dashboard</a>
        <a href="bookappointment.php">Appointments</a>
        <a href="../php/logout.php">Logout</a>
    </nav>
</header>

<div class="profile-container">

    <div class="profile-card">
        <h2><?= $user['full_name']; ?></h2>
        <p><?= ucfirst($user['role']); ?></p>
    </div>

    <form class="profile-details" method="POST" action="../php/update_profile.php">
        <?php if (isset($_SESSION['success_msg'])) { ?>
        <div class="success-msg">
            <p class="s-msg"><?= $_SESSION['success_msg']; ?></p>
        </div>
        <?php unset($_SESSION['success_msg']); } ?>


        <h2>Edit Profile</h2>

        <label>Full Name</label>
        <input type="text" name="full_name" value="<?= $user['full_name']; ?>" required>

        <label>Phone</label>
        <input type="text" name="phone" value="<?= $user['phone']; ?>">

        <label>Gender</label>
        <select name="gender">
            <option value="">Select</option>
            <option value="Male" <?= ($user['gender']=="Male")?"selected":""; ?>>Male</option>
            <option value="Female" <?= ($user['gender']=="Female")?"selected":""; ?>>Female</option>
        </select>

        <label>Age</label>
        <input type="number" name="age" value="<?= $user['age']; ?>">

        <label>Blood Group</label>
        <input type="text" name="blood_group" value="<?= $user['blood_group']; ?>">

        <label>Address</label>
        <textarea name="address"><?= $user['address']; ?></textarea>

        <button type="submit">Save Changes</button>
    </form>

</div>

</body>
</html>

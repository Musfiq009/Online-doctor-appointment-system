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
        <a href="dashboard.php">Dashboard</a>
        <a href="../html/bookappointment.php\">Appointments</a>
        <a href="#">Reports</a>
        <a href="../php/logout.php">Logout</a>
    </nav>
</header>

<div class="profile-container">

    <div class="profile-card">
        <h2><?php echo $user['full_name']; ?></h2>
        <p><?php echo ucfirst($user['role']); ?></p>
    </div>

    <form class="profile-details" method="POST" action="../php/update_profile.php">

        <h2>Edit Profile</h2>

        <label>Full Name</label>
        <input type="text" name="full_name"
               value="<?php echo $user['full_name']; ?>" required>

        <label>Email</label>
        <input type="email"
               value="<?php echo $user['email']; ?>">

        <label>Phone</label>
        <input type="text" name="phone"
               value="<?php echo $user['phone']; ?>">

        <label>Gender</label>
        <select name="gender">
            <option value="">Select</option>
            <option value="Male" <?php if($user['gender']=="Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($user['gender']=="Female") echo "selected"; ?>>Female</option>
        </select>

        <label>Age</label>
        <input type="number" name="age"
               value="<?php echo $user['age']; ?>">

        <label>Blood Group</label>
        <input type="text" name="blood_group"
               value="<?php echo $user['blood_group']; ?>">

        <label>Address</label>
        <textarea name="address"><?php echo $user['address']; ?></textarea>

        <button type="submit">Save Changes</button>

    </form>

</div>

</body>
</html>

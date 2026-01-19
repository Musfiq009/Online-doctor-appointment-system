<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet"href="../Css/registration.css">
</head>
<body>

<div class="register-container">
    <h2>Patient Registration</h2>
    <p class="subtitle">Create your account</p>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "phone_exists") {
            echo "<p class='error' style='color:red;'>This phone number is already registered</p>";
        }
    }
    ?>

    <form method="post" action="../PHP/register.php" enctype="multipart/form-data">
        
        <div class="input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="Enter first name" required>
        </div>

        <div class="input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Enter last name" required>
        </div>

        <div class="input">
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="01XXXXXXXXX" required>
        </div>

        <div class="input">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email" required>
        </div>

        <div class="input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <div class="input">
            <label>Confirm Password</label>
            <input type="password" name="cpassword" placeholder="Confirm password" required>
        </div>

        <button type="submit" class="register-btn">Register</button>
    </form>

    <p>Already registered? <a href="login.php">Login here</a></p>
</div>

</body>
</html>

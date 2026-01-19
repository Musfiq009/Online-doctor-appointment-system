<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Login</title>
    <link rel="stylesheet" href="../Css/login.css">
</head>
<body>

<div class="login-container">
    <h2>Patient Login</h2>
    <p class="subtitle">Access your appointments & reports</p>

    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "empty")
            echo "<p class='error'>All fields are required</p>";
        elseif ($_GET['error'] == "phone")
            echo "<p class='error'>Phone number must be 11 digits</p>";
        elseif ($_GET['error'] == "wrongpass")
            echo "<p class='error'>Incorrect password</p>";
        elseif ($_GET['error'] == "notfound")
            echo "<p class='error'>Phone number not registered</p>";
    }
    ?>

    <form method="post" action="../PHP/login.php">

        <div class="input">
            <label>Phone Number</label>
            <input type="text" name="number" placeholder="01XXXXXXXXX">
        </div>

        <div class="input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">
        </div>

        <button type="submit" class="login-btn">Login</button>

        <div class="links">
            <p>Not registered yet?
                <a href="register.php">Register</a>
            </p>
            <a href="#" class="forgot">Forgot Password?</a>
        </div>

    </form>
</div>

</body>
</html>

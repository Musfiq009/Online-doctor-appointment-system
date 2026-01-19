<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../Css/forgotpassword.css">
</head>
<body>

<div class="box">
    <h2>Forgot Password</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>Phone number is not found</p>";
    }
    if (isset($_GET['success'])) {
        echo "<p class='success'>your Password updated successfully</p>";
    }
    ?>

    <form method="POST" action="../PHP/forgotpassword.php">

        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="01XXXXXXXXX">

        <label>New Password</label>
        <input type="password" name="password">

        <button type="submit">Reset Password</button>
    </form>

    <a href="login.php">Back to Login</a>
</div>

</body>
</html>

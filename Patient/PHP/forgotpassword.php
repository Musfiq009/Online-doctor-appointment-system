<?php
include "../DB/configDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if (empty($phone) || empty($password)) {
        header("Location: ../Html/forgotpassword.php?error=1");
        exit();
    }

    $sql = "SELECT * FROM users WHERE phone='$phone'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $update = "UPDATE users SET password='$hashed' WHERE phone='$phone'";
        mysqli_query($conn, $update);

        header("Location: ../Html/forgotpassword.php?success=1");
        exit();

    } else {
        header("Location: ../Html/forgotpassword.php?error=1");
        exit();
    }
}
?>

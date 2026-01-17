<?php
session_start();
include "../db/configDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $phone = trim($_POST["number"]);
    $password = $_POST["password"];

    if (empty($phone) || empty($password)) {
        header("Location: ../html/login.php?error=empty");
        exit();
    }

    if (!preg_match("/^[0-9]{11}$/", $phone)) {
        header("Location: ../html/login.php?error=phone");
        exit();
    }

    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id']   = $user['user_id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_phone'] = $user['phone'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../html/logedinDashboard.php");
            exit();

        } else {
            header("Location: ../html/login.php?error=wrongpass");
            exit();
        }

    } else {
        header("Location: ../html/login.php?error=notfound");
        exit();
    }
}
?>

<?php
include "../db/configDB.php";

$successMsg = $errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $full_name = $fname . " " . $lname;

    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if(empty($fname) || empty($lname) || empty($phone) || empty($email) || empty($password)) {
        $errorMsg = "All required fields must be filled!";
    }
    elseif($password !== $cpassword) {
        $errorMsg = "Passwords do not match!";
    }
    else {
        $checkPhone = "SELECT user_id FROM users WHERE phone = '$phone'";
        $result = mysqli_query($conn, $checkPhone);

        if(mysqli_num_rows($result) > 0) {
            header("Location: ../html/registration.php?error=phone_exists");
            exit();
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $role = "patient";

            $sql = "INSERT INTO users (role, full_name, email, password, phone)
                    VALUES ('$role', '$full_name', '$email', '$hashedPassword', '$phone')";

            if(mysqli_query($conn, $sql)) {

                $patient_id = mysqli_insert_id($conn);

                $sql2 = "INSERT INTO patient_profiles (patient_id, address, age, gender, blood_group)
                         VALUES ('$patient_id', NULL, NULL, NULL, NULL)";

                if(mysqli_query($conn, $sql2)) {
                    header("Location:../html/login.php?success=registered");
                    exit();
                } else {
                    $errorMsg = "Profile creation failed!";
                }

            } else {
                $errorMsg = "Registration failed! Email or phone may already exist.";
            }
        }
    }
}
?>

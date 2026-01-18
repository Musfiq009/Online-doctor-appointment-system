<?php
session_start();
include "../DB/configDB.php";

if (isset($_POST['add_doctor'])) {

    $full_name = trim($_POST['full_name']);
    $degree = trim($_POST['degree']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $specialization = trim($_POST['specialization']);
    $category = trim($_POST['category']);
    $status = "Available";

    $errors = [];

    // -----------------
    // VALIDATIONS
    // -----------------

    if (empty($full_name) || strlen($full_name) < 3) {
        $errors[] = "Full name must be at least 3 characters long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errors[] = "Phone number must contain 10 to 15 digits.";
    }

    // Check uniqueness
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM doctors WHERE email='$email'")) > 0) {
        $errors[] = "Email already exists. Please use a different email.";
    }
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM doctors WHERE phone='$phone'")) > 0) {
        $errors[] = "Phone number already exists. Please use a different number.";
    }

    // Photo validation
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = pathinfo($photo, PATHINFO_EXTENSION);

        if (!in_array(strtolower($ext), $allowed_extensions)) {
            $errors[] = "Invalid photo format. Only JPG, JPEG, PNG, GIF allowed.";
        } else {
            $photo = time() . "_" . $photo; 
            move_uploaded_file($tmp, "../Images/" . $photo);
        }
    } else {
        $errors[] = "Please upload a photo.";
    }

    // Store old values in session
    $_SESSION['old_values'] = [
        'full_name' => $full_name,
        'degree' => $degree,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'specialization' => $specialization,
        'category' => $category
    ];

    // Insert into DB if no errors
    if (empty($errors)) {
        $sql = "INSERT INTO doctors 
                (full_name, degree, email, address, phone, specialization, category, photo, status) 
                VALUES ('$full_name','$degree','$email','$address','$phone','$specialization','$category','$photo','$status')";

        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['old_values']); // clear old values
            $_SESSION['success'] = "Doctor added successfully!";
            header("Location: ../Html/Doctors.php");
            exit();
        } else {
            $errors[] = "Database error: " . mysqli_error($conn);
        }
    }

    // Store errors in session
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: ../Html/Doctors.php");
        exit();
    }
}
?>

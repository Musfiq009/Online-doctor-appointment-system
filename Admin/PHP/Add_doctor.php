<?php
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

    // Full name validation
    if (empty($full_name) || strlen($full_name) < 3) {
        $errors[] = "Full name must be at least 3 characters long.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Phone number validation
    if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errors[] = "Phone number must contain 10 to 15 digits.";
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

    if (empty($errors)) {

        $sql = "INSERT INTO doctors 
                (full_name, degree, email, address, phone, specialization, category, photo, status) 
                VALUES ('$full_name','$degree','$email','$address','$phone','$specialization','$category','$photo','$status')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../Html/Doctors.php?success=1");
            exit();
        } else {
            $errors[] = "Database error: " . mysqli_error($conn);
        }
    }

    if (!empty($errors)) {
        $error_str = urlencode(implode(", ", $errors));
        header("Location: ../Html/Doctors.php?error=$error_str");
        exit();
    }
}
?>

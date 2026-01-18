<?php
include "../DB/configDB.php";

if (isset($_POST['add_doctor'])) {

    $full_name = $_POST['full_name'];
    $degree = $_POST['degree'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $specialization = $_POST['specialization'];
    $category = $_POST['category'];
    $status = "Available";

    // Photo upload
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($tmp, "../Images/" . $photo);

    $sql = "INSERT INTO doctors 
            (full_name, degree, email, address, phone, specialization, category, photo, status)
            VALUES ('$full_name','$degree','$email','$address','$phone','$specialization','$category','$photo','$status')";

    mysqli_query($conn, $sql);

    header("Location: ../Html/Doctors.php?success=1");
}
?>



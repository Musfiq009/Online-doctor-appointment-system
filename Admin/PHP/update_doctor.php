<?php
include "../DB/configDB.php";

if (isset($_POST['update_doctor'])) {

    $id = $_POST['doctor_id'];
    $full_name = $_POST['full_name'];
    $degree = $_POST['degree'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $specialization = $_POST['specialization'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    if (!empty($_FILES['photo']['name'])) {

        $photo = time() . "_" . $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp, "../Images/" . $photo);

        $sql = "UPDATE doctors SET
            full_name='$full_name',
            degree='$degree',
            email='$email',
            address='$address',
            phone='$phone',
            specialization='$specialization',
            category='$category',
            status='$status',
            photo='$photo'
            WHERE doctor_id=$id";

    } else {

        $sql = "UPDATE doctors SET
            full_name='$full_name',
            degree='$degree',
            email='$email',
            address='$address',
            phone='$phone',
            specialization='$specialization',
            category='$category',
            status='$status'
            WHERE doctor_id=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: ../Html/edit_doctor.php?id=$id&success=1");
    } else {
        echo "Update failed!";
    }
}
?>

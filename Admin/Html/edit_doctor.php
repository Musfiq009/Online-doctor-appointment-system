<?php
include "Fetch_doctor.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="edit_Doctors.css">
</head>
<body>

<div class="main-content">

    <div class="header">
        <h1>Edit Doctor</h1>
        <p>Update doctor information</p>
    </div>

        <div class="edit-container">

        <div class="edit form-section">
            <form method="POST" action="update_doctor.php" enctype="multipart/form-data">

                <input type="hidden" name="doctor_id" value="<?= $doctor['doctor_id']; ?>">

                <label>Full Name</label>
                <input type="text" name="full_name" value="<?= $doctor['full_name']; ?>" required>

                <label>Degree</label>
                <input type="text" name="degree" value="<?= $doctor['degree']; ?>" required>

                <label>Email</label>
                <input type="email" name="email" value="<?= $doctor['email']; ?>" required>

                <label>Address</label>
                <textarea name="address" required><?= $doctor['address']; ?></textarea>

                <label>Phone</label>
                <input type="text" name="phone" value="<?= $doctor['phone']; ?>" required>

                <label>Specialization</label>
                <input type="text" name="specialization" value="<?= $doctor['specialization']; ?>" required>

                <label>Category</label>
                <select name="category" required>
                    <option selected><?= $doctor['category']; ?></option>
                    <option>Cardiology</option>
                    <option>Neurology</option>
                    <option>Dermatology</option>
                    <option>Orthopedics</option>
                    <option>General Physician</option>
                </select>

                <label>Status</label>
                <select name="status" required>
                    <option value="Available" <?= $doctor['status']=="Available"?"selected":""; ?>>Available</option>
                    <option value="Unavailable" <?= $doctor['status']=="Unavailable"?"selected":""; ?>>Unavailable</option>
                </select>

                <label>Change Photo</label>
                <input type="file" name="photo">

                <button type="submit" name="update_doctor" class="btn-add">
                    Update Doctor
                </button>

            </form>
    </div>
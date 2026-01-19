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
    <div class="doctor-preview">
        <h3>Photo</h3>
        <img src="../Images/<?= $doctor['photo']; ?>" alt="Doctor Photo">
    </div>
</div>
<div class="header">
        <h2>Appointment History</h2>
    </div>

    <?php
        $doctor_id = $doctor['doctor_id'];
        include "get_doctor_appointments.php";
    ?>

    <table class="appointment-table">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($appointmentResult) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($appointmentResult)) { ?>
                <tr>
                    <td><?= $row['patient_name']; ?></td>
                    <td><?= $row['appointment_date']; ?></td>
                    <td><?= $row['appointment_time'] ?? '-'; ?></td>
                    <td><?= $row['consultation_type']; ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4">No appointments found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="form-section">

        <h2>Doctor Ratings & Reviews</h2>

        <?php
            $doctor_id = $doctor['doctor_id'];
            include "get_doctor_ratings.php";
        ?>

        <h4>
            Overall Rating:
            <?php
            if ($avg_data['total_reviews'] > 0) {
                echo $avg_data['avg_rating'] . " / 5 ";
                echo "(" . $avg_data['total_reviews'] . " reviews)";
            } else {
                echo "No ratings yet";
            }
            ?>
        </h4>

        <hr>

        <?php if (mysqli_num_rows($reviews) > 0) { ?>
            <?php while ($r = mysqli_fetch_assoc($reviews)) { ?>
                <div class="review">
                    <strong><?= $r['patient_name']; ?></strong>
                    <span class="rating"><?= $r['rating']; ?>/5</span>
                    <p><?= nl2br($r['comment']); ?></p>
                    <small><?= date("d M Y", strtotime($r['created_at'])); ?></small>
                </div>
                <hr>
            <?php } ?>
        <?php } else { ?>
            <p>No patient reviews available.</p>
        <?php } ?>

    </div>

</div>

</body>
</html>

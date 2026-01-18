<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="">
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#" class="active">Doctors</a></li>
        <li><a href="#">Appointments</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>

<div class="main-content">

    <div class="header">
        <h1>Doctors Management</h1>
        <p>Add and view doctors</p>
    </div>

    <div class="tab-buttons">
        <button class="tab-btn ">Add Doctor</button>
        <button class="tab-btn">View All Doctors</button>
    </div>

    <div id="addDoctor" class="tab-content">
        <div class="form-section">

            <form action="Add_doctor.php" method="POST" enctype="multipart/form-data">

                <label>Full Name</label>
                <input type="text" name="full_name" required>

                <label>Degree</label>
                <input type="text" name="degree" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Address</label>
                <textarea name="address" required></textarea>

                <label>Phone Number</label>
                <input type="text" name="phone" required>

                <label>Specialization</label>
                <input type="text" name="specialization" required>

                <label>Category</label>
                <select name="category" required>
                    <option value="">Select Category</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="General Physician">General Physician</option>
                </select>

                <label>Doctor Photo</label>
                <input type="file" name="photo" accept="image/*" required>

                <button type="submit" name="add_doctor" class="btn-add">
                    Add Doctor
                </button>

            </form>
        </div>
    </div>

</div>

</body>
</html>

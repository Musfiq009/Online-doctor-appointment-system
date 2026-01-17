<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../css/bookappointment.css">
</head>
<body>

<header class="navbar">
    <div class="logo">Consultation Time</div>
    <nav>
        <a href="../html/logedinDashboard.php">Home</a>
        <a href="../html/bookappointment.php">All Doctors</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="../html/userprofile.php"><button>Profile</button></a>
    </nav>
</header>

<div class="page-title">
    <h1>Book Appointment</h1>
    <p>Select your preferred doctor</p>
</div>

<div class="search-bar">
    <input type="text" id="searchInput"
           placeholder="Search by name / specialization / category">
    <button onclick="withAjax()">Search</button>
</div>

<div id="doctorResult" class="doctor-grid">
    <p style="text-align:center;">Loading doctors...</p>
</div>

<script src="../js/search.js"></script>

<script>
    window.onload = function () {
        withAjax(); 
    };
</script>


</body>
</html>

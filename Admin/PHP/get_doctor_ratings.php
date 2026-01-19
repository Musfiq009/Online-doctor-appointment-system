<?php
include "../DB/configDB.php";

$avg_sql = "
    SELECT ROUND(AVG(rating), 1) AS avg_rating, COUNT(*) AS total_reviews
    FROM doctor_ratings
    WHERE doctor_id = $doctor_id
";
$avg_result = mysqli_query($conn, $avg_sql);
$avg_data = mysqli_fetch_assoc($avg_result);
?>
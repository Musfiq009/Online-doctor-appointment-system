<?php
include "../DB/configDB.php";

$avg_sql = "
    SELECT ROUND(AVG(rating), 1) AS avg_rating, COUNT(*) AS total_reviews
    FROM doctor_ratings
    WHERE doctor_id = $doctor_id
";
$avg_result = mysqli_query($conn, $avg_sql);
$avg_data = mysqli_fetch_assoc($avg_result);
$review_sql = "
    SELECT 
    dr.rating,
    dr.comment,
    dr.created_at,
    u.full_name AS patient_name
    FROM doctor_ratings dr
    JOIN users u ON dr.patient_id = u.user_id
    WHERE dr.doctor_id = $doctor_id
    ORDER BY dr.created_at DESC
";
$reviews = mysqli_query($conn, $review_sql);
?>
<?php
$host="localhost";
$user="root";
$pass="";
$dbname="online doctor appointmentment and diagnostic system";
 
$conn = new mysqli($host,$user,$pass,$dbname);
 
if($conn->connect_error)
{
    die("Connect lost". $conn->connect_error);        
}
 
 
 
?>
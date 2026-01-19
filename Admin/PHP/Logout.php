<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_phone']);
unset($_SESSION['role']);

session_destroy();

header("Location: ../../Patient/Html/login.php");
exit();
?>

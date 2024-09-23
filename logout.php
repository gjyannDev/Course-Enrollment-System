<?php
include 'connect_db.php';

session_unset();
session_destroy();

header('location: student_login.php');

?>
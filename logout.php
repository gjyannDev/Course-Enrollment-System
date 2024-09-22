<?php
include 'connect_db.php';

session_unset();
session_destroy();

header('location: studentLogin.php');

?>
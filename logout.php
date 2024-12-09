<?php
include 'connect_db.php';

session_destroy();
session_unset();

header('location: index.php');

?>
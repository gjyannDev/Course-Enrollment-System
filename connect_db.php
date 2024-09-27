<?php
$localhost = "localhost:8111";
$user = "root";
$pass = "";

$connection = mysqli_connect($localhost, $user, $pass);

if ( !$connection ) {
  die('Could not connect' . mysqli_error());
}

//Create database
$creating = mysqli_query( $connection, 'CREATE DATABASE IF NOT EXISTS school_db');

//Select Database
$selectDb = mysqli_select_db($connection, 'school_db');
?>
<?php

$localhost = "localhost:8111";
$user = "root";
$pass = "";

$connection = mysqli_connect($localhost, $user, $pass);

if ( !$connection ) {
  die('Could not connect' . mysqli_error());
}

//!Create Modal Window for User to say like ghian connected successfully
// echo 'Connected Successfully';

//Create database
$creating = mysqli_query( $connection, 'CREATE DATABASE IF NOT EXISTS school_db');

//check if the database is connected
// if ( !$creating ) {
//   die(' <br> Could not create database: ' . mysqli_error($connection) . ' <br> ');

// } else {
//   echo "Database school_db created successfully <br>";
// }


//Select Database
$selectDb = mysqli_select_db($connection, 'school_db');

// if ( $selectDb ) {
//   echo "Database 'school_db' selected successfully.<br>";

// } else {
//   die("Error selecting database: " . mysqli_error($connection));
// }

?>
<?php
  include "connect_db.php";
  $id = $_GET["id"];

  $queries = [
    "DELETE FROM `class_x_tbl` WHERE student_id = $id",
    "DELETE FROM `class_xii_tbl` WHERE student_id = $id",
    "DELETE FROM `graduation_tbl` WHERE student_id = $id",
    "DELETE FROM `masters_tbl` WHERE student_id = $id",
    "DELETE FROM `qual_tbl` WHERE student_id = $id",
    "DELETE FROM `reg_tbl` WHERE student_id = $id" // Parent table last
  ];

  // Execute each query and check for errors
  $errors = [];
  foreach ($queries as $query) {
    if (!mysqli_query($connection, $query)) {
        $errors[] = mysqli_error($connection);
    } else {
      header("Location: display_student_info.php");
    }
  }

  // Delete a specific student
  $id = $_GET['id'];
  $sql = "DELETE FROM reg_tbl WHERE student_id = $id";

  if (mysqli_query($connection, $sql)) {
    // Reset AUTO_INCREMENT
    $resetAutoIncrement = "ALTER TABLE reg_tbl AUTO_INCREMENT = 1";
    if (mysqli_query($connection, $resetAutoIncrement)) {
        echo "Student deleted and AUTO_INCREMENT reset successfully.";
    } else {
        echo "Error resetting AUTO_INCREMENT: " . mysqli_error($connection);
    }
  } else {
    echo "Error deleting student: " . mysqli_error($connection);
  }


?>
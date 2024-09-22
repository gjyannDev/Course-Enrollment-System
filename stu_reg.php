<?php
include 'connect_db.php';

$sqlStudent = "CREATE TABLE IF NOT EXISTS student_tbl (
  student_num INT NOT NULL AUTO_INCREMENT,
  student_name VARCHAR(30),
  birthdate DATE,
  course VARCHAR(30),
  email VARCHAR(50),
  PRIMARY KEY (student_num)
)";

mysqli_query($connection, $sqlStudent);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = $_POST['student_name'];
    $birthdate = $_POST['birthdate'];
    $course = $_POST['course'];
    $email = $_POST['email'];

    $insertStudent = "INSERT INTO student_tbl (student_name, birthdate, course, email) 
                      VALUES ('$student_name', '$birthdate', '$course', '$email')";

    if (mysqli_query($connection, $insertStudent)) {
        echo "Student added successfully.<br>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

?>
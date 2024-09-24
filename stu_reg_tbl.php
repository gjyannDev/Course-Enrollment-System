<?php
include 'connect_db.php';
include 'header.php';

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
        echo <<<HTML
        <div class= 'card__main__container'>
          <div class = "card_sub_container" >
            <div class="card">
              <div class="img_container">
                <img src="assets/images/image_used/check-circle.svg" alt="" id="cookieSvg">
              </div>
              <h2 class="cookieHeading">student_tbl Created Successfully</h2>
              <h1 class="cookieHeading">Data Saved Successfully</h1>
              <p class="cookieDescription"> 
              Your data is now stored in the student_tbl table
              </p>
              <button class = "primary__btn__solid">
                <a href = "user_home_page.php" class = "secondary_bg_txt">Home</a>
              </button>
            </div>
          </div>
        </div>
        HTML;
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/components/mwdatasaved.css">
</head>
<body>
    
</body>
</html>
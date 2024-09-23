<?php
include 'connect_db.php';

//create table for user_tbl
$sql = "CREATE TABLE IF NOT EXISTS user_tbl(
  email VARCHAR(50) PRIMARY KEY,
  user_name VARCHAR(30) NOT NULL,
  user_password VARCHAR(30) NOT NULL,
  user_type VARCHAR(30) NOT NULL
)";

$createTable = mysqli_query($connection, $sql);

//!Temporary checker
if ( $createTable ) {
  //!fixed and put it in the middle
  // echo '<div class= "main__container">';
  // echo '<div class="card">';
  // echo '<img src="assets/images/image_used/check-circle.svg" alt="" id="cookieSvg">';
  // echo '<h1 class="cookieHeading">Items Added Successfully</h1>';
  // echo '<p class="cookieDescription">Your inputted values will now be stored in the database.';
  // echo  '</div>';
  // echo  '</div>';
} else {
  echo "Error creating table: " . mysqli_error($connection);
}

//!create a modal window for table successfully created

$emails = ['2022-102785@rtu.edu.ph', '2022-102657@rtu.edu.ph','2022-108621@rtu.edu.ph',
            '2022-103011@rtu.edu.ph','2022-102787@rtu.edu.ph','2022-103220@rtu.edu.ph'];
$emailList = implode("','", $emails);
$checkSql = "SELECT * FROM user_tbl WHERE email IN ('$emailList')";
$resultCheckUser = $connection->query($checkSql);

//Insert user that can only access the page
if (mysqli_num_rows($resultCheckUser) == 0) {
  $user_tbl_insert = "INSERT INTO user_tbl (email, user_name, user_password, user_type) 
                      VALUES ('2022-102785@rtu.edu.ph', 'Francis', 'kupal123', 'user'),
                            ('2022-102657@rtu.edu.ph', 'Castañeda', 'cas123', 'user'),
                            ('2022-108621@rtu.edu.ph', 'Vinluan', 'des123', 'user'),
                            ('2022-103011@rtu.edu.ph', 'Misagal', 'gar123', 'user'),
                            ('2022-102787@rtu.edu.ph', 'Ansog', 'arjay123', 'user'),
                            ('2022-103220@rtu.edu.ph', 'Santillan', 'kuz123', 'user')";

  $insertValue = mysqli_query($connection, $user_tbl_insert);
}

// if ( $insertValue ) {
//   echo 'Insert successfull';

// } else {
//   echo "Error inserting value: " . mysqli_error($connection);
// }
?>
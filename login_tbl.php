<?php
include 'connect_db.php';

// Check if the table exists
$checkTableSql = "SHOW TABLES LIKE 'user_tbl'";
$result = mysqli_query($connection, $checkTableSql);

if (mysqli_num_rows($result) == 0) {
    
    $sql = "CREATE TABLE IF NOT EXISTS user_tbl(
      email VARCHAR(50) PRIMARY KEY,
      user_name VARCHAR(30) NOT NULL,
      user_password VARCHAR(30) NOT NULL,
      user_type VARCHAR(30) NOT NULL,
      user_image VARCHAR(255)
    )";

    $createTable = mysqli_query($connection, $sql);

    if (!$createTable) {
      echo "Error creating table: " . mysqli_error($connection);
    }
}

$emails = ['2022-102785@rtu.edu.ph', '2022-102657@rtu.edu.ph','2022-108621@rtu.edu.ph',
            '2022-103011@rtu.edu.ph','2022-102787@rtu.edu.ph','2022-103220@rtu.edu.ph'];
$emailList = implode("','", $emails);
$checkSql = "SELECT * FROM user_tbl WHERE email IN ('$emailList')";
$resultCheckUser = $connection->query($checkSql);

//Insert user that can only access the page
if (mysqli_num_rows($resultCheckUser) == 0) {
  $user_tbl_insert = "INSERT INTO user_tbl (email, user_name, user_password, user_type, user_image) 
                      VALUES ('2022-102785@rtu.edu.ph', 'Francis', 'ghian123', 'admin', 'assets/images/image_used/ghian.jpg'),
                            ('2022-102657@rtu.edu.ph', 'Castañeda', 'cas123', 'user', 'assets/images/image_used/john.png'),
                            ('2022-108621@rtu.edu.ph', 'Vinluan', 'des123', 'user', 'assets/images/image_used/des.png'),
                            ('2022-103011@rtu.edu.ph', 'Misagal', 'gar123', 'user', 'assets/images/image_used/edgar.png'),
                            ('2022-102787@rtu.edu.ph', 'Ansog', 'arjay123', 'user', 'assets/images/image_used/jay.png'),
                            ('2022-103220@rtu.edu.ph', 'Santillan', 'kuz123', 'user', 'assets/images/image_used/kuz.png')";

  $insertValue = mysqli_query($connection, $user_tbl_insert);
}
?>

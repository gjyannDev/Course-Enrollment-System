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
      user_type VARCHAR(30) NOT NULL
    )";

    $createTable = mysqli_query($connection, $sql);

    if ($createTable) {
        echo <<<HTML
        <div class= 'card__main__container'>
          <div class = "card_sub_container" >
            <div class="card">
              <button type='button' class='dismiss' onclick="submit();">
                <img src='assets/images/icon/x.svg'>
              </button>
              <div class="img_container">
                <img src="assets/images/image_used/check-circle.svg" alt="" id="cookieSvg">
              </div>
              <h1 class="cookieHeading">user_tbl Created Successfully</h1>
              <p class="cookieDescription"> 
                user_tbl is now created; you can now use the user for login
              </p>
            </div>
          </div>
        </div>
        HTML;
    } else {
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
  $user_tbl_insert = "INSERT INTO user_tbl (email, user_name, user_password, user_type) 
                      VALUES ('2022-102785@rtu.edu.ph', 'Francis', 'ghian123', 'admin'),
                            ('2022-102657@rtu.edu.ph', 'Castañeda', 'cas123', 'user'),
                            ('2022-108621@rtu.edu.ph', 'Vinluan', 'des123', 'user'),
                            ('2022-103011@rtu.edu.ph', 'Misagal', 'gar123', 'user'),
                            ('2022-102787@rtu.edu.ph', 'Ansog', 'arjay123', 'user'),
                            ('2022-103220@rtu.edu.ph', 'Santillan', 'kuz123', 'user')";

  $insertValue = mysqli_query($connection, $user_tbl_insert);
}
?>

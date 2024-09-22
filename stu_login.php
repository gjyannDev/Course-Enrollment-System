<?php
include 'connect_db.php';

//Start the session
session_start();

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
  echo "Table 'user_tbl' created successfully <br>";

} else {
  echo "Error creating table: " . mysqli_error($connection);
}

//!create a modal window for table successfully created

//Insert user that can only access the page
$user_tbl_insert = "INSERT INTO user_tbl (email, user_name, user_password, user_type) 
  SELECT 'markghian236@gmail.com', 'Ghian', 'ghian_pogi123', 'user'  FROM DUAL 
  WHERE NOT EXISTS (SELECT * FROM user_tbl 
        WHERE email = 'markghian236@gmail.com' AND user_name ='Ghian' AND user_password = 'ghian_pogi123' AND user_type = 'user' LIMIT 1);";

$user_tbl_insert = "INSERT INTO user_tbl (email, user_name, user_password, user_type) 
  SELECT 'johnLloyd236@gmail.com', 'Castaneda', 'johnlloyd123', 'user'  FROM DUAL 
  WHERE NOT EXISTS (SELECT * FROM user_tbl 
        WHERE email = 'johnLloyd236@gmail.com' AND user_name ='Castaneda' AND user_password = 'johnlloyd123' AND user_type = 'user' LIMIT 1);";

$insertValue = mysqli_query($connection, $user_tbl_insert);

if ( $insertValue ) {
  echo 'Insert successfull';

} else {
  echo "Error inserting value: " . mysqli_error($connection);
}

//Declare variables
$email = mysqli_real_escape_string($connection, $_POST['email']);;
$stuPass = md5($_POST['userPass']);

$select = " SELECT * FROM user_tbl WHERE email = '$email' && password = '$stuPass' ";

$result = mysqli_query($conn, $select);

if( mysqli_num_rows($result) > 0 ){

  $row = mysqli_fetch_array($result);

  // if($row['user_type'] == 'admin'){

  //    $_SESSION['admin_name'] = $row['name'];
  //    header('location:admin_page.php');

  // }

  if($row['user_type'] == 'user'){

     $_SESSION['user_name'] = $row['userName'];
     header('location:studentRegistration.php');
  }
 
}else{

  $error[] = 'incorrect email or password!';
}

?>
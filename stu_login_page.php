<?php
include 'login_tbl.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $user_password  = $_POST['user_password'];

  $select  = "SELECT * FROM user_tbl WHERE email = '$email' AND user_password = '$user_password'";

  $result  = mysqli_query($connection, $select ) or die('query failed');

  if ( mysqli_num_rows($result ) > 0 ) {

    $row = mysqli_fetch_assoc($result );

    if($row['user_type'] == 'admin'){

      $_SESSION['admin_name'] = $row['user_name'];
      $_SESSION['admin_image'] = $row['user_image'];
      $_SESSION['user_type'] =  $row['user_type'];
      header('location: admin_page.php');

   } elseif($row['user_type'] == 'user'){

      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['user_image'] = $row['user_image'];
      $_SESSION['user_type'] = $row['user_type'];
      header('location: user_home_page.php');
   } 

  } else {
    $error[] = 'incorrect email or password';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <!-- links -->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/modernize.css">
  <link rel="stylesheet" href="styles/utility.css">
  <link rel="stylesheet" href="styles/components/studentLogin.css">
  <link rel="stylesheet" href="styles/components/mwlogin.css">
  <script src = "js/main.js" defer></script>
</head>
<body>
  <main class = "main__container">
    <section class = "">
      <div class="content__container">
        <div class="img__container">
          <img 
            src = "assets/images/image_used/login_img.png" 
            alt = ""
            class = ""
          >
        </div>
        <div class="form__main__container">
          <div class="logo__container">
            <a href="index.php">
              <img 
                src = "assets/images/icon/logo_img2.png" 
                alt = ""
                class = "logo__img"
              >
            </a>
          </div>
           <div class="login__text__content">
              <h1>
                Student Login
              </h1>
              <p>
                Hey enter your account to log in into your account
              </p>
           </div>
           <!-- error message -->
           <?php
            if( isset($error) ){
              foreach( $error as $error ){
                  echo '<div class = "error-msg">' . $error. '</div>';
              };
            };
           ?>
           <form action = " " method = "POST">
              <div class="input__container">
                <div class="input__group">
                    <label class="label">Email</label>
                    <input type="email" name="email" class="input" required>
                </div>
                <div class="input__group">
                    <label class="label">Password</label>
                    <input type="password" name="user_password" class="input" required>
                </div>
                <button type="submit" class="primary__btn__solid2">Login</button>
              </div>
           </form>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
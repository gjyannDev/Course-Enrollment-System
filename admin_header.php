<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/modernize.css">
  <link rel="stylesheet" href="styles/utility.css">
  <link rel="stylesheet" href="styles/components/header.css">
</head>
<body>
  <header class = "header__container">
    <div class="sub__container container">
      <div class="left__content">
        <a href="user_home_page.php">
          <img 
            src = "assets/images/icon/logo.png" 
            alt = "logo of the FU"
            class = "logo__img"
          >
        </a>
      </div>
      <div class="right__content">
        <nav class = "header">
          <ul class = "nav__links">
            <li class = "">
              <div class="profile__container">
                <img src="<?php echo $_SESSION['admin_image'] ?>" alt="user image" class="avatar__img">
                <span><?php echo $_SESSION['admin_name'] ?></span>
              </div>
            </li>
            <li class = "" >
              <a href = "stu_registration_page.php">
                Add Account
              </a>
            </li>
            <li class = "" >
              <a href = "stu_display_info.php">
                Display Students Info
              </a>
            </li>
            <li class = "" >
              <a href = "logout.php">
                Logout
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
</body>
</html>
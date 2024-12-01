<?php
  include 'header.php';
  include 'connect_db.php';

  session_start();

  if(!isset($_SESSION['user_name'])){
      header('location:stu_login_page.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <!-- links -->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/modernize.css">
  <link rel="stylesheet" href="styles/utility.css">
  <link rel="stylesheet" href="styles/components/studentRegistration.css">
  <link rel="stylesheet" href="styles/components/mwregister.css">
  <!-- script -->
  <script src = "js/main.js" defer></script>
</head>
<body>
  <main class = "main__container">
    <section class = "registration__container margin__input">
      <div class="title__container">
        <h1>
          Student Registration
        </h1>
      </div>
      <div class="input__form__container">
        <form action="" method="POST" class="form__container">
          <div class="multi__input">
            <div class="input__group">
              <label class="label">First Name</label>
              <input type="text" name="f_name" class="input multi__input__size" required>
            </div>
            <div class="input__group">
              <label class="label">Last Name</label>
              <input type="text" name="l_name" class="input multi__input__size" required>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- <section class="qualification__container">
      <div class="title__container">
        <h1>
          Student Registration
        </h1>
      </div>
    </section> -->
  </main>
</body>
</html>
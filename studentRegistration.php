<?php
  include 'header.php';
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
        <form action="" method = "POST">
          <div class="input__container">
            <div class="input__group">
                <label class="label">Student Name</label>
                <input type="text" name="text" class="input" pattern="\d+">
            </div>
            <div class="input__group">
                <label class="label">Student No.</label>
                <input type="password" name="text" class="input" pattern="\d+">
            </div>
            <div class="input__group">
                <label class="label">Birthdate</label>
                <input type="date" name="text" class="input" pattern="\d+">
            </div>
            <div class="input__group">
                <label class="label">Course</label>
                <input type="text" name="text" class="input" pattern="\d+">
            </div>
            <div class="input__group">
                <label class="label">Email</label>
                <input type="text" name="text" class="input" pattern="\d+">
            </div>
            <button type="submit" class="primary__btn__solid2">Register</button>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
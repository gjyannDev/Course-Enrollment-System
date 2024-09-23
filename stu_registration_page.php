<?php
  include 'header.php';
  include 'connect_db.php';

  session_start();

  if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
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
</head>
<body>
  <main class = "main__container">
    <section class = "registration__container margin__input">
      <div class="title__container">
        <h1><span><?php echo $_SESSION['user_name'] ?></span> Connected Successfully</h1>
        <h1>
          Student Registration
        </h1>
      </div>
      <div class="input__form__container">
        <form action="stu_reg_tbl.php" method = "POST">
          <div class="input__container">
            <div class="input__group">
                <label class="label">Student Name</label>
                <input type="text" name="student_name" class="input">
            </div>            <div class="input__group">
                <label class="label">Birthdate</label>
                <input type="date" name="birthdate" class="input">
            </div>
            <div class="input__group">
              <label class="label">Course</label>
                <select class="input" name="course" required>
                  <option value="">-- Select Course --</option>
                  <option value="BS Civil Engineering">BS Civil Engineering</option>
                  <option value="BS Mechanical Engineering">BS Mechanical Engineering</option>
                  <option value="BS Electrical Engineering">BS Electrical Engineering</option>
                  <option value="BS Electronics Engineering">BS Electronics Engineering</option>
                  <option value="BS Computer Engineering">BS Computer Engineering</option>
                  <option value="BS Industrial Engineering">BS Industrial Engineering</option>
                  <option value="BS Mechatronics Engineering">BS Mechatronics Engineering</option>
                  <option value="BS Architecture">BS Architecture</option>
                  <option value="BS Information Technology">BS Information Technology</option>
                  <option value="BS Accountancy">BS Accountancy</option>
                  <option value="BS Entrepreneurship">BS Entrepreneurship</option>
                  <option value="BS Business Administration">BS Business Administration</option>
                  <option value="BS Office Administration">BS Office Administration</option>
                  <option value="BS Psychology">BS Psychology</option>
                  <option value="BS Astronomy">BS Astronomy</option>
                  <option value="BS Statistics">BS Statistics</option>
                  <option value="BS Biology">BS Biology</option>
                  <option value="BS Political Science">BS Political Science</option>
                  <option value="BS Education">BS Education</option>
                  <option value="BS Technical Vocational">BS Technical Vocational</option>
                  <option value="BS Physical Education">BS Physical Education</option>
              </select>
            </div>
            <div class="input__group">
                <label class="label">Email</label>
                <input type="text" name="email" class="input">
            </div>
            <button type="submit" class="primary__btn__solid2">Register</button>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
<?php
include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <!-- links -->
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/modernize.css">
  <link rel="stylesheet" href="styles/utility.css">
  <link rel="stylesheet" href="styles/components/userHomePage.css">
</head>
<body>
  <main>
    <section class = "hero__sectionUP hero__section__margin">
      <div class = "hero__subUP">
        <div class="hero__text__content">
          <h1>Course Enrollment - FU</h1>
          <p>The Official Course Enrollment System of the Francisco University</p>
          <button class = "primary__btn__solid ">
            <a href="" class = "secondary_bg_txt">
              Enroll Course
            </a>
          </button>
        </div>
      </div>
    </section>
    <section class = "actions">
      <div class="enrolled__course action__card">
        <img src="assets/images/icon/bxs-book-content.svg" alt="book content icon">
        <h2>Enolled Course</h2>
      </div>
      <div class="enrolled__course action__card">
        <img src="assets/images/icon/bxs-book-open.svg" alt="open book icon">
        <h2>Courses</h2>
      </div>
      <div class="enrolled__course action__card">
        <img src="assets/images/icon/bxs-book.svg" alt="book icon">
        <h2>Programs</h2>
      </div>
    </section>
    <footer class = "footer__contaierUP container">
      <div class="footer__text__content">
        <p>© 2024 Francisco University. All rights reserved.</p>
        <p>Terms and Conditions</p>
        <p>Privacy Policy</p>
      </div>
    </footer>
  </main>
</body>
</html>
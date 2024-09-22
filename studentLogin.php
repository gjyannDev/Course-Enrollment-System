<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/modernize.css">
  <link rel="stylesheet" href="styles/utility.css">
  <link rel="stylesheet" href="styles/components/studentLogin.css">
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
            <img 
              src = "assets/images/icon/logo_img2.png" 
              alt = ""
              class = "logo__img"
            >
          </div>
          <!-- <div class = "toggle__container"></div> -->
           <div class="login__text__content">
              <h1>
                Student Login
              </h1>
              <p>
                Hey enter your account to log in into your account
              </p>
           </div>
           <form action="stu_login.php" method = "POST">
              <div class="input__container">
                <div class="input__group">
                    <label class="label">Email</label>
                    <input type="text" name="email" class="input" pattern="\d+">
                </div>
                <div class="input__group">
                    <label class="label">Password</label>
                    <input type="password" name="userPass" class="input" pattern="\d+">
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
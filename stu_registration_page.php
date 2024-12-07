<?php
  include 'header.php';
  include 'connect_db.php';
  include 'reg_tbl.php';
  include 'qualification_tbl.php';
  include 'insert.php';

  // if(!isset($_SESSION['user_name'])){
  //     header('location:stu_login_page.php');
  // } 
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
  <!-- script -->
  <script src = "js/main.js" defer></script>
</head>
<body>
  <main class = "main__container">
    <section class = "registration__container margin__input" style="display: block;">
      <div class="input__form__container">
        <form action="" method="POST" class="form__container" id="form1">
          <section class="register__main">
            <div class="title__container">
              <h1>
                Student Registration
              </h1>
            </div>
            <div class="input__container">  
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
              <div class="input__group">
                  <label class="label">Date of Birth</label>
                  <input type="date" name="bday" class="input single__input" required>
              </div>
              <div class="input__group">
                  <label class="label">Email ID</label>
                  <input type="email" name="email" class="input single__input" required>
              </div>
              <div class="multi__input">
                <div class="input__group">
                  <label class="label">Mobile Number</label>
                  <input type="tel" name="mobile_num" class="input multi__input__size" required>
                </div>
                <div class="input__group">
                  <label class="label">Gender</label>
                  <select class="input multi__input__size" name="gender" id="gender" required>
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="input__group">
                  <label class="label">Address</label>
                  <input type="text" name="h_address" class="input single__input" required>
              </div>
              <div class="multi__input">
                <div class="input__group">
                  <label class="label">City</label>
                  <input type="text" name="city" class="input multi__input__size" required>
                </div>
                <div class="input__group">
                  <label class="label">State</label>
                  <select class="input multi__input__size" name="r_state" id="state" required>
                    <option value="">Select Region</option>
                    <option value="NCR">NCR</option>
                    <option value="CAR">CAR</option>
                    <option value="Region I">Region I</option>
                    <option value="Region II">Region II</option>
                    <option value="Region III">Region III</option>
                    <option value="Region IV-A">Region IV-A</option>
                    <option value="Region IV-B">Region IV-B</option>
                    <option value="Region V">Region V</option>
                    <option value="Region VI">Region VI</option>
                    <option value="Region VII">Region VII</option>
                    <option value="Region VIII">Region VIII</option>
                    <option value="Region IX">Region IX</option>
                    <option value="Region X">Region X</option>
                    <option value="Region XI">Region XI</option>
                    <option value="Region XII">Region XII</option>
                    <option value="Region XIII">Region XIII</option>
                    <option value="BARMM">BARMM</option>
                  </select>
                </div>
              </div>
              <div class="multi__input">
                <div class="input__group">
                    <label class="label">Country</label>
                    <select class="input multi__input__size" name="country" id="country" required> 
                      <option value="">Country</option> 
                      <option value="Philippines">Philippines</option>
                      <option value="United States">United States</option>
                      <option value="Canada">Canada</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="Australia">Australia</option>
                      <option value="Germany">Germany</option>
                      <option value="France">France</option>
                      <option value="Italy">Italy</option>
                      <option value="Japan">Japan</option>
                      <option value="China">China</option>
                      <option value="India">India</option>
                      <option value="Brazil">Brazil</option>
                      <option value="South Africa">South Africa</option>
                      <option value="Mexico">Mexico</option>
                      <option value="South Korea">South Korea</option>
                    </select>
                  </div>
                  <div class="input__group">
                    <label class="label">Zip Code</label>
                    <input type="number" name="pin_code" class="input multi__input__size" required>
                  </div>
                </div>
            </div>
            <div class="input__group hobbies__main">
              <h2>Hobbies</h2>  
              <div class="hobbies_sub">
                <div class="hobbies">
                  <div class="hobbies__container">
                    <div class="check__container">
                      <div class="check__box check__one">
                        <label>
                          <input type="checkbox" class="" name = "hobbies[]" value = "Dancing">
                          <span class="custom-checkbox"></span> 
                          Dancing
                        </label>
                        </div>
                        <div class="check__box check__two">
                          <label>
                            <input type="checkbox" class="" name = "hobbies[]" value = "Drawing">
                            <span class="custom-checkbox"></span>
                            Drawing
                          </label>
                        </div>
                    </div>
                    <div class="check__container">
                      <div class="check__box check__one">
                        <label class="angel">
                          <input type="checkbox" class="" name = "hobbies[]" value = "Singing">
                          <span class="custom-checkbox"></span>
                          Singing
                        </label>
                      </div>
                      <div class="check__box check__two">
                        <label>
                          <input type="checkbox" class="" name = "hobbies[]" value = "Playing">
                          <span class="custom-checkbox"></span>
                          Playing
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="check__box check__other">
                  <label> 
                    <input type="checkbox" class="" name="hobbies[]" value="Others:" onclick="toggleOtherHobbies(this)">
                    <span class="custom-checkbox"></span>
                    Others:
                  </label>
                </div>
                <div class="input__group">
                  <input type="text" name="other_hobbies" class="input multi__input__size other__hobbies" placeholder="Other Hobbies" id="otherHobbiesInput" disabled>
                </div>
              </div>
            </div>
            <div class="button__fields">
              <button type="button" name = "clear" class="clear__input__btn" onclick=clearInputField()>Clear</button>
              <button class="primary__btn__solid2 next__btn" type="button">
                Next
              </button>
            </div>
          </section>
  
          <section class="qualification__main hide">
            <div class="title__container">
              <h1>
                Qualification
              </h1>
            </div>
            <div class="qualification__form">
              <div class="input__form__container">
                <table border="1" cellpadding="10" cellspacing="0" align="center">
                    <thead>
                        <tr>
                            <th>Sl. No. of Examination</th>
                            <th>Board</th>
                            <th>Percentage</th>
                            <th>Year of Passing</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="spaceUnder">
                            <td>1. Class X</td>
                            <td><input type="text" name="board_class_x" placeholder="Board Name" class="qual__input" required></td>
                            <td><input type="number" name="percentage_class_x" placeholder="%" min = "0" max="100" maxlength = "3" oninput="if (this.value > 100) this.value = 100;" class ="qual__input" required ></td>
                            <td><input type="text" name="year_class_x" placeholder="yyyy" maxlength="4" class="qual__input" required></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>2. Class XII</td>
                            <td><input type="text" name="board_class_xii" placeholder="Board Name" class="qual__input" requried></td>
                            <td><input type="number" name="percentage_class_xii" placeholder="%" min="0" max="100" maxlength = "3" oninput="if (this.value > 100) this.value = 100;" class="qual__input" required></td>
                            <td><input type="text" name="year_class_xii" placeholder="yyyy" maxlength="4" class="qual__input" required></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>3. Graduation</td>
                            <td><input type="text" name="board_graduation" placeholder="Board Name" class="qual__input"></td>
                            <td><input type="number" name="percentage_graduation" placeholder="%" min="0" max="100" maxlength = "3" oninput="if (this.value > 100) this.value = 100;" class="qual__input"></td>
                            <td><input type="text" name="year_graduation" placeholder="yyyy" maxlength="4" class="qual__input"></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>4. Masters</td>
                            <td><input type="text" name="board_masters" placeholder="Board Name" class="qual__input"></td>
                            <td><input type="number" name="percentage_masters" placeholder="%" min="0" max="100" maxlength = "3" oninput="if (this.value > 100) this.value = 100;" class="qual__input"></td>
                            <td><input type="text" name="year_masters" placeholder="yyyy" maxlength="4" class="qual__input"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="input__group">
                  <label class="label">Course Applied For</label>
                  <select class="input input__course" name="course_applied" required>
                    <option value="">Select Course</option>
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
                    <option value="BS Political Science">>BS Political Science</option>
                    <option value="BS Education">BS Education</option>
                    <option value="BS Technical Vocational">BS Technical Vocational</option>
                    <option value="BS Physical Education">BS Physical Education</option>
                  </select>
                </div>
                <div class="button__fields">
                  <button class="primary__btn__solid2 back__btn" type="button">
                    Back
                  </button>
                  <button type="button" name = "clear" class="clear__input__btn" onclick=clearInputField()>Clear</button>
                  <button class="primary__btn__solid white" type="submit" name = "insert">Submit</button>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
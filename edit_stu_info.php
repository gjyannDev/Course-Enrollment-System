<?php
  include 'header.php';
  include 'connect_db.php';

  $id = $_GET["id"];
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $bday = $_POST['bday'];
    $email = $_POST['email'];
    $mobile_num = $_POST['mobile_num'];
    $gender = $_POST['gender'];
    $h_address = $_POST['h_address'];
    $city = $_POST['city'];
    $r_state = $_POST['r_state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

    // Handle hobbies
    $hobbies = $_POST['hobbies'] ?? [];
    if (in_array("Others:", $hobbies)) {
      unset($hobbies[array_search("Others:", $hobbies)]); // Remove "Others:" from the array
      if (!empty($_POST['other_hobbies'])) {
          $hobbies[] = $_POST['other_hobbies']; // Add the inputted "other hobbies" value
      }
    }

    $hobbies_str = implode(", ", $hobbies); // Convert array to comma-separated string

    $sql = "UPDATE `reg_tbl` SET `f_name`='$f_name',`l_name`='$l_name',`bday`='$bday',`mobile_num`='$mobile_num', `gender`='$gender', `h_address`='$h_address', `city`='$city', `pin_code`='$pin_code', `r_state`='$r_state', `country`='$country', `hobbies`='$hobbies_str'  
    WHERE student_id = $id";
    
    $result = mysqli_query($connection, $sql);

    if ($result) {
      header("Location: display_student_info.php");
    } else {
      echo "Failed: " . mysqli_error($connection);
    }
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
                Edit Student Information
              </h1>
            </div>
            <?php
              $sql = "SELECT * FROM `reg_tbl` WHERE student_id = $id LIMIT 1";
              $result = mysqli_query($connection, $sql);
              $rows = mysqli_fetch_assoc($result);
            ?>
            <div class="input__container">  
              <div class="multi__input">
                <div class="input__group">
                  <label class="label">First Name</label>
                  <input type="text" name="f_name" class="input multi__input__size" 
                  value="<?php echo $rows['f_name'] ?>" required>
                </div>
                <div class="input__group">
                  <label class="label">Last Name</label>
                  <input type="text" name="l_name" class="input multi__input__size" 
                  value="<?php echo $rows['l_name'] ?>"
                  required>
                </div>
              </div>
              <div class="input__group">
                  <label class="label">Date of Birth</label>
                  <input type="date" name="bday" class="input single__input" 
                  value="<?php echo $rows['bday'] ?>"
                  required>
              </div>
              <div class="input__group">
                  <label class="label">Email ID</label>
                  <input type="email" name="email" class="input single__input" 
                  value="<?php echo $rows['email'] ?>"
                  required>
              </div>
              <div class="multi__input">
                <div class="input__group">
                  <label class="label">Mobile Number</label>
                  <input type="tel" name="mobile_num" class="input multi__input__size" 
                  value="<?php echo $rows['mobile_num'] ?>"
                  required>
                </div>
                <div class="input__group">
                  <label class="label">Gender</label>
                  <select class="input multi__input__size" name="gender" id="gender" required>
                    <option value="<?php echo $rows['gender'] ?>"><?php echo $rows['gender'] ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="input__group">
                  <label class="label">Address</label>
                  <input type="text" name="h_address" class="input single__input" 
                  value="<?php echo $rows['h_address'] ?>"
                  required>
              </div>
              <div class="multi__input">
                <div class="input__group">
                  <label class="label">City</label>
                  <input type="text" name="city" class="input multi__input__size" 
                  value="<?php echo $rows['city'] ?>"
                  required>
                </div>
                <div class="input__group">
                  <label class="label">State</label>
                  <select class="input multi__input__size" name="r_state" id="state" required>
                    <option value="<?php echo $rows['r_state'] ?>"><?php echo $rows['r_state'] ?></option>
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
                      <option value="<?php echo $rows['country'] ?>"><?php echo $rows['country'] ?></option> 
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
                    <input type="number" name="pin_code" class="input multi__input__size" 
                    value="<?php echo $rows['pin_code'] ?>"
                    required>
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
              <button class="primary__btn__solid white" type="submit" name = "insert">Update</button>
            </div>
          </section>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
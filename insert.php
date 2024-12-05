<?php
  include 'connect_db.php';

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

      $checkQuery = "
      SELECT * FROM reg_tbl 
      WHERE (f_name = '$f_name' AND l_name = '$l_name') 
      OR email = '$email' 
      OR mobile_num = '$mobile_num'";

    $checkResult = mysqli_query($connection, $checkQuery);

    if ($checkResult === false) {
        die('Error executing query: ' . mysqli_error($connection));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        // Determine the type of duplicate
        $existingData = mysqli_fetch_assoc($checkResult);
        if ($existingData['f_name'] == $f_name && $existingData['l_name'] == $l_name) {
            $_SESSION['error_message'] = "Combination of first name and last name already exists.";
        } elseif ($existingData['email'] == $email) {
            $_SESSION['error_message'] = "Email already exists.";
        } elseif ($existingData['mobile_num'] == $mobile_num) {
            $_SESSION['error_message'] = "Mobile number already exists.";
        }
    } 
  
    // Insert into database
    $sql = "INSERT INTO reg_tbl (f_name, l_name, bday, email, mobile_num, gender, h_address, city, r_state, country, pin_code, hobbies)
            VALUES ('$f_name', '$l_name', '$bday', '$email', '$mobile_num', '$gender', '$h_address', '$city', '$r_state', '$country', '$pin_code', '$hobbies_str')";

    if (mysqli_query($connection, $sql)) {
      $student_id = mysqli_insert_id($connection); // Get the last inserted ID
      $_SESSION['student_id'] = $student_id;
    }

    // Retrieve student_id from session
    $student_id = $_SESSION['student_id'];

    if (!$student_id) {
        // If no student_id is found in the session, redirect back to the first page
        $_SESSION['error_message'] = "No student found. Please complete the personal details form first.";
    }

    // Retrieve other form data
    $course_applied = $_POST['course_applied'];
    $board_class_x = $_POST['board_class_x'];
    $percentage_class_x = $_POST['percentage_class_x'];
    $year_class_x = $_POST['year_class_x'];
    $board_class_xii = $_POST['board_class_xii'];
    $percentage_class_xii = $_POST['percentage_class_xii'];
    $year_class_xii = $_POST['year_class_xii'];
    $board_graduation = $_POST['board_graduation'];
    $percentage_graduation = $_POST['percentage_graduation'];
    $year_graduation = $_POST['year_graduation'];
    $board_masters = $_POST['board_masters'];
    $percentage_masters = $_POST['percentage_masters'];
    $year_masters = $_POST['year_masters'];

    // Insert data into qualification and other tables using student_id
    $insertQual = "INSERT INTO qual_tbl (student_id, course_applied) VALUES ('$student_id', '$course_applied')";
    mysqli_query($connection, $insertQual);

    $insertClassX = "INSERT INTO class_x_tbl (student_id, board_class_x, percentage_class_x, year_class_x)
                      VALUES ('$student_id', '$board_class_x', '$percentage_class_x', '$year_class_x')";
    mysqli_query($connection, $insertClassX);

    $insertClassXii = "INSERT INTO class_xii_tbl (student_id, board_class_xii, percentage_class_xii, year_class_xii)
                        VALUES ('$student_id', '$board_class_xii', '$percentage_class_xii', '$year_class_xii')";
    mysqli_query($connection, $insertClassXii);

    $insertGraduation = "INSERT INTO graduation_tbl (student_id, board_graduation, percentage_graduation, year_graduation)
                          VALUES ('$student_id', '$board_graduation', '$percentage_graduation', '$year_graduation')";
    mysqli_query($connection, $insertGraduation);

    $insertMasters = "INSERT INTO masters_tbl (student_id, board_masters, percentage_masters, year_masters)
                      VALUES ('$student_id', '$board_masters', '$percentage_masters', '$year_masters')";
    mysqli_query($connection, $insertMasters);
  }
?>
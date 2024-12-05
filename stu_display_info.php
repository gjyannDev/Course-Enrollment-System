<?php
include 'connect_db.php';
include 'header.php';

$sql = "SELECT f_name, l_name, bday, email, mobile_num, gender, h_address, city, pin_code, r_state, country, hobbies FROM reg_tbl";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo '<h1>Personal Information</h1>';
    echo "<table border='1'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthdate</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>Pin Code</th>
                <th>State</th>
                <th>Country</th>
                <th>Hobbies</th>
            </tr>";

    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["f_name"] . "</td>
                <td>" . $row["l_name"] . "</td>
                <td>" . $row["bday"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["mobile_num"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["h_address"] . "</td>
                <td>" . $row["city"] . "</td>
                <td>" . $row["pin_code"] . "</td>
                <td>" . $row["r_state"] . "</td>
                <td>" . $row["country"] . "</td>
                <td>" . $row["hobbies"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/modernize.css">
  <link rel="stylesheet" href="styles/utility.css">
  <link rel="stylesheet" href="styles/components/table_display.css">
  <title>Document</title>
</head>
<body class="display__body">

</body>
</html>
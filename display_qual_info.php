<?php
include 'connect_db.php';
include 'header.php';
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

<div class="container">
<table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">Student Id</th>
          <th scope="col">Class X</th>
          <th scope="col">Class XII</th>
          <th scope="col">Graduation</th>
          <th scope="col">Masters</th>
          <th scope="col">Percentage</th>
          <th scope="col">Year of Passing</th>
          <th scope="col">Course Applied</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `reg_tbl`";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["student_id"] ?></td>
            <td><?php echo $row["f_name"] ?></td>
            <td><?php echo $row["l_name"] ?></td>
            <td><?php echo $row["bday"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["mobile_num"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["h_address"] ?></td>
            <td><?php echo $row["city"] ?></td>
            <td><?php echo $row["pin_code"] ?></td>
            <td><?php echo $row["r_state"] ?></td>
            <td><?php echo $row["country"] ?></td>
            <td><?php echo $row["hobbies"] ?></td>
            <td>
              <div class="action__links">
                <a href="stu_info_delete.php?id=<?php echo $row["student_id"] ?>" class="link-dark">
                  <img src="assets/images/icon/bx-trash.svg" alt="">
                </a>
                <a href="edit_stu_info.php?id=<?php echo $row["student_id"] ?>" class="link-dark">
                  <img src="assets/images/icon/bx-edit.svg" alt="">
                </a>
                <a href="stu_registration_page.php?id=<?php echo $row["student_id"] ?>" class="link-dark">
                  <img src="assets/images/icon/bx-plus.svg" alt="">
                </a>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
</div>

</body>
</html>
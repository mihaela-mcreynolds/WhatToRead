<?php
if (isset($_POST['signup-submit'])) {
  require 'dbh.inc.php';

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwd-repeat"];
  $country = $_POST["country"];

  // check if user entered something in all the fields
  // if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
  //   alert("Please fill in the form fields");
  //   exit();
  // }
  // // valid input
  // else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9/-]*$/", $fname) && (!preg_match("/^[a-zA-Z0-9/-]*$/", $lname) {
  //   alert("Please fill in a valid email address, first name and last name");
  //   exit();
  // }
  // else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  //   alert("Please fill in a valid email address");
  //   exit();
  // }
  // else if (!preg_match("/^[a-zA-Z0-9/-]*$/", $fname)){
  //   alert("Please fill in a valid first name");
  //   exit();
  // }
  // else if (!preg_match("/^[a-zA-Z0-9/-]*$/", $lname)){
  //   alert("Please fill in a valid last name");
  //   exit();
  // }
  // // passwords match
  // else if ($pwd !== $pwdrepeat)){
  //   alert("Passwords do not match");
  //   exit();
  // }
  // else {

    $sql = "SELECT email FROM Customer WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      alert("SQL error");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        alert("Email address already registered");
        exit();
      }
      else {

        $sql = "INSERT INTO Customer (email, password, last_name, first_name, country) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          alert("SQL error");
          exit();
        }
        else {

          $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT)
          mysqli_stmt_bind_param($stmt, "sssss", $email, $hashedpwd, $lname, $fname, $country);
          mysqli_stmt_execute($stmt);
          exit();
          /*  REDIRECT  */
          }
      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  exit();
}

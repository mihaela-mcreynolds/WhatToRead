<?php
// require 'dbh.inc.php';

$db = mysqli_connect("localhost","c2375a03","c2375aU!");
if (mysqli_errno($db))
  exit("Error - Could not connect to MySQL");

$er = mysqli_select_db($db,"c2375a03test");
if (!$er)
  exit("Error - Could not select the database!");

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwd-repeat"];
  $country = $_POST["country"];

  # check if user entered something in all the fields
  if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
    exit("Please fill in the form fields");
  }
  // valid input
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9/-]*$/", $fname)) && (!preg_match("/^[a-zA-Z0-9/-]*$/", $lname))) {
    exit("Please fill in a valid email address, first name and last name");
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    exit("Please fill in a valid email address");
  }
  else if (!preg_match("/^[a-zA-Z0-9/-]*$/", $fname)){
    exit("Please fill in a valid first name");
  }
  else if (!preg_match("/^[a-zA-Z0-9/-]*$/", $lname)){
    exit("Please fill in a valid last name");
  }
  // passwords match
  else if ($pwd !== $pwdrepeat){
    exit("Passwords do not match");
  }
  else {

    $query = "SELECT email FROM Customer WHERE email = $email";
    $result = mysqli_query($db, $query);
    if (!$result) {
  		print "Error - query cannot be processed: ";
  		$error = mysqli_error($db);
  		print "$error";
  		exit;
  	}
    else {
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        print "Email address already registered";
        exit();
      }
      else {

        $sql = "INSERT INTO c2375a03test.Customer (email, password, last_name, first_name, country) VALUES ($email, $pwd, $lname, $fname, $country)";

      }
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  exit();

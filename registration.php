<?php session_start(); ?>
<?php
require "dbh.php";
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>What To Read</title>
  <meta charset="UTF-8">
  <meta name="author" content="Mihaela McReynolds">
  <meta name="description" content="What To Read-group project for Internet Software Development class at PSTCC. Team: Annette Farah, Mihaela McReynolds">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://kit.fontawesome.com/64d06c75d0.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="prefix-free.js" type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href ="wtr.css">
</head>
<main>
  <body>
    <!--- page container ----------------------------------------------------------------------->
    <header>
      <div class="container-fluid" style="padding: 0; height: 100%;">
        <!-- Header -->
        <div class="page-header" style="display: flex; padding: 0; margin: 0;">
          <div class="row" style="flex: 1; vertical-align: top; padding: 0 !important;">
            <!-- Left columns -->
            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-7 col-xs-7">
              <!-- Logo -->
              <img class="img-responsive" src="wtr.png" alt="Logo What To Read" style="width:100%;">
              <!-- Navigation bar -->
              <nav class="navbar navbar-expand-md" style="background: white;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav" style="display: flex; float: none; display: inline-block; width: 100%; background-color: white; color: #324519;">
                    <li class="nav-item" >
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item" >
                      <a class="nav-link" href="browse.php">Browse</a>
                    </li>
                    <li class="nav-item" >
                      <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="search.php">Search</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">About</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
            <!-- Top Right corner -->
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-xs-5" id = "rightCorner" style="background-color: white; padding: 2.3%;">
              <!--- LOG IN FORM  ------------------------------------------------------------>
              <form action = "login.php" method = "post">
                <div class="form-group">
                  <label for="exampleInputEmail1" style="color: #324519;">Email address
                  </label>
                  <input type="email" class="form-control" name="logemail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email@email.com">
                  <small id="emailHelp" class="form-text text-muted" style="color: #8a0e0b;">We'll never share your email with anyone else.
                  </small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" style="color: #324519;">Password
                  </label>
                  <input type="password" class="form-control" name="logpwd" id="exampleInputPassword1" placeholder="Password...">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1" style="color: #324519;">Remember me
                  </label>
                </div>
                <div class="container" style="margin: 0;">
                  <div class="input-group">
                    <div class="row" style="flex: 1; padding-left: 20px; padding-right: 20px;">
                      <!-- Log in button -->
                      <a class="btn btn-warning" href = "index.php">Log in
                      </button>
                      <!-- Register button -->
                      <a class="btn btn-warning" href ="register.php" style="margin-left:20px;">Register
                      </a>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- PHP    PHP   PHP   PHP   PHP   PHP   PHP    PHP   PHP   PHP   PHP   PHP   PHP   -->
            <?php
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $pwdrepeat = $_POST["pwd-repeat"];
            $country = $_POST["country"];

            // Check if passwords match
            if ($pwd !== $pwdrepeat){
              exit("Passwords do not match");
            }
            // Check if email is already in the database - Customer table
            else {
              $query = "SELECT email FROM Customer WHERE email = '$email';";
              $result = mysqli_query($db, $query);
              if (!$result) {
                exit("Error - query cannot be processed: ");
                $error = mysqli_error($db);
                echo "$error";
                exit;
              }
              else {
                $resultcheck = mysqli_stmt_num_rows($stmt);
                if ($resultcheck > 0) {
                  echo "Email address already registered";
                  exit();
                }
                // Insert new customer into the database, table Customer
                else {

                  $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

                  $sql = "INSERT INTO Customer (email, pwd, last_name, first_name, country)
                  VALUES ('$email', '$hashedpwd', '$lname', '$fname', '$country');";

                  if ($db->query($sql) === TRUE) {
                    echo "<div class='col-xl-4 col-lg-4 col-md-5 col-sm-5 col-xs-5 mx-auto'><h3 mx-auto>New record created successfully. Please log in.</h3></div>";
                  } else {
                    echo "Error: " . $sql . "<br>" . $db->error;
                  }
                }
              }
            }

            // Close the connection
            $db->close();

            ?>

          </body>
          </html>

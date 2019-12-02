<?php session_start(); ?>
<?php
  include "dbh.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>User registration</title>
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
          <!--- REGISTRATION FORM -------------------------------------------------->
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 mx-auto">
            <div class="container text-center" style="padding:20px;">
              <!--- FORM ACTION = registration.php -------------------------------------->
              <form action = "registration.php" method = "post">
                <div class="form-group">
                  <label for="fname" style="color: #324519;">First name
                  </label>
                    <!-- FNAME ---------------------------------------------------------------->
                    <input type="text" class="form-control" name = "fname" id="fname" placeholder="Jane" required>
                  </div>
                <div class="form-group">
                  <label for="fname" style="color: #324519;">Last name
                  </label>
                    <!-- LNAME ----------------------------------------------------------------->
                  <input type="text" class="form-control" name = "lname" id="lname" placeholder="Doe" required>
                </div>
                <div class="form-group">
                  <label for="email" style="color: #324519;">Email address
                  </label>
                    <!-- EMAIL ----------------------------------------------------------------->
                  <input type="email" class="form-control" id="email" placeholder="Email@email.com" name = "email" required>
                </div>
                <div class="form-group">
                  <label for="password" style="color: #324519;">Password
                  </label>
                    <!-- PWD ------------------------------------------------------------------->
                  <input type="password" class="form-control" name = "pwd" id="inputPws" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="confirmpassword" style="color: #324519;">Confirm password
                  </label>
                    <!-- PWD-REPEAT --------------------------------------------------------------->
                  <input type="password" class="form-control" name = "pwd-repeat" id="inputConfirmPws" placeholder="Repeat Password" required>
                </div>
                <div class="form-group">
                  <label for="country" style="color: #324519;">Country
                  </label>
                    <!-- COUNTRY ----------------------------------------------------------------->
                  <input type="text" class="form-control" id="countries" placeholder="USA" name = "country">
                </div>
                <!-- SIGNUP-SUBMIT ------------------------------------------------------------>
                <div class = "col text-center">
                  <input type="submit" name ="signup" class="btn btn-warning mx-auto ">
                  </input>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</main>
</html>
<?php
 require "footer.php";
?>

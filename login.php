<?php session_start(); ?>
<?php include "dbh.php" ?>

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
            <?php
            $enc = md5($_POST["logpwd"]);

            $db = mysqli_connect("localhost","c2375a03","c2375aU!");
            if (mysqli_errno($db))
               exit("Error - Could not connect to MySQL");

            // Select testing DB (change to your own)
            $er = mysqli_select_db($db,"c2375a03test");
            if (!$er)
               exit("Error - Could not select the database!");

            $logemail = $_POST["logemail"];
            $logpwd = $_POST["logpwd"];

            $query = "select id, email, pwd, last_name, first_name, country from Customer where email = '" . $logemail . "';";

            $result = mysqli_query($db,$query);
            if (!$result) {
               print "Error - Select query cannot be processed: ";
               $error = mysql_error();
               print "$error";
               exit;
            }

            // should only be 1 row because the registration doesn't permit using the same email multiple times
            $row = mysqli_fetch_row($result);
            $rowid = $row[0];
            $rowemail = $row[1];
            $rowpwd = $row[2];
            $rowlname = $row[3];
            $rowfname = $row[4];
            $rowcountry = $row[5];

            // validate the password
            if(!password_verify($logpwd, $rowpwd)){
              print "<br><br><h3> It looks like you entered the wrong password. Please go back to try again.</h3>";
            }
            else{
              print "<br><br><h3>Hello, "."$rowfname".". Welcome back!</h3>";

          // Pull the image paths of book history books for the bookshelf page

              $query2 = "select image_path from book join bookhistory on bookhistory.book_id = book.book_id join Customer on Customer.id = bookhistory.cust_id where email = '" . $logemail . "';";
              $result2 = mysqli_query($db, $query2);
              if (!$result2) {
                 print "Error - Select query cannot be processed: 2";
                 $error = mysql_error();
                 print "$error";
                 exit;
              }

              //get rows from mysqli_more_result
              //multiple rows are possible, go through the loop and pull the img paths

              // !!!!!! Can't get it to work with multiple rows yet: this only pulls one book image path
              $num_rows = $result2->num_rows;
              $row2 = mysqli_fetch_row($result2);
                $bookhist1 = $row2[0];

                // Pull the image paths of book list books for the bookshelf page

                    $query3 = "select image_path from book join booklist on booklist.book_id = book.book_id join Customer on Customer.id = booklist.cust_id where email = '" . $logemail . "';";
                    $result3 = mysqli_query($db, $query3);
                    if (!$result3) {
                       print "Error - Select query cannot be processed: 3";
                       $error = mysql_error();
                       print "$error";
                       exit;
                    }

                    //get rows from mysqli_more_result
                    //multiple rows are possible, go through the loop and pull the img paths

                    // !!!!!! Can't get it to work with multiple rows yet: this only pulls one book image path
                    $num_rows = $result3->num_rows;
                    $row3 = mysqli_fetch_row($result3);
                      $booklist1 = $row3[0];

              // start session
              session_start();
              session_regenerate_id (true); //prevent against session fixation attacks.
              $_SESSION['id'] = $rowid;
              $_SESSION['user_id']= $rowfname;
              $_SESSION['lastName'] = $rowlname;
              $_SESSION['email'] = $rowemail;
              $_SESSION['country']= $rowcountry;
              $_SESSION['bookhist1'] = $bookhist1;
              $_SESSION['bookhist2'] = $bookhist2;
              $_SESSION['booklist1'] = $booklist1;
              $_SESSION['booklist2'] = $booklist2;

              header("Location: profile.php");
            }

            ?>
          </div>
          </header>
        </body>
        <main>
          <div class="container">
            <div class="container text-center" style="padding:20px; float:left;">
              <h4> What to read next? Take our short quiz to find out! </h4><br><hr>
              <h5 class="display-5" style="color: #8a0e0b;">Choose one:
              </h5><hr>
              <div class="border border-warning" id = "quiz">
                <!-- Quiz options in a grid of pictures -->
                <div class="row">
                  <div class="column">
                    <img id = "martian" src="images/martian.jpg" style="height: 300px; width: 200px;">
                    <img id = "gatsby" src="images/gatsby.jpg" style="height: 300px; width: 200px;">
                  </div>
                  <div class="column">
                    <img id = "homegoing" src="images/homegoing.jpg" style="height: 300px; width: 200px;">
                    <img id = "hp1" src="images/hp1.jpg" style="height: 300px; width: 200px;">
                  </div>
                  <div class="column">
                    <img id= "malaria" src="images/malaria.jpg" style="height: 300px; width: 200px;">
                    <img id = "dracula" src="images/dracula.jpg" style="height: 300px; width: 200px;">
                  </div>
                  <div class="column">
                    <img id = "set" src="images/set.jpg" style="height: 300px; width: 200px;">
                    <img id = "mothergoose" src="images/mothergoose.jpg" style="height: 300px; width: 200px;">
                  </div>
                </div>
              </div>
            </div>

            <!-- Book of the Month -->
            <div class="container-fluid">
              <div class="flex-row">
                <div class="card img-fluid mx-auto" style="width: 18rem; text-align: center; padding: 20px; border: none; margin-top: 30px;">

                  <img src="images/homegoing.jpg" class="img-responsive mx-auto" style="max-width: 200px; margin-top: 30px;">
                  <div class="h4 mx-auto"><br>Book of the month
                  </div>
                </div>
                <br>
                <div class="col-xl-8 mx-auto" style="border-top: 1px solid #f0d38e; margin-top: 20px;">
                  <br><h6> Winner of the PEN/ Hemingway Award</h6><br>
                  <p class="text-center"><strong>
                    Homegoing</strong> follows the parallel paths of these sisters and their descendants through eight generations:
                    from the Gold Coast to the plantations of Mississippi, from the American Civil War to Jazz Age Harlem.
                    Yaa Gyasi’s extraordinary novel illuminates slavery’s troubled legacy both for those who were taken and those
                    who stayed—and shows how the memory of captivity has been inscribed on the soul of our nation.
                  </p>
                </div>
              </div>
            </div>


          </main>
          <?php require "footer.php" ?>

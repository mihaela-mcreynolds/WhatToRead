<?php session_start(); ?>
<?php include "dbh.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Mihaela McReynolds">
  <meta name="description" content="What To Read-group project for Internet Software Development class at PSTCC. Team: Mihaela McReynolds, Annette Farah">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://kit.fontawesome.com/64d06c75d0.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="prefix-free.js" type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="wtr.css" rel="stylesheet">
  <title>What To Read | My Bookshelf</title>
</head>
<!-- Webpage Body -->
<body>
  <div class="container-fluid" style="padding: 0; height: 100%">
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
                <li class="nav-item" >
                  <a class="nav-link" href="search.php">Search</a>
                </li>
                <li class="nav-item" >
                  <a class="nav-link" href="about.php">About</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <!-- Top Right corner -->
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-xs-5"  id = "rightCorner" style="background-color: white; padding: 2.3%;">
          <?php
          if(!isset($_SESSION['user_id']))
          print "You are not logged in</p><br><br>";
          else{
            print '<div class="login-corner"><p style="padding: 25px; margin-top: 30px;">
            Hello, '.$_SESSION["user_id"].'. Welcome back!
            <br></p><a class="btn btn-warning" href="profile.php";" style="margin-left:20px;">My Profile</a><a class="btn btn-warning" href = "logout.php" style="margin-left:20px;">Log out</a>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Bookshelf main -->

<div class="container text-center">
  <br><br><h4> Book History </h4><hr><br>

  <!-- Pull the image paths of book history books from the database -->
<img class = "img-responsive mx-auto" src = "<?php print $_SESSION['bookhist1']; ?>" alt = "book history img1" style="width:140px; height:210px; margin-right: 25px;">

<!-- TEST FOR MULTIPLE ROWS-->
<?php
// Pull the image paths of book history books for the bookshelf page

    $query2 = "select image_path from book join bookhistory on bookhistory.book_id = book.book_id join Customer on Customer.id = bookhistory.cust_id where email = '" . $logemail . "';";
    $result2 = mysqli_query($db, $query2);
    if (!$result2) {
       print "Error - Select query cannot be processed: 2";
       $error = mysql_error();
       print "$error";
       exit;
    }
$num_rows = mysqli_num_rows($result);
      for($i = 0; $i < $num_rows; $i++) {
      $row = mysqli_fetch_row($result);
              print '<img src = "';
              print $row[0];
              print '">';
      }
?>
<!-- END OF TEST -->

</div>
<div class = "container text-center">
  <br><br><br><h4> Book List </h4><hr><br>

  <!-- Pull the image paths of book list books from database -->
  <img class = "img-responsive mx-auto" src = "<?php print $_SESSION['booklist1']; ?>" alt = "book list img1" style="width:140px; height:210px; margin-right: 25px;">
</div>


</body>
</html>

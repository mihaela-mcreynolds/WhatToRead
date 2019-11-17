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
      						<a class="nav-link" href="main.html">Home</a>
      					</li>
      					<li class="nav-item" >
      						<a class="nav-link" href="browse.html">Browse</a>
      					</li>
      					<li class="nav-item" >
      						<a class="nav-link" href="contact.html">Contact</a>
      					</li>
      					<li class="nav-item">
      						<a class="nav-link" href="search.html">Search</a>
      					</li>
      					<li class="nav-item">
      						<a class="nav-link" href="about.html">About</a>
      					</li>
      				</ul>

      			</div>
      		</nav>
      	</div>
        <!-- Top Right corner -->
      	<div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-xs-5" id = "rightCorner" style="background-color: white; padding: 2.3%;">
      <!----------------------------------------------------- LOG IN FORM  ------------------------------------------------------------>
      <?php
        //
        // 1. Connect to local mySQL installation. User and password provided.
        //
        $db = mysqli_connect("localhost","c2375a03","c2375aU!");
        if (mysqli_errno($db))
          exit("Error - Could not connect to MySQL");

        //
        // 2. Select the database to use.
        //
        $er = mysqli_select_db($db,"c2375a03test");
        if (!$er)
          exit("Error - Could not select the database!");

        //
        // 3. Get email input from field
        //
        $email = $_POST["logemail"];
        $pwd = $_POST["logpwd"];

        //
        // 4. Issue SQL request.
        //
        $query = "select first_name from Customer where email = '$email' AND pwd = '$pwd';";
        $result = mysqli_query($db, $query);
        if (!$result) {
          print "Error - query cannot be processed: ";
          $error = mysqli_error($db);
          print "$error";
          exit;
        }
        //
        // 4. Process the result.
        //

        //$name = mysqli_fetch_row($result);

        $num_rows = mysqli_num_rows($result);

        for($i = 0; $i < $num_rows; $i++) {
              $row = mysqli_fetch_row($result);
          print "<h3>Hello, "."$row[0]".". Welcome back!</h3>";
        }

      ?>


  </header>
</body>
  </html>

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
   					<img id = "martian" src="img/martian.jpg" style="height: 300px; width: 200px;">
   					<img id = "gatsby" src="img/gatsby.jpg" style="height: 300px; width: 200px;">
   				</div>
   				<div class="column">
   					<img id = "homegoing" src="img/homegoing.jpg" style="height: 300px; width: 200px;">
   					<img id = "hp1" src="img/hp1.jpg" style="height: 300px; width: 200px;">
   				</div>
   				<div class="column">
   					<img id= "malaria" src="img/malaria.jpg" style="height: 300px; width: 200px;">
   					<img id = "dracula" src="img/dracula.jpg" style="height: 300px; width: 200px;">
   				</div>
   				<div class="column">
   					<img id = "set" src="img/set.jpg" style="height: 300px; width: 200px;">
   					<img id = "mothergoose" src="img/mothergoose.jpg" style="height: 300px; width: 200px;">
   				</div>
   			</div>
         <button type = "submit" id = "quizSubmit">Submit</button>
   		</div>
   	</div>
     </div>

     <!-- Book of the Month -->
     <div class="container-fluid">
     <div class="flex-row">
       <div class="card img-fluid mx-auto" style="width: 18rem; text-align: center; padding: 20px; border: none; margin-top: 30px;">

         <img src="img/homegoing.jpg" class="img-responsive mx-auto" style="max-width: 200px; margin-top: 30px;">
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

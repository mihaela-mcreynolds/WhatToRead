<?php session_start(); ?>
<?php include "dbh.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Author and Description -->
	<meta name="author" content="Mihaela McReynolds & Annette Emily Farah">
	<meta name="description" content="What To Read - group project for Internet Software Development class at PSTCC.">

<!-- added by Mihaela -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="https://kit.fontawesome.com/64d06c75d0.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="prefix-free.js" type="text/javascript"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


	<!-- Bootstrap Libraries -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- CSS files -->
<link rel="stylesheet" href ="wtr.css">

	<title>What To Read | Contact</title>
</head>

<!-- ---------------------------------------------------------------------
Webpage Body
-------------------------------------------------------------------- -->
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
				<div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-xs-5" id = "rightCorner" style="background-color: white; padding: 2.3%;">
					<!--- LOG IN FORM  ------------------------------------------------------------>
					<?php
							if(!isset($_SESSION['user_id']))
								print '
								<form action = "login.php" method = "post">
							<div class="form-group">
								<label for="exampleInputEmail1" style="color: 	333300;">Email address
								</label>
								<input type="email" class="form-control" name="logemail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email@email.com">
								<small id="emailHelp" class="form-text text-muted" style="color: blue;">We will never share your email with anyone else.
								</small>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1" style="color: 	333300;">Password
								</label>
								<input type="password" class="form-control" name="logpwd" id="exampleInputPassword1" placeholder="Password...">
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1">
								<label class="form-check-label" for="exampleCheck1" style="color: 	333300;">Remember me
								</label>
							</div>
							<div class="container" style="margin: 0;">
								<div class="input-group">
									<div class="row" style="flex: 1; padding-left: 20px; padding-right: 20px;">
										<!-- Log in button -->
										<button type="submit" class="btn btn-warning" name = "login-submit">Log in
										</button>
										<!-- Register button -->
										<a class="btn btn-warning" href ="register.php" style="margin-left:20px;">Register
										</a>
									</form>';
							else{
								print '<div class="login-corner"><p style="padding: 25px; margin-top: 30px;">
								Hello, '.$_SESSION["user_id"].'. Welcome back!
								<br></p><a class="btn btn-warning" href = "bookshelf.php">My Bookshelf</a><a class="btn btn-warning" href="profile.php";" style="margin-left:20px;">My Profile</a><a class="btn btn-warning" href = "logout.php" style="margin-left:20px;">Log out</a>';
							}
						 ?>
				 <!-- Search form -->
				 <!-- <div class="active-purple-3 active-purple-4 mb-4">
					 <input class="form-control" type="text" placeholder="Search" aria-label="Search">
				 </div> -->
			 </div>
		 </div>
	 </div>
 </div>

	<!-- Contact Container -->
	<div style="margin-left: 70px; margin-right:70px;">
		<h2 class="text-center" style="margin: 60px 0 120px 0;">Contact Us</h2>
		<div class="row test">
			<div id="contactinfo" class="col-md-4" style="margin-bottom: 20px;">
				<p><span class="glyphicon glyphicon-map-marker"></span>CaliRomania, US</p>
				<p><span class="glyphicon glyphicon-phone"></span>Phone: +1 5555555555</p>
				<p><span class="glyphicon glyphicon-envelope"></span>Email: whattoread@wtr.com</p>
			</div>
			<div class="col-md-8" style="margin-bottom: 50px;">
				<div class="row">
					<div class="col-sm-6 form-group">
						<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
					</div>
					<div class="col-sm-6 form-group">
						<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
					</div>
				</div>
				<textarea class="form-control" id="comments" name="comments" placeholder="Subject Line" rows="1"></textarea><br>
				<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
				<div class="row">
					<div class="col-md-12 form-group">
						<button class="btn btn-warning" type="submit">Send</button>
					</div>
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
</body>
</html>

	<!-- Bottom of the page -->
	<?php include "footer.php" ?>

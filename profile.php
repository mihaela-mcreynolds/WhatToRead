<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Author and Description -->
	<meta name="author" content="Mihaela McReynolds & Annette Emily Farah">
	<meta name="description" content="What To Read - group project for Internet Software Development class at PSTCC.">

	<!-- Bootstrap Libraries -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- CSS files -->
	<link href="wtrquiz.css" rel="stylesheet">
	<link href="wtr.css" rel="stylesheet">
	<title>What To Read | My Profile</title>
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
							print "You are not logged in</p><br><br>";
							else{
								print '<div class="login-corner"><p style="padding: 25px; margin-top: 30px;">
								Hello, '.$_SESSION["user_id"].'. Welcome back!
								<br></p><a class="btn btn-warning" href = "bookshelf.php">My Bookshelf</a><a class="btn btn-warning" href = "logout.php" style="margin-left:20px;">Log out</a>';
							}
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	if(!isset($_SESSION['user_id']))
	print "			Please log in to access your information";

	?>
	<!-- Profile Container -->
	<div class="container">
		<div class="container text-center" style="padding:20px; float:left;">
			<h4> Welcome to your Profile page! </h4><br><br><hr>
			<h5 class="display-5" style="color: #8a0e0b;">Make your changes and click Save.</h5><hr><br><br>
			<form action = "/action_page.php">First name:
				<input type="text" name="first name" value=" <?php print $_SESSION['user_id'] ?>">&nbsp;<br><br>
				<form action = "/action_page.php">Last name:
					<input type="text" name="last name" value=" <?php print $_SESSION['lastName'] ?>"><br><br>
					<form action="/action_page.php"> Email(s):
						<input type="email" name="emailaddress" multiple size="50" value=" <?php print $_SESSION['email'] ?>">
					</form><br>
					<form action="/action_page.php"> Country:
						<input type="text" name="country" value="<?php print $_SESSION['country'] ?>"><br>
					</form><br>
					<button class="btn btn-warning" onclick="document.getElementById('id01').style.display='block'">Save</button>
				</div>
			</div>
			<div id="id01" class="modal">
				<form class="modal-content animate" action="/action_page.php" method="post">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
						<!--<img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
					</div>
					<div class="lblcontainer">
						<label for="uname"><b>Username</b></label>
						<input type="text" placeholder="Enter Username" name="uname" required>
						<label for="psw"><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="psw" required>
						<button class="btn btn-warning" type="submit" style="display:block; margin: 0;">Save</button>
						<label>
							<input type="checkbox" checked="checked" name="remember"> Remember me
						</label>
					</div>
					<div class="container" style="background-color:#f1f1f1">
						<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
						<span class="psw">Forgot <a href="#">password?</a></span>
					</div>
				</form>
			</div>

			<script>
			// Get the modal
			var modal = document.getElementById('id01');
			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
			</script>
		</div>
			<!-- Book of the Month -->
			<div class="container-fluid">
				<div class="flex-row">
					<div class="card img-fluid mx-auto" style="width: 18rem; text-align: center; padding: 20px; border: none; margin-top: 30px;">
						<img src="images/homegoing.jpg" class="img-responsive" style="width:200px; height:300px; max-width: 200px; margin-top: 30px;">
						<div class="h4 mx-auto"><br>Book of the month
						</div>
					</div>
					<br>
					<div class="col-xl-8 mx-auto" style="border-top: 1px solid #f0d38e; margin-top: 20px;">
						<br><h6> Winner of the PEN/ Hemingway Award</h6><br>
						<p class="text-center"><strong>Homegoing</strong> follows the parallel paths of these sisters and their descendants through eight generations: from the Gold Coast to the plantations of Mississippi, from the American Civil War to Jazz Age Harlem. Yaa Gyasi's extraordinary novel illuminates slavery's troubled legacy both for those who were taken and those who stayed&mdash; and shows how the memory of captivity has been inscribed on the soul of our nation.
						</p>
					</div>
				</div>
			</div>
			<!-- Bottom of the page -->
			<div class="card img-fluid mx-auto" style="width: 18rem; text-align: center; padding: 0 20px 0 20px; border: none;">
				<img class="card-img-top mx-auto" src="bg.png" alt="Card image" style="width:150%">
				<div class="card-img-overlay" style="width:100%;">
					<p class="card-text" style="font-family: Cursive, Sans-serif; font-size:1em; color: #324519; text-align:center; padding-left:28%; padding-top:10%; width: 120%;">
						<q>Made weak by time and fate, but strong in will<br>To strive, to seek, to find, and not to yield.</q><br>Ulysses, A. L. Tennyson</p>
					</div>
				</div>
			</div>
		</body>
		</html>

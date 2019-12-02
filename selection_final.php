<?php
session_start();
?>
<?php require "dbh.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>What To Read</title>
	<meta charset="UTF-8">
	<meta name="author" content="Annette Farrah, Mihaela McReynolds">
	<meta name="description" content="What To Read-group project for Internet Software Development class at PSTCC. Team: Annette Farah, Mihaela McReynolds">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="prefix-free.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<link href="wtrquiz.css" rel="stylesheet">
	<link href="wtr.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid" style="padding: 0; height: 100%">
		<!-- TOP OF THE PAGE -->
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
					</div>
				</div>
			</div>
		</div>

		<!-- Page body -->
		<div class="container" onload = "startQuiz()">
			<div class="container text-center" style="padding:20px; float:left;">
				<h4> Congratulations! We found a book for you! </h4><br><hr>
				<h5 class="display-5" style="color: #8a0e0b;">We recommend:
				</h5><hr>
				<div class="border border-warning" id = "quiz">
					<!-- Quiz Result ----------------------------->
					<div class="floatcover">
						<a href="https://www.goodreads.com/book/show/33290408-god-bless-you-mr-rosewater?from_search=true&qid=ws6rumaX4D&rank=1" target="_blank"><img src="images/gbymr.png" alt="God Bless You, Mr. Rosewater Book Cover Image"></a>
						<p style="font-size:14px;">Cover Image from <a href="https://www.goodreads.com/book/show/33290408-god-bless-you-mr-rosewater?from_search=true&qid=ws6rumaX4D&rank=1" target="_blank">GoodReads</a></p>
					</div>
					<div class="textandtable">
						<div class="row">
							<div class="bookinfo">
								<p><strong style="font-size:24px;">God Bless You, Mr. Rosewater</strong><br>
									by Kurt Vonnegut<br><br>
									Second only to Slaughterhouse-Five of Vonnegut's canon in its prominence and influence, God Bless You, Mr. Rosewater (1965) presents Eliot Rosewater, an itinerant, semi-crazed millionaire wandering the country in search of heritage and philanthropic outcome, introducing the science fiction writer Kilgore Trout to the world and Vonnegut to the collegiate audience which would soon make him a cult writer.<br><br>

									Trout, modeled according to Vonnegut on the science fiction writer Theodore Sturgeon (with whom Vonnegut had an occasional relationship) is a desperate, impoverished but visionary hack writer who functions for Eliot Rosewater as both conscience and horrid example. Rosewater, seeking to put his inheritance to some meaningful use (his father was an entrepreneur), tries to do good within the context of almost illimitable cynicism and corruption.<br><br>

									It is in this novel that Rosewater wanders into a science fiction conference--an actual annual event in Milford, Pennsylvania--and at the motel delivers his famous monologue evoked by science fiction writers and critics for almost half a century: "None of you can write for sour apples... but you're the only people trying to come to terms with the really terrific things which are happening today." Money does not drive Mr. Rosewater (or the corrupt lawyer who tries to shape the Rosewater fortune) so much as outrage at the human condition.<br><br>

									The novel was adapted for a 1979 Alan Menken musical. The novel is told mostly thru a collection of short stories dealing with Eliot's interactions with the citizens of Rosewater County, usually with the last sentence serving as a punch line. The antagonist's tale, Mushari's, is told in a similar short essay fashion. The stories reveal different hypocrisies of humankind in a darkly humorous fashion.<br><br>

									<em style="font-size:14px;">Excerpt taken from <a href="https://www.goodreads.com/book/show/33290408-god-bless-you-mr-rosewater?from_search=true&qid=ws6rumaX4D&rank=1" target="_blank">GoodReads</a>.</em></p>
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

				<script>
				const quizContainer = document.getElementById("quiz");
				const submitButton = document.getElementById("quizSubmit");

				function startQuiz(questions, quizContainer, submitButton) {
					function showQuestions(questions, quizContainer){}
					submitButton.hide();
				}
				function sowResult(questions, quizContainer){

				}

				showQuestions(questions, quizContainer);

				submitButton.onclick = function(){
					showResults(questions, quizContainer)
				}
			}

			var myQuestions = [
				{
					answers: {
						a:
					}
				}
			]

			</script>

		</body>
		</html>

		<!-- Bottom of the page -->
		<?php require "footer.php" ?>

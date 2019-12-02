<?php session_start(); ?>
<?php include "dbh.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>What To Read | Browse</title>
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
           <!-- Search form -->
           <!-- <div class="active-purple-3 active-purple-4 mb-4">
             <input class="form-control" type="text" placeholder="Search" aria-label="Search">
           </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</header>
</body>
</html>
<main>
  <!-- Page body -->
  <!-- Carousel with 4 items at a time -->
  <div class="container text-center my-3">
    <h3>Popular right now</h3> <hr>
    <div class="row mx-auto my-auto">
      <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
        <div class="carousel-inner w-100" role="listbox">
          <div class="carousel-item active">
            <img class="d-block col-3 img-fluid" src="images/bookofthief.png" style="width: 80%;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/henrietta.jpg" style="width: 140px;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/light.jpg" style="width: 140px;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/waterforelephants.png" style="width: 140px;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/train.jpg" style="width: 140px;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/wonder.jpg" style="width: 140px;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/turtles.jpg" style="width: 140px;">
          </div>
          <div class="carousel-item">
            <img class="d-block col-3 img-fluid" src="images/s5.jpg" style="width: 140px;">
          </div>
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div> <br>
    <h3>Browse by category:</h3><hr>
    <div class="card-deck">
      <div class="card">
        <img class="card-img-top img-fluid mx-auto" src="images/wonder.jpg" alt="wonder image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Young Adult</h4><br>
          <p class="card-text">Coming of age stories<br> for young adults</p>
          <a href="ya.php" class="btn btn-warning stretched-link">Young Adult</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top img-fluid mx-auto" src="images/pp.jpg" alt="player piano image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Modern classics</h4>
          <p class="card-text">The best books<br> of the recent decades</p>
          <a href="modernclassics.php" class="btn btn-warning stretched-link">Modern classics</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top img-fluid mx-auto" src="images/gatsby.jpg" alt="gatsby image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Classic literature</h4>
          <p class="card-text">A healthy foundation<br> for any reader</p>
          <a href="classics.php" class="btn btn-warning stretched-link">Classics</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top img-fluid mx-auto" src="images/allegiant.jpg" alt="allegiant image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Science Fiction</h4>
          <p class="card-text">A leap into the future:<br>utopias and dystopias</p>
          <a href="scifi.php" class="btn btn-warning stretched-link">Sci-Fi</a>
        </div>
      </div>
    </div><br>
    <div class="card-deck">
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/hobbit.jpg" alt="hobbit image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Fantasy</h4><br>
          <p class="card-text">Otherworldly tales<br> to inspire you</p>
          <a href="fantasy.php" class="btn btn-warning stretched-link">Fantasy</a>
        </div>
      </div>
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/ritual.jpg" alt="the ritual image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Horror</h4><br>
          <p class="card-text">Creepy stories<br>for the brave</p>
          <a href="horror.php" class="btn btn-warning stretched-link">Horror</a>
        </div>
      </div>
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/scipio.jpg" alt="scipio image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Mystery</h4><br>
          <p class="card-text">Who? How?<br>Where? When?</p>
          <a href="mystery.php" class="btn btn-warning stretched-link">Mystery</a>
        </div>
      </div>
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/mothergoose.jpg" alt="mother goose image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Children's</h4><br>
          <p class="card-text">Inspiring stories for<br>the youngest readers</p>
          <a href="childrens.php" class="btn btn-warning stretched-link">Children's</a>
        </div>
      </div>
    </div><br>
    <div class="card-deck">
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/set.jpg" alt="set for life image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Self-Help</h4><br>
          <p class="card-text">Change your life<br>and get ahead!</p>
          <a href="self.php" class="btn btn-warning stretched-link">Self-Help</a>
        </div>
      </div>
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/cslewispoems.jpg" alt="c.s. lewis poems image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Poetry</h4><br>
          <p class="card-text">Explore these<br>lyrical universes</p>
          <a href="poetry.php" class="btn btn-warning stretched-link">Poetry</a>
        </div>
      </div>
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/mebeforeyou.jpg" alt="me before you image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Romance</h4><br>
          <p class="card-text">Love stories<br>for the ages</p>
          <a href="romance.php" class="btn btn-warning stretched-link">Romance</a>
        </div>
      </div>
      <div class="card" style="width:400px">
        <img class="card-img-top img-fluid mx-auto" src="images/colourofmagic.jpg" alt="the colour of magic image" style="width:200px; height: 300px; padding: 10px;">
        <div class="card-body">
          <h4 class="card-title">Book series</h4><br>
          <p class="card-text">Discover your<br>new obsession</p>
          <a href="series.php" class="btn btn-warning stretched-link">Book series</a>
        </div>
      </div>
    </div>
    <!-- Carousel script -->
    <script>

    $('#recipeCarousel').carousel({
      interval: 5000
    })

    $('.carousel .carousel-item').each(function(){
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));

      for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
      }
    });

    </script>
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

<?php require "footer.php" ?>

  </body>
  </html>

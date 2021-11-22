<?php require_once('connect.php'); ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Register Hotel</title>
</head>

<body class="p-3 mb-2 bg-light text-dark">
	<nav class="navbar navbar-dark bg-dark">
		<div class="container"> <a class="navbar-brand" href="#">
				<b> Hotel reservation</b>
			</a>
			<ul class="nav pi-draggable" draggable="true">
				<li class="nav-item">
					<a class="btn btn-danger" type="button" href="logout.php">logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<h2>Register Hotel</h2>
	<form action="register_insert_hotel.php" method='post'>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<h5>Hotel Name</h5>
				</div>
				<div class="col-sm"><input type="text" name="hotel_name"></div>
				<div class="col-sm"></div>
				<div class="w-100"> </div>
				<div class="col-sm">
					<h5>Location</h5>
				</div>
				<div class="col-sm"><input type="text" name="location"></div>
				<div class="col-sm"></div>
				<div class="w-100"> </div>

			</div>
			<p></p>
			<button class='btn btn-danger' type='submit' name='submit' value='Submit'>Register</button>
			<p></p>
			<a class='btn btn-primary' href='main.php'>Back</a>
	</form>
	</div>
</body>

</html>
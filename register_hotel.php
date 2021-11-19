<?php require_once('connect.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Register Hotel</title>
	</head>
	<body>
	<p></p>
	<nav class="navbar" style ='height:80px; background-color: dodgerblue;'>
	<span class="navbar-brand mb-0 h1">Register Hotel</span>
	</nav>
	<p></p>
	<form action ="register_insert.php" method='post'>
	<div class="container">
	<div class="row">
	<div class="col-sm"><h5>Hotel Name</h5></div>
	<div class="col-sm"><input type="text" name="hotel_name"></div>
	<div class="col-sm"></div>
	<div class="w-100"> </div>
	<div class="col-sm"><h5>Location</h5></div>
	<div class="col-sm"><input type="text" name="location"></div>
	<div class="col-sm"></div>
	<div class="w-100"> </div>
	<div class="col-sm"><h5>Room Type</h5></div>
	<div class="col-sm"><input type="checkbox" id="standard" name="standard" value="standard">
	<div class="col-sm"><input type="checkbox" id="deluxe" name="deluxe" value="deluxe">
	<div class="col-sm"><input type="checkbox" id="suite" name="suite" value="suite">
	
</div>
	<p></p>
	<button type='submit' name='submit' value = 'Submit'>Register</button>
	<p></p>
	</form>
	<a class ='btn btn-primary' href ='main.php'>Back</a>
	</body>
	</html>

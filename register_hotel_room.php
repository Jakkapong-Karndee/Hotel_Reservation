<?php require_once('connect.php');
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Register Hotel Room</title>
</head>

<body>
	<p></p>
	<nav class="navbar navbar-light bg-light">
		<span class="navbar-brand mb-0 h1">Register Hotel Room</span>
	</nav>
	<p></p>
	<form action="register_insert_hotel_room.php" method='post'>
		<div class="container">
			<!-- Row 1 -->
			<div class="row">
				<div class="col-sm">
					<h5>Hotel Name</h5>
				</div>
				<!-- option Hotel_name -->
				<div class="col-sm">
					<select name="hotel_name">
						<option value="">
							<-- Please Select Hotel -->
						</option>
						<?php
						$q = "select * from hotel";
						$result = $mysqli->query($q);
						if (!$result) {
							echo "Select failed. Error: " . $mysqli->error;
							return false;
						}

						while ($row = $result->fetch_array()) {
						?>
							<option value="<?php echo $row["hotel_id"]; ?>"><?php echo $row["hotel_name"] . " - " . $row["location"]; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-sm"></div>
			</div>
			<!-- Row 2 -->
			<div class="row">
				<div class="col-sm">
					<h5>Room Type</h5>
				</div>
				<!-- option Room Type -->
				<div class="col-sm">
					<select name="hotel_room_type">
						<option value="">
							<-- Please Select Room Type -->
						</option>
						<?php
						$q = "select * from room_type ";
						$result = $mysqli->query($q);
						if (!$result) {
							echo "Select failed. Error: " . $mysqli->error;
							return false;
						}

						while ($row = $result->fetch_array()) {
						?>
							<option value="<?php echo $row["room_type_id"]; ?>"><?php echo $row["room_type_id"] . " - " . $row["room_type_name"]; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-sm"></div>
			</div>
			<!-- Row 3 -->
			<div class="row">
				<div class="col-sm">
					<h5>Room No. Start</h5>
				</div>
				<div class="col-sm">
					<input type="text" name="room_start">
					<h5>to</h5><input type="text" name="room_end">
				</div>
				<div class="col-sm"></div>
			</div>
			<div class="col-sm"></div>
			<!-- Row 4 -->
			<div class="row">
				<div class="col-sm">
					<h5>Prices</h5>
				</div>
				<div class="col-sm">
					<input type="text" name="prices">
				</div>
				<div class="col-sm"></div>
			</div>
		</div>
		<button class ='btn btn-danger' type='submit' name='room_submit' value = 'Submit'>Register</button>
	</form>
	<p></p>
	<a class='btn btn-primary' href='main.php'>Back</a>
	
</body>

</html>
<?php require_once('connect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<title>Register Hotel Room</title>
	</head>
	<body>
	<p></p>
	<nav class="navbar" style ='height:80px; background-color: dodgerblue;'>
	<span class="navbar-brand mb-0 h1">Register Hotel Room</span>
	</nav>
	<p></p>
	<form action ="register_insert_hotel_room.php" method='post' name='form0'>
	<div class="container">
	<div class="row">
	<div class="col-sm"><h5>Hotel Name</h5></div> <!-- option Hotel_name -->
	<select name="hotel_name">
        <option value=""><-- Please Select Hotel --></option>
        <?php
		$q = "select * from hotel";
		$result = $mysqli->query($q);
		if (!$result) {
		  echo "Select failed. Error: " . $mysqli->error;
		  return false;
		}

		while ($row = $result->fetch_array()) { 
			?>
			<option value="<?php echo $row["hotel_id"];?>"><?php echo $row["hotel_name"]." - ".$row["location"];?></option>
			<?php
		}
		?>              
    </select>
	<div class="col-sm"></div>
	<div class="w-100"> </div>
	<div class="col-sm"><h5>Room Type</h5></div> <!-- option Room Type -->
	<select name="hotel_room_type">
        <option value=""><-- Please Select Room Type --></option>
        <?php
		$q = "select * from room_type ";
		$result = $mysqli->query($q);
		if (!$result) {
		  echo "Select failed. Error: " . $mysqli->error;
		  return false;
		}

		while ($row = $result->fetch_array()) { 
			?>
			<option value="<?php echo $row["room_type_id"];?>"><?php echo $row["room_type_id"]." - ".$row["room_type_name"];?></option>
			<?php
		}
		?>              
    </select>
	<div class="col-sm"></div>
	<div class="w-100"> </div>
	<div class="col-sm"><h5>Room No. Start</h5></div>
	<div class="col-sm"><input type="text" name="room_start"></div>
	<div class="col-sm"><h5>to</h5></div>
	<div class="col-sm"><input type="text" name="room_end"></div>
	<div class="col-sm"></div>
	<div class="w-100"> </div>
	<div class="col-sm"><h5>Prices</h5></div>
	<div class="col-sm"><input type="text" name="prices"></div>
	<p></p>
	<button type='submit' name='su' value = 'Submit'>Register</button>
	<p></p>
	</form>
	<a class ='btn btn-primary' href ='main.php'>Back</a>
	</body>
	</html>

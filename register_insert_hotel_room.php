
		<?php
        require_once('connect.php');
        if(isset($_POST['su'])) {
		// Taking all  values from the form 

		$hotel_name = $_POST['hotel_name'];
		$hotel_room_type = $_POST['hotel_room_type'];
		$room_start = $_POST['room_start'];
		$room_end = $_POST['room_end'];
		$prices = $_POST['prices'];
		// Performing insert query execution
		// here our table name is user
		$sql = "call range_insert ('$hotel_name','$hotel_room_type','$prices','$room_start','$room_end');";
		
        $result1=$mysqli->query($sql);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
        echo '<script>alert("register successful!")</script>';
		header("Location: register_hotel_room.php");	// <-- Not link yet //
		}
		?>
	
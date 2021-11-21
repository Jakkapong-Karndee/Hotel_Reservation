
		<?php
        require_once('connect.php');
        if(isset($_POST['submit'])) {
		// Taking all  values from the form 

		$hotel_name = $_POST['hotel_name'];
		$location = $_POST['location'];
		// Performing insert query execution
		// here our table name is user
		$sql = "INSERT INTO hotel(hotel_name,hotel.location) VALUES ('$hotel_name','$location');";
		
        $result1=$mysqli->query($sql);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
        //echo '<script>alert("register successful!")</script>';
		header("Location: register_hotel.php");	
		}
		?>
	
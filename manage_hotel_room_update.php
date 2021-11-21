<?php
require_once('connect.php');
	if(isset($_POST['update_hotel_room_status'])) {
	$transaction_id= $_POST["transaction_id"];	
    $room_status=$_POST["room_status"];
	$payment_type = $_POST["payment_type"];
    $hotel_id = $_POST["hotel_id"];
    $room_id = $_POST["room_id"];
		echo $room_status;
        $q2="UPDATE hotel_room SET room_status='$room_status' where hotel_id ='$hotel_id' AND room_id ='$room_id' ";
		$result= $mysqli -> query($q2);
		
		if(!$result){
			echo "Update failed. Error: ".$mysqli->error ;
			return false;
		}
	header("Location: manage_hotel_room.php");	
	}

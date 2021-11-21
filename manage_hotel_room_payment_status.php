<?php
session_start();
$User_ID = $_SESSION['User_ID'];
require_once('connect.php');

	if(isset($_POST['update_payment_status'])) {
	$transaction_id= $_POST["transaction_id"];	

	$payment_status = $_POST["payment_status"];
	$q = "SELECT staff_id FROM user INNER JOIN staff_detail ON user.user_id = staff_detail.user_id WHERE staff_detail.user_id = $User_ID";
	$result = $mysqli->query($q);
	if (!$result) {
		echo "Select failed. Error: " . $mysqli->error;
		return false;
	}
	while ($row = $result->fetch_array()) {
		$staff_id = $row[0];
	}

        $q="UPDATE `transaction` SET staff_id='$staff_id', payment_status ='$payment_status', pay_date = NOW() where transaction_id='$transaction_id' ; "; 
	
		$result= $mysqli -> query($q);
		
		if(!$result){
			echo "Update failed. Error: ".$mysqli->error ;
			return false;
		}
	header("Location: manage_hotel_room.php");	
	}
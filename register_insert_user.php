
		<?php
        require_once('connect.php');
        if(isset($_POST['user_submit'])) {
		// Taking all  values from the form 

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
        $passport_id = $_POST['passport_id'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
		// Performing insert query execution
		// here our table name is user
		$sql = "INSERT INTO user(first_name, last_name, email, phone, position,username, password) 
        VALUES ('$first_name','$last_name','$email','$phone', 'Guest','$username','$password');";
        $result1=$mysqli->query($sql);
        $user_id = $mysqli->insert_id;
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
        
        $sql2 = "INSERT INTO guest_detail(passport_id,user_id) VALUES ('$passport_id','$user_id');";
            
        $result2=$mysqli->query($sql2);
        if(!$result2){
            echo "INSERT failed. Error: ".$mysqli->error ;
            return false;
            }

        //echo '<script>alert("register successful!")</script>';
		header("Location: login_form.php");	
		}
		?>
	
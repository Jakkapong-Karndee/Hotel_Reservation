
		<?php
        require_once('connect.php');
        if(isset($_POST['submit'])) {
		// Taking all  values from the form 

		$User_Fname = $_POST['Fname'];
		$User_Lname = $_POST['Lname'];
		$User_Gender = $_POST['Gender'];
        $User_DOB = $_POST['DOB'];
        $User_Department = $_POST['Department'];
        $User_Position = $_POST['Position'];
        $User_Tel = $_POST['Tel'];
        $User_Email = $_POST['Email'];
        $User_Address = $_POST['Address'];
        $User_Username = $_POST['Username'];
        $User_Password = $_POST['Password'];
		$User_Quota = $_POST['Quota'];
		// Performing insert query execution
		// here our table name is user
		$sql = "INSERT INTO user(User_Fname,User_Lname,User_Gender,User_DOB,User_Department,User_Position,User_Email,User_Tel,User_Address,
        User_Username,User_Password,User_Quota) VALUES ('$User_Fname','$User_Lname','$User_Gender','$User_DOB','$User_Department','$User_Position',
        '$User_Email','$User_Tel','$User_Address','$User_Username','$User_Password','$User_Quota');";
		
        $result1=$mysqli->query($sql);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
        echo '<script>alert("register successful!")</script>';
		header("Location: list_of_user.php");
		}
		?>
	
<?php
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: main.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="default.css">
</head>
<body>

    <form action="login.php" method="post">
        <div class="imgcontainer">
          <img src="logo.jpg" alt="logo" class="logo">
        </div>
      
        <div class="container">
            <h2><label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required></h2>
      
        <h2><label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required></h2>

                <button type = "submit" class ="btn btn-primary" name ="login" >Login</button>
        </div>
      
        <div class="containerlogin" style="background-color:#f1f1f1">
    
        </div>
      </form>
</body>
</html> 
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="p-3 mb-2 bg-light text-dark">
  <form action="login.php" method="post">
    <p></p>
    <div class="imgcontainer text-center">
      <img src="login_logo.jpg"  width="500px" height="300px" alt="logo" class="logo">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <h2><label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
          </h2>
          <h2><label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
          </h2>
          <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm"><button type="submit" class="btn btn-primary" name="login">Login</button></div>
            <div class="col-sm"></div>
          </div>
          <p></p>
          <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm"><a href="register_user.php" class="btn btn-danger">Register</a></div>
            <div class="col-sm"></div>
          </div>

        </div>
      </div>
    </div>
  </form>
  <p></p>
</body>

</html>
<?php require_once('connect.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register User Account</title>
</head>

<body>
    <p></p>
    <nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Register User Account</span>
  </nav>
    <p></p>
    <form action="register_insert_user.php" method='post'>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h5>First Name</h5>
                </div>
                <div class="col-sm"><input type="text" name="first_name"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>
                <div class="col-sm">
                    <h5>Last Name</h5>
                </div>
                <div class="col-sm"><input type="text" name="last_name"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>
                <div class="col-sm">
                    <h5>Passport ID</h5>
                </div>
                <div class="col-sm"><input type="text" name="passport_id"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>
                <div class="col-sm">
                    <h5>Email</h5>
                </div>
                <div class="col-sm"><input type="text" name="email"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>
                <div class="col-sm">
                    <h5>Phone Number</h5>
                </div>
                <div class="col-sm"><input type="text" name="phone"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>
                <div class="col-sm">
                    <h5>Username</h5>
                </div>
                <div class="col-sm"><input type="text" name="username"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>
                <div class="col-sm">
                    <h5>Password</h5>
                </div>
                <div class="col-sm"><input type="password" name="password"></div>
                <div class="col-sm"></div>
                <div class="w-100"> </div>

            </div>
            <p></p>
            <button class='btn btn-danger' type='submit' name='user_submit' value='submit'>Register</button>
            <p></p>
    </form>
    <a class='btn btn-primary' href='login_form.php'>Back</a>
</body>

</html>
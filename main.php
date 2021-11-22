<!--- main page after login --->
<?php

session_start();
if (!isset($_SESSION["User_ID"])) {
  header("Location: login_form.php");
}


require('connect.php');
$first_name = $_SESSION['first_name'];
$position = $_SESSION['position'];
$user_id = $_SESSION['User_ID'];


?>
<!DOCTYPE html>
<html>

<head>
  <title>main page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
        editable: false,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: 'calendar/load.php',
      });
    });
  </script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="Welcome">

      <h1>Welcome !</h1>

    </div>

    <!--<div class="Calendar">
    <img src="calendar.png" alt="calendar" class="calendar">
  </div>-->
    <div class="Name">
      <?php
      echo "<h3>Name: " . $first_name . "<h3>";
  
      ?>
    </div>

    <div class="row">
      <div class="col-md-12 mt-3 text-center">
        <!-- column 1 -->
        <div class="func">
          <!--Guest func-->
          <div class="f1">
            <?php
            if ($position == "Guest") {
              echo '<h3>Guest</h3>';
              echo '<a href="search.php" class="btn btn-dark">Search</a>';
              echo '<a href="your_room.php" class="btn btn-dark">Your Room</a>';
              echo '<a href="invoice.php" class="btn btn-dark">Invoice</a>';
            }
            ?>
          </div>

          <!--Staff func-->
          <div class="f2">
            <?php
            if ($position == "Staff") {
              echo '<h3>Staff</h3>';
              echo '<a href="register_staff.php" class="btn btn-dark">Register staff</a>';
              echo '<a href="register_hotel.php" class="btn btn-dark">Register Hotel</a>';
              echo '<a href="register_hotel_room.php" class="btn btn-dark">Register Hotel Room </a>';
              echo '<a href="manage_hotel_room.php" class="btn btn-dark">Manage Hotel Room </a>';
            }
            ?>
          </div>

          <!--logout-->
          <div class="f3"></div>
        </div>
        </div>
        <div>
          <a class="btn btn-danger" type="button" href="logout.php">logout</a>
        </div>
      
      <div class="col-md-12 mt-3 text-center">
        <!-- column 2 -->
        <div class="container">
          <div id="calendar">
          </div>
        </div>
      </div>
      
</body>

</html>
<!--<link rel="stylesheet" href="styles.css">-->
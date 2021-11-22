<?php require_once('connect.php');
session_start();
$User_ID = $_SESSION['User_ID'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Room</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="p-3 mb-2 bg-light text-dark">
<nav class="navbar navbar-dark bg-dark">
        <div class="container"> <a class="navbar-brand" href="#">
                <b> Hotel_reservation</b>
            </a>
            <ul class="nav pi-draggable" draggable="true">
                <li class="nav-item">
                    <a class="btn btn-danger" type="button" href="logout.php">logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <p></p>
    
        <h1>Your Room</h1>
    

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Room No.</th>
                    <th>Room Type</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Room Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = "SELECT guest_id FROM user INNER JOIN guest_detail ON user.user_id = guest_detail.user_id WHERE user.user_id = $User_ID";
                $result = $mysqli->query($q);
                if (!$result) {
                    echo "Select failed. Error: " . $mysqli->error;
                    return false;
                }
                while ($row = $result->fetch_array()) {
                    $guest_id = $row[0];
                }
                $q = "select hotel.hotel_name , hotel_room.room_no ,room_type.room_type_name, booking.date_start,booking.date_end ,hotel_room.room_status from 
                booking inner join guest_detail on booking.guest_id = guest_detail.guest_id
                inner join user on guest_detail.user_id = user.user_id 
                                inner join hotel_room on booking.room_id = hotel_room.room_id    
                                inner join hotel on booking.hotel_id = hotel.hotel_id 
                                inner join room_type on hotel_room.room_type_id = room_type.room_type_id
                                where guest_detail.guest_id = '$guest_id';";
                $result = $mysqli->query($q);
                if (!$result) {
                    echo "Select failed. Error: " . $mysqli->error;
                    return false;
                }

                while ($row = $result->fetch_array()) { ?>

                    <tr>
                        <td><?= $row['hotel_name'] ?></td>
                        <td><?= $row['room_no'] ?></td>
                        <td><?= $row['room_type_name'] ?></td>
                        <td><?= $row['date_start'] ?></td>
                        <td><?= $row['date_end'] ?></td>
                        <td><?= $row['room_status'] ?></td>
                        <!--  <select name = "room_status" >
                              <option value ="availabled">Availabled</option>
                              <option value ="reserved">Reserved</option>
                            </select> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a class="btn btn-success" href="search.php">Find Room</a>

    <p>
    </p>

    <a class="btn btn-primary" href="main.php">Back</a>


</body>

</html>
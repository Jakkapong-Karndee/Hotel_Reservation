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
    <p></p>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Your Room</span>
    </nav>

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
                $q = "select hotel.hotel_name AS 'Hotel Name', hotel_room.room_no AS 'Room No',room_type.room_type_name AS 'Room Type', booking.date_start AS 'Start Booking Date',booking.date_end AS 'End Booking Date',hotel_room.room_status AS 'Room Status' from hotel 
                                inner join hotel_room on hotel.hotel_id = hotel_room.hotel_id 
                                inner join room_type on hotel_room.room_type_id = room_type.room_type_id 
                                inner join booking on hotel.hotel_id = booking.hotel_id 
                                inner join guest_detail on booking.guest_id = guest_detail.guest_id 
                                inner join user on guest_detail.user_id = user.user_id;";
                $result = $mysqli->query($q);
                if (!$result) {
                    echo "Select failed. Error: " . $mysqli->error;
                    return false;
                }

                while ($row = $result->fetch_array()) { ?>
                <?php } ?>
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
            </tbody>
        </table>
    </div>
    <div class="row">
        <a><button class="btn btn-success" href="search.php">Find Room</button></a>
    </div>
    <p>
    </p>
    <div class="row">
        <a><button class="btn btn-primary" href="main.php">Back</button></a>
    </div>

</body>

</html>
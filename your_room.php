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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4">Your Room</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead class="thead-dark">
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
                                    <td><?= $row['room_status'] ?>
                                        <!--  <select name = "room_status" >
                              <option value ="availabled">Availabled</option>
                              <option value ="reserved">Reserved</option>
                            </select> -->
                                    </td>
                                <td>
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center d-md-flex justify-content-between align-items-center">
                            <ul class="nav d-flex justify-content-center">
                            </ul> <a class="btn btn-primary" href="main.php">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
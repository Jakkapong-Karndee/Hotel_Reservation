<?php require_once('connect.php');
session_start();
$User_ID = $_SESSION['User_ID'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Hotel Room</title>
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
                    <h1 class="display-4">Manage Hotel Room</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Hotel Name</th>
                                    <th>Room No.</th>
                                    <th>Room Type</th>
                                    <th>Cost</th>
                                    <th>Payment Type</th>
                                    <th>Start Reserve Date</th>
                                    <th>End Reserve Date</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q = "select `transaction`.transaction_id as 'Transaction ID', hotel.hotel_name as 'Hotel Name', hotel_room.room_no as 'Room No.', room_type.room_type_name as 'Room Type', `transaction`.total_cost as 'Total Cost', `transaction`.payment_type as 'Payment Type', booking.date_start as 'Start Reserve Date',booking.date_end as 'End Reserve Date', `transaction`.payment_status as 'Payment Status' from hotel 
                                inner join hotel_room on hotel.hotel_id = hotel_room.hotel_id 
                                inner join room_type on hotel_room.room_type_id = room_type.room_type_id 
                                inner join booking on hotel.hotel_id = booking.hotel_id 
                                inner join `transaction` on booking.booking_id = `transaction`.booking_id 
                                inner join guest_detail on booking.guest_id = guest_detail.guest_id 
                                inner join user on guest_detail.user_id = user.user_id 
                                inner join staff_detail on user.user_id = staff_detail.user_id;";
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
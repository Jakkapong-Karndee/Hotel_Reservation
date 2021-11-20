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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="p-3 mb-2 bg-info text-white">
    <div class="py-5">
        <div class="container p-3 mb-2 bg-light text-dark">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4">Manage Hotel Room</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>User ID</th>
                                    <th>Hotel Name</th>
                                    <th>Room No.</th>
                                    <th>Room Type</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Room Status</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q = "select user.user_id AS 'User ID', hotel.hotel_name AS 'Hotel Name', hotel_room.room_no AS 'Room No',room_type.room_type_name AS 'Room Type', booking.date_start AS 'Start Date',booking.date_end AS 'End Date',hotel_room.room_status AS 'Room Status',transaction.payment_status AS 'Payment Status' from hotel 
                                inner join hotel_room on hotel.hotel_id = hotel_room.hotel_id 
                                inner join room_type on hotel_room.room_type_id = room_type.room_type_id 
                                inner join booking on hotel.hotel_id = booking.hotel_id 
                                inner join transaction on booking.transaction_id = transaction.transaction_id 
                                inner join guest_detail on booking.guest_id = guest_detail.guest_id 
                                inner join user on guest_detail.user_id = user.user_id;";
                                $result = $mysqli->query($q);
                                if (!$result) {
                                    echo "Select failed. Error: " . $mysqli->error;
                                    return false;
                                }

                                while ($row = $result->fetch_array()) { ?>
                                <?php if (!isset($row['payment_status'])) {
                                        $row['payment_status'] = "Not Paid";
                                    }
                                } ?>

                                <tr>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= $row['hotel_name'] ?></td>
                                    <td><?= $row['room_no'] ?></td>
                                    <td><?= $row['room_type_name'] ?></td>
                                    <td><?= $row['date_start'] ?></td>
                                    <td><?= $row['date_end'] ?></td>
                                    <td><?= $row['room_status'] ?>
                                        <!--<select name="room_status">
                                            <option value="availabled">Availabled</option>
                                            <option value="reserved">Reserved</option>
                                        </select>-->
                                    </td>
                                    <td><?= $row['payment_status'] ?>
                                        <!--<select name="payment_status">
                                            <option value="paid">Paid</option>
                                            <option value="Not Paid">Not Paid</option>
                                        </select>-->
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
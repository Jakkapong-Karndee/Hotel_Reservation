<?php require_once('connect.php');
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Hotel Room</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="p-3 mb-2 bg-light text-dark">
	<nav class="navbar navbar-dark bg-dark">
		<div class="container"> <a class="navbar-brand" href="#">
				<b> Hotel reservation</b>
			</a>
			<ul class="nav pi-draggable" draggable="true">
				<li class="nav-item">
					<a class="btn btn-danger" type="button" href="logout.php">logout</a>
				</li>
			</ul>
		</div>
	</nav>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h1>List of Transaction</h1>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Booking ID</th>
                            <th>Hotel ID</th>
                            <th>Room ID</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = "SELECT `transaction`.transaction_id , booking.booking_id, booking.hotel_id, booking.room_id, payment_type  from `transaction` inner join booking on `transaction`.transaction_id = booking.transaction_id group by transaction_id;";
                        $result = $mysqli->query($q);
                        if (!$result) {
                            echo "Select failed. Error: " . $mysqli->error;
                            return false;
                        }

                        while ($row = $result->fetch_array()) { ?>
                            <?php if (!isset($row['payment_type'])) {
                                $row['payment_type'] = "Not Paid";
                            } ?>
                            <tr>
                                <td><?= $row['transaction_id'] ?></td>
                                <td><?= $row['booking_id'] ?></td>
                                <td><?= $row['hotel_id'] ?></td>
                                <td><?= $row['room_id'] ?></td>
                                <td><?= $row['payment_type'] ?></td>
                                <form action='manage_hotel_room_payment_status.php' method='post'>
                                    <td><select name="payment_status">
                                            <option value="paid">Paid</option>
                                            <option value="unpaid">Unpaid</option>
                                        </select>
                                        <input type='hidden' name='transaction_id' value="<?= $row['transaction_id'] ?> ">
                                        <input type='hidden' name='booking_id' value=" <?= $row['booking_id'] ?> ">
                                        <button class="btn btn-success" name="update_payment_status" type="submit">Update</button>
                                </form>
                                </td>
                                <form action='manage_hotel_room.php' method='post'>
                                    <td><button class="btn btn-success" name="view_transaction" type="submit">View</button></td>

                                    <?php

                                    echo "<input type='hidden' name='transaction_id' value=" . $row['transaction_id'] . ">";
                                    echo "<input type='hidden' name='hotel_id' value=" . $row['hotel_id'] . ">";
                                    echo "<input type='hidden' name='room_id' value=" . $row['room_id'] . ">";
                                    echo "<input type='hidden' name='payment_type' value=" . $row['payment_type'] . ">";
                                    echo "<input type='hidden' name='booking_id' value=" . $row['booking_id'] . ">";
                                    ?>
                                </form>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Manage Hotel Room</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Guest ID</th>
                                    <th>Room No.</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Room Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_POST['view_transaction'])) {
                                    $transaction_id = $_POST["transaction_id"];
                                    $hotel_id = $_POST["hotel_id"];
                                    $room_id = $_POST["room_id"];

                                    $q2 = "select booking.transaction_id,guest_id, room_no,date_start, date_end, booking.room_id, booking.hotel_id, payment_type from booking 
                                    inner join transaction on booking.transaction_id = transaction.transaction_id 
                                    inner join hotel_room on booking.room_id = hotel_room.room_id 
                                    where booking.transaction_id = '$transaction_id' ;";
                                    $result = $mysqli->query($q2);
                                    if (!$result) {
                                        echo "Select failed. Error: " . $mysqli->error;
                                        return false;
                                    }

                                    while ($row = $result->fetch_array()) { ?>
                                        <form action='manage_hotel_room_update.php' method='post'>
                                            <tr>
                                                <td><?= $row['transaction_id'] ?></td>
                                                <td><?= $row['guest_id'] ?></td>
                                                <td><?= $row['room_no'] ?></td>
                                                <td><?= $row['date_start'] ?></td>
                                                <td><?= $row['date_end'] ?></td>
                                                <td><select name="room_status">
                                                        <option value="Available">Available</option>
                                                        <option value="Unavailable">Unavailable</option>
                                                        
                                                    </select>
                                                    <?php
                                                    echo "<input type='hidden' name='transaction_id' value=" . $row['transaction_id'] . ">";
                                                    echo "<input type='hidden' name='hotel_id' value=" . $row['hotel_id'] . ">";
                                                    echo "<input type='hidden' name='room_id' value=" . $row['room_id'] . ">";
                                                    echo "<input type='hidden' name='payment_type' value=" . $row['payment_type'] . ">";
                                                    ?>
                                                    <button class="btn btn-success" name="update_hotel_room_status" type="submit">Update</button>
                                                </td>
                                            </tr>
                                            </form>
                                        <?php } ?>
                                        
                                    <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-12 text-center d-md-flex justify-content-between align-items-center">
                            <ul class="nav d-flex justify-content-center">
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="main.php">Back</a>
        </div>
    </div>
</body>

</html>
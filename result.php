<?php require_once('connect.php');
session_start();
$User_ID = $_SESSION['User_ID'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body class="p-3 mb-2 bg-light text-dark">
    <div class="p-3 mb-2 bg-light text-dark">.bg-light</div>
    <?php
    if (isset($_POST['booking_submit'])) {
        unset($_POST['booking_submit']);
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        unset($_POST['check_in']);
        unset($_POST['check_out']);
        foreach ($_POST as $key => $value) {
            if ($value == '0') {
                unset($_POST[$key]);
            }
        }
        
    ?>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4">Result</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Hotel Name</th>
                                        <th>Room No</th>
                                        <th>Room Type</th>
                                        <th>Check-In Date</th>
                                        <th>Check-Out Date</th>
                                        
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $price = 0;
                                    foreach ($_POST as $key => $value) {
                                        $room_detail = explode("/", $key);
                                        $hotel_id = $room_detail[0];
                                        $room_type_id = $room_detail[1];
                                        $q = "SELECT hotel.hotel_name , hotel_room.room_no,room_type.room_type_name,hotel_room.price,hotel_room.room_id, hotel.hotel_id from hotel 
                                inner join hotel_room on hotel.hotel_id = hotel_room.hotel_id 
                                inner join room_type on hotel_room.room_type_id = room_type.room_type_id 
                                LEFT JOIN booking on hotel_room.room_id = booking.room_id 
                                WHERE hotel_room.hotel_id = $hotel_id
                                AND room_type.room_type_id = $room_type_id LIMIT $value";
                                        $result = $mysqli->query($q);
                                        if (!$result) {
                                            echo "Select failed. Error: " . $mysqli->error;
                                            return false;
                                        }
                                        $date1 = new DateTime($check_out);
                                        $date2 = new DateTime($check_in);
                                        $diff = date_diff($date1, $date2);
                                        $day = ($diff->format('%a'));
                                        while ($row = $result->fetch_assoc()) { ?>

                                            <tr>
                                                <td><?= $row['hotel_name'] ?></td>
                                                <td><?= $row['room_no'] ?></td>
                                                <td><?= $row['room_type_name'] ?></td>
                                                <td><?= $check_in ?></td>
                                                <td><?= $check_out ?></td>
                                                <td><?= ($row['price'] * $day) ?></td>

                                                <?php
                                                $price = $price + ($row['price'] * $day);
                                                $data[] = array(
                                                    'room_id'   => $row["room_id"],
                                                    'hotel_id'   => $row["hotel_id"],
                                                );
                                                ?>
                                            <?php } ?>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                            <!--  
                $date1 = new DateTime($row['Form_DateStart']);
                  $date2 = new DateTime($row['Form_DateEnd']);
                  $diff = date_diff($date2, $date1);
                  $remain = $row['User_Quota'] - $diff->format('%a');
                  SELECT DATEDIFF(day, '2017/08/25 07:00', '2017/08/25 12:45') AS DateDiff;
                -->
                            <h5>Total Price : </h5>
                            <?php

                            echo $price;
                            ?>
                            <div class="col-md-12 text-center d-md-flex justify-content-between align-items-center">
                                <ul class="nav d-flex justify-content-center">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="search.php">Back</a>
            <form action=result_insert.php method='post'>
                <select name="payment_method">
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
                <input type="hidden" name="price" value="<?= $price ?>">
                <input type="hidden" name="check_in" value="<?= $check_in ?>">
                <input type="hidden" name="check_out" value="<?= $check_out ?>">
                <input type="hidden" name="data" value="<?= htmlentities(serialize($data)) ?>">
                <button type="submit" class="btn btn-primary" name="pay">Pay</button>
            </form>


        </div>
    <?php
    }


    ?>
</body>

</html>
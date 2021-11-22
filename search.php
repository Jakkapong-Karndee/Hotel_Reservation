<?php
require_once("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search for Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="price_range_style.css" />
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
    <div class="py-5 text-center" style="background-color: lightgray">
        <div class="container">

            <!-- Main Row  -->
            <div class="row">
                <!-- Main column 1 -->
                <div class="col-sm vertical-center">
                    <div class="container" style="background-color:white">
                        <form action="search.php" method='post'>
                            <h1>Search</h1>
                            <!-- row 1 -->
                            <div class="row"></div>
                            <div class="col-sm"><label>Date Search </label></div>
                            <div class="col-sm">
                                <input type="text" name="datesearch">
                            </div>
                            <script>
                                $('input[name="datesearch"]').daterangepicker({
                                    "timePicker": true,
                                    "timePicker24Hour": true,
                                    "timePickerIncrement": 30,
                                    startDate: moment().startOf('hour'),
                                    endDate: moment().startOf('hour').add(72, 'hour'),
                                    locale: {
                                        format: 'YYYY/MM/DD hh:mm:ss'
                                    }
                                }, function(start, end, label) {
                                    console.log('New date range selected: ' + start.format('YYYY-MM-DD hh-mm-ss') + ' to ' + end.format('YYYY-MM-DD hh mm-ss') + ' (predefined range: ' + label + ')');
                                });
                            </script>



                            <?php
                            $q = "SELECT hotel_id,hotel_name FROM hotel";
                            if ($result = $mysqli->query($q)) {
                            ?>
                                <!-- row 2 -->
                                <div class="row"></div>
                                <div class="col-sm"><label>Hotel Name</label></div>
                                <div class="col-sm">
                                    <select name='hotel_id'>
                                        <option value="NULL">Any</option>
                                        <?php
                                        while ($row = $result->fetch_array()) {

                                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>'; ?>


                                        <?php } ?>
                                    </select>
                                </div>
                            <?php
                            } else {
                                echo 'Query error: ' . $mysqli->error;
                            }
                            $q = "SELECT location FROM hotel";
                            if ($result = $mysqli->query($q)) {
                            ?>
                                <!-- row 3 -->
                                <div class="row"></div>
                                <div class="col-sm"><label>Location</label></div>
                                <div class="col-sm">
                                    <select name='location'>
                                        <option value="NULL">Any</option>
                                        <?php
                                        while ($row = $result->fetch_array()) {


                                            echo '<option value="' . $row[0] . '">' . $row[0] . '</option>'; ?>

                                        <?php } ?>
                                    </select>
                                </div>
                            <?php
                            } else {
                                echo 'Query error: ' . $mysqli->error;
                            }
                            $q = "SELECT room_type_id,room_type_name  FROM room_type";
                            if ($result = $mysqli->query($q)) {
                            ?>
                                <!-- row 4 -->
                                <div class="row"></div>
                                <div class="col-sm"><label>Room Type</label></div>
                                <div class="col-sm">
                                    <select name='room_type_id'>
                                        <option value="NULL">Any</option>
                                        <?php
                                        while ($row = $result->fetch_array()) {

                                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            <?php

                            } else {
                                echo 'Query error: ' . $mysqli->error;
                            }
                            $q = "SELECT MIN(price),MAX(price)  FROM hotel_room";
                            if ($result = $mysqli->query($q)) {
                                while ($row = $result->fetch_assoc()) {
                                    $min_price = $row['MIN(price)'];
                                    $max_price = $row['MAX(price)'];
                                }
                            } else {
                                echo 'Query error: ' . $mysqli->error;
                            }
                            ?>
                            <script type="text/javascript">
                                var min_price_sql = <?php echo "$min_price;" ?>;
                                var max_price_sql = <?php echo "$max_price;" ?>;
                            </script>
                            <script src="price_range_script.js" type="text/javascript"></script>
                            <div class="price-range-block">
                                <!-- row 5 -->
                                <div class="row"></div>
                                <div class="col-sm"><label>Price Range</label></div>
                                <div id="slider-range" class="price-filter-range" style="position:relative;
margin-left:auto;
margin-right:auto;" name="rangeInput"></div>
                                <!-- row 6 -->
                                <div class="row">
                                    <div style="margin:30px auto">

                                        <input type='number' min=<?= $min_price ?> max=<?= $max_price ?> oninput='validity.valid||(value="<?= $min_price ?>");' name='min_price' id='min_price' class='price-range-field' step="100" />
                                        <input type='number' min=<?= $min_price ?> max=<?= $max_price ?> oninput='validity.valid||(value="<?= $max_price ?>");' name='max_price' id='max_price' class='price-range-field' step="100" />

                                    </div>
                                </div>

                                <!-- row 7 -->
                                <div class="row"></div>
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-success" name="search">Search Now!</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container" style="background-color:white">
                <div class="col-sm vertical-center">
                    <?php


                    if (isset($_POST['search'])) {
                        $search = array("hotel_id", "location", "room_type_id", "min_price", "max_price");
                        $search_info = array();
                        foreach ($search as $search) {
                            if (($_POST[$search]) == "NULL") {
                                $search_info[] = '1 OR 1 = 1';
                            } else {
                                $search_info[] = "'$_POST[$search]'";
                            }
                        }
                        $datesearch = $_POST['datesearch'];
                        $datearray = explode(" - ", $datesearch);
                        $check_in = $datearray[0];
                        $check_out = $datearray[1];

                    ?>
                        <!-- Main column 2 -->
                        <div class="col-sm vertical-center">
                            <!-- row 1 -->
                            <form action="result.php" method='post'>
                                <div class="row">

                                    <input type="hidden" name='check_in' value='<?= $check_in ?>'>
                                    <input type="hidden" name='check_out' value='<?= $check_out ?>'>
                                </div>
                                <h1>Result</h1>
                                <table  class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Hotel Name</th>
                                            <th>Location</th>
                                            <th>Room Type</th>
                                            <th>Room Available</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = 'SELECT hotel.hotel_id,room_type.room_type_id,hotel_name,location,room_type_name,count(*) AS room_available,price FROM hotel 
                                inner join hotel_room on hotel.hotel_id = hotel_room.hotel_id 
                                inner join room_type on hotel_room.room_type_id = room_type.room_type_id
                                LEFT JOIN booking ON booking.room_id = hotel_room.room_id
                                WHERE (hotel.hotel_id = ' . $search_info[0] . ') AND (hotel.location = ' . $search_info[1] . ') AND (hotel_room.room_type_id = ' . $search_info[2] . ')
                                AND (hotel_room.price BETWEEN ' . $search_info[3] . ' AND ' . $search_info[4] . ')
                                AND  (((date_start NOT BETWEEN "' . $check_in . '" AND "' . $check_out . '") AND (date_end NOT BETWEEN "' . $check_in . '" AND "' . $check_out . '")) OR booking.booking_id IS NULL)
                                GROUP BY hotel_name,hotel_room.room_type_id ORDER BY price';

                                    $result = $mysqli->query($sql);
                                    if (!$result) {
                                        echo "Select failed. Error: " . $mysqli->error;
                                        return false;
                                    }
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['hotel_name'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['room_type_name'] . "</td>";
                                        echo "<td>" . $row['room_available'] . "</td>";

                                        echo "<td> <select name='" . $row['hotel_id'] . "/" . $row['room_type_id'] . "'>";
                                        for ($x = 0; $x <= $row['room_available']; $x++) {
                                            echo "<option value=" . $x . ">" . $x . "</option>";
                                        } ?>
                                        </select>
                                        </td>
                                        <td><?= $row['price'] ?> </td>
                                        </tr>

                                    <?php } ?>
                                </table>

                                <button type="submit" name="booking_submit" class="btn btn-success">Book Now!</button>
                            </form>
                        <?php } ?>
                        </div>

                </div>
            </div>
<p></p>

            <a type='button' class="btn btn-primary" href="main.php">Back</a>
        </div>
    </div>
</body>

</html>
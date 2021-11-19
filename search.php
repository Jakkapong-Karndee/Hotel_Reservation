<?php
require_once("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search for Room</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>


    <link rel="stylesheet" type="text/css" href="price_range_style.css" />


</head>

<body>
    <form action="search.php" method='post'>
        <label>Date Search Start</label>
        <input type="date" name="date-search-start">
        <label>Date Search End</label>
        <input type="date" name="date-search-end">

        <?php
        $q = "SELECT hotel_id,hotel_name FROM hotel";
        if ($result = $mysqli->query($q)) {
        ?>
            <label>Hotel Name</label>
            <select name='hotel_id'>
                <option value="NULL">Any</option>
                <?php
                while ($row = $result->fetch_array()) {

                    echo '<option value="' . $row[0] . '">' . $row[1] . '</option>'; ?>


                <?php } ?>
            </select>
        <?php
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        $q = "SELECT location FROM hotel";
        if ($result = $mysqli->query($q)) {
        ?>
            <label>Location</label>
            <select name='location'>
                <option value="NULL">Any</option>
                <?php
                while ($row = $result->fetch_array()) {


                    echo '<option value="' . $row[0] . '">' . $row[0] . '</option>'; ?>

                <?php } ?>
            </select>
        <?php
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        $q = "SELECT room_type_id,room_type_name  FROM room_type";
        if ($result = $mysqli->query($q)) {
        ?>
            <label>Room Type</label>
            <select name='room_type_id'>
                <option value="NULL">Any</option>
                <?php
                while ($row = $result->fetch_array()) {

                    echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                } ?>
            </select>

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


            <label>Price Range</label>
            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

            <div style="margin:30px auto">

                <input type='number' min=<?= $min_price ?> max=<?= $max_price ?> oninput='validity.valid||(value="<?= $min_price ?>");' name='min_price' id='min_price' class='price-range-field' step="100" />
                <input type='number' min=<?= $min_price ?> max=<?= $max_price ?> oninput='validity.valid||(value="<?= $max_price ?>");' name='max_price' id='max_price' class='price-range-field' step="100" />

            </div>




            <button type="submit" name="search">Search Now!</button>



    </form>
    <a class="btn btn-primary" href="main.php">Back</a>
    <?php


    if (isset($_POST['search'])) {
        $search = array("hotel_id", "location", "room_type_id", "min_price", "max_price");
        $search_info = array();
        foreach ($search as $search) {
            if (($_POST[$search])=="NULL") {
                $search_info[] = '1 OR 1 = 1';
            } else {
                $search_info[] = "'$_POST[$search]'";
            }
        }
    echo $search_info[0];
    ?>
    <table class="table table-striped">
    <thead class="thead-dark">
                <tr>
                    <th>Hotel Name</th>
                    <th>Hotel Name</th>  
                    <th>Room Type</th>
                    <th>Room Available</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
    <?php
    $sql = 'SELECT hotel_name,location,room_type_name,count(*) AS room_available,price FROM hotel 
    inner join hotel_room on hotel.hotel_id = hotel_room.hotel_id 
    inner join room_type on hotel_room.room_type_id = room_type.room_type_id
    WHERE (hotel.hotel_id = '.$search_info[0].') AND (hotel.location = '.$search_info[1].') AND (hotel_room.room_type_id = '.$search_info[2].')
    AND (hotel_room.price BETWEEN '.$search_info[3].' AND '.$search_info[4].') GROUP BY hotel_name,hotel_room.room_type_id ORDER BY price';
    $result = $mysqli->query($sql);
    echo $sql;
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
        echo "<td> quantity </td>";
        echo "<td>" . $row['price'] . "</td>"; ?>
        </tr>
    
    <?php
    }

    echo "</table>";
    }
    ?>
</body>

</html>
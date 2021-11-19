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
    <form action="search_result.php" method='post'>
        <label>Date Search Start</label>
        <input type="date" name="date-search-start">
        <label>Date Search End</label>
        <input type="date" name="date-search-end">

        <?php
        $q = "SELECT hotel_name FROM hotel";
        if ($result = $mysqli->query($q)) {
        ?>
            <label>Hotel Name</label>
            <select name='hotel_name'>
                <option value="">Any</option>
                <?php
                while ($row = $result->fetch_array()) {

                    echo '<option value="' . $row[0] . '">' . $row[0] . '</option>'; ?>


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
                <option value="">Any</option>
                <?php
                while ($row = $result->fetch_array()) {


                    echo '<option value="' . $row[0] . '">' . $row[0] . '</option>'; ?>

                <?php } ?>
            </select>
        <?php
        } else {
            echo 'Query error: ' . $mysqli->error;
        }
        $q = "SELECT room_type_name  FROM room_type";
        if ($result = $mysqli->query($q)) {
        ?>
            <label>Room Type</label>
            <select name='room_type'>
                <option value="">Any</option>
                <?php
                while ($row = $result->fetch_array()) {

                    echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
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
            var min_price_sql = "<? $min_price; ?>";
            var max_price_sql = "<? $max_price; ?>";
        </script>
        <script src="price_range_script.js" type="text/javascript"></script>
        <div class="price-range-block">


            <label>Price Range</label>
            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

            <div style="margin:30px auto">
            
                <input type='number' min=<?=$min_price?> max=<?=$max_price?> oninput='validity.valid||(value="<?=$min_price?>");' id='min_price' class='price-range-field' />
                <input type='number' min=<?=$min_price?> max=<?=$max_price?> oninput='validity.valid||(value="<?=$max_price?>");' id='max_price' class='price-range-field' />
            
            </div>

            <button class="price-range-search" id="price-range-submit">Search</button>

            <div id="searchResults" class="search-results-block"></div>


            <a class="btn btn-primary" href="main.php">Back</a>


    </form>
</body>

</html>
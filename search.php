<?php
require_once("connect.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search for Room</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
</head>

<body>

    <div class="container">
        <div id="calendar"></div>
    </div>
    <?php
    $q = "SELECT Event_ID, Event_Name FROM company_event ";

    $result = $mysqli->query($qe);
    while ($row = $result->fetch_array()) {
        $event_id = $row['Event_ID'];
        $event_name = $row['Event_Name'];
    }
    $q = 'select Event_ID,Event_Name from company_event';
    if ($result = $mysqli->query($q)) {
        while ($row = $result->fetch_array()) {
            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
        }
    } else {
        echo 'Query error: ' . $mysqli->error;
    }
    ?>

 
    <a class="btn btn-primary" href="main.php">Back</a>



</body>

</html>
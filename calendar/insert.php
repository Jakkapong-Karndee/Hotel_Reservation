<?php

require('../connect.php');

if(isset($_POST["title"]))
{
    $title = $_POST['title'];
    $start_event = $_POST['start'];
    $end_event = $_POST['end'];
 $query = "INSERT INTO company_event (Event_Name, Event_Date_Start, Event_Date_End) VALUES ('$title', '$start_event' , '$end_event')";
 $mysqli->query($query);
}
?>




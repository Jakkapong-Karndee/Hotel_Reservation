<?php

require('../connect.php');

if(isset($_POST["title"]))
{
    $title = $_POST['title'];
    $start_event = $_POST['start'];
    $end_event = $_POST['end'];
    $id = $_POST['id'];
 $query = "UPDATE company_event SET Event_Name = '$title' , Event_Date_Start = '$start_event', Event_Date_End='$end_event' WHERE Event_ID = $id";
 if(!$mysqli->query($query)){
    echo("failed. Error: ".$mysqli->error);
}
}
?>
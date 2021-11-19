<?php

require('../connect.php');

if(isset($_POST["id"]))
{
    $id = $_POST['id'];
 $query = "DELETE FROM company_event WHERE Event_ID = $id";
 if(!$mysqli->query($query)){
    echo("failed. Error: ".$mysqli->error);
}
}
?>
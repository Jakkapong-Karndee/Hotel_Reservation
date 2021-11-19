<?php
$mysqli = new mysqli('localhost','root','','hotel_reservation');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
 ?>


<?php
session_start();
$User_ID = $_SESSION['User_ID'];
$User_position = $_SESSION['user_position'];
//load calendar

require("../connect.php");

$data = array();
if ($User_position == 'hr'){
    $query = "SELECT Event_ID,Event_Name,Event_Date_Start,Event_Date_End FROM company_event";
}
else{
$query = "SELECT company_event.Event_ID,Event_Name,Event_Date_Start,Event_Date_End FROM company_event INNER JOIN user_has_company_event ON company_event.Event_ID = user_has_company_event.Event_ID WHERE user_has_company_event.User_ID = $User_ID;";
$statement = $mysqli->query($query);

while($row = $statement->fetch_array())
{
 $data[] = array(
  'id'   => $row["Event_ID"],
  'title'   => $row["Event_Name"],
  'start'   => $row["Event_Date_Start"],
  'end'   => $row["Event_Date_End"]
 );
}
$query = "SELECT Event_ID,Event_Name,Event_Date_Start,Event_Date_End FROM company_event WHERE Event_Detail = 'all'";
}
$statement = $mysqli->query($query);

while($row = $statement->fetch_array())
{
 $data[] = array(
  'id'   => $row["Event_ID"],
  'title'   => $row["Event_Name"],
  'start'   => $row["Event_Date_Start"],
  'end'   => $row["Event_Date_End"]
 );
}
echo json_encode($data);
?>

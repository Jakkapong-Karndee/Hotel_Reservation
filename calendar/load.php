<?php
session_start();
$User_ID = $_SESSION['User_ID'];
$position = $_SESSION['position'];
//load calendar

require("../connect.php");

$data = array();
if ($position == 'Staff') {
    $query = "SELECT booking_id,hotel_room.room_no,date_start,date_end FROM booking INNER JOIN hotel_room ON booking.room_id = hotel_room.room_id";
} 
else {
    $q = "SELECT guest_id FROM user INNER JOIN guest_detail ON user.user_id = guest_detail.user_id WHERE user.user_id = $User_ID";
    $result = $mysqli->query($q);
    if (!$result) {
        echo "Select failed. Error: " . $mysqli->error;
        return false;
    }
    while ($row = $result->fetch_array()) {
        $guest_id = $row[0];
    }
    $query = "SELECT booking_id,hotel_room.room_no,date_start,date_end FROM booking INNER JOIN hotel_room ON booking.room_id = hotel_room.room_id WHERE guest_id = $guest_id";
}
$_SESSION['query'] = $query;
$statement = $mysqli->query($query);

while ($row = $statement->fetch_array()) {
    $data[] = array(
        'id'   => $row["booking_id"],
        'title'   => "room: ".$row["room_no"],
        'start'   => $row["date_start"],
        'end'   => $row["date_end"]
    );
    $_SESSION['data'] = $data;
}
?>
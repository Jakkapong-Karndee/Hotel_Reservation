<?php 
require_once('connect.php');
session_start();
$User_ID = $_SESSION['User_ID'];

$q = "SELECT guest_id FROM user INNER JOIN guest_detail ON user.user_id = guest_detail.user_id WHERE user.user_id = $User_ID";
$result = $mysqli->query($q);
if (!$result) {
    echo "Select failed. Error: " . $mysqli->error;
    return false;
}
while ($row = $result->fetch_array()) {
    $guest_id = $row[0];
}
    if (isset($_POST['pay'])) {
        $payment_method = $_POST['payment_method'];
        $price = $_POST['price'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $q = "INSERT INTO transaction(payment_type,total_cost) VALUES ('$payment_method',$price)";
        echo $q;
        $mysqli->query($q);
        $transaction_id = $mysqli->insert_id;
        echo $transaction_id;
        $data = unserialize($_POST['data']);
        foreach ($data as $data) {
            $query = "INSERT INTO booking(guest_id,room_id,hotel_id,date_start,date_end,transaction_id) VALUES 
        (?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            echo $data['hotel_id'];
            echo "room_id";
            echo $data['room_id'];
            $stmt->bind_param("iiissi",$guest_id, $data['room_id'],$data['hotel_id'] ,$check_in,$check_out,$transaction_id);
            $rc = $stmt->execute();
            if ( false===$rc ) {
                die('execute() failed: ' . htmlspecialchars($stmt->error));
            }

    }

}

?>
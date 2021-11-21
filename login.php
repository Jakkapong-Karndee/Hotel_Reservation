<?php
require_once('connect.php');
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['login'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT user_id, first_name, position from User where username=? AND password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($user_id, $first_name, $position);
$stmt->store_result();
while ($stmt->fetch()) {
}
$_SESSION['User_ID'] = $user_id;
$_SESSION['first_name'] = $first_name;
$_SESSION['position'] = $position;


// Initializing Session
header("Location: main.php"); // Redirecting To Profile Page
}
$mysqli->close(); // Closing Connection
}
?>
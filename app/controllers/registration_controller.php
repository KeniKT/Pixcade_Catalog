<?php

$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "script";

$conn = mysqli_connect($localhost, $username, $password, $databaseName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$displayName = $_POST['displayName'];
$email = $_POST['email'];
$password = $_POST['password'];
$dateOfBirth = $_POST['dateOfBirth'];
$userType = $_POST['userType'];

$sql = "INSERT INTO users (first_name, last_name, displayName, email, password, dateOfBirth, userType) VALUES ('$first_name', '$last_name', '$displayName', '$email', '$password', '$dateOfBirth', '$userType')";



mysqli_close($conn);
?>
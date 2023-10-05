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

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (firstName, lastName, displayName, email, password, dateOfBirth, userType) VALUES ('$first_name', '$last_name', '$displayName', '$email', '$hashedPassword', '$dateOfBirth', '$userType')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../views/login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php

$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "script";

$conn = mysqli_connect($localhost, $username, $password, $databaseName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from users where email = '$email'";
$result = run_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row) {
    if (password_verify($password, $row['password'])) {
        $_SESSION["user_id"] = $row['userId'];
        $_SESSION["user_firstName"] = $row['firstName'];
        $_SESSION["user_lastName"] = $row['lastName'];
        $_SESSION["user_email"] = $row['email'];
        $_SESSION["user_displayName"] = $row['displayName'];
        $_SESSION["user_profileText"] = $row['profileText'];
        $_SESSION["user_type"] = $row['userType'];
        $_SESSION["user_dateOfBirth"] = $row['dateOfBirth'];
        $_SESSION["user_profilePicture"] = $row['profilePicture'];
        $_SESSION["user_externalLink"] = $row['externalLink'];
        

        header("Location: ../views/homepage.php");
    } else {
        header("Location: ../views/login.php");
    }
} else {
    header("Location: ../views/login.php");
}

function run_query($conn, $sql){
    if (mysqli_query($conn, $sql)) {
        return mysqli_query($conn, $sql);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
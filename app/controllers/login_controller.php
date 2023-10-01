<?php
// session_start();

require_once '../models/dbconfig/dbcreator.php';
require_once '../models/user.php';
require_once '../controllers/authentication_controller.php';


$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);

$errorMsg = ""; // This is for the error message after the login attempt

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = UserController::getUserByEmail($databaseCreator, $email);

    if ($user) {
        if (password_verify($password, $user->getPassword())) {
            $_SESSION["user_id"] = $user->getId();
            $_SESSION["user_email"] = $user->getEmail();
            // Redirect the user to a dashboard or another page
            header("Location: ./index.html");
            exit;
        } else {
            $errorMsg = "Incorrect password.";
        }
    } else {
        $errorMsg = "User not found.";
    }
}

$databaseCreator->closeConnection();
include('../views/login_form.html');
?>


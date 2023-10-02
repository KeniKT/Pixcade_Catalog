<?php
include('../config/session.php');

require_once '../models/dbconfig/dbcreator.php';
require_once '../models/user.php';

$localhost = "localhost";
$username = "alazar";
$password = "32120832asdASD!@#";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);


$errorMsg = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $displayName = $_POST["displayName"];
    $userType = $_POST["userType"];
    $profileText = $_POST["profileText"];
    $password = $_POST["password"];
    $externalLink = $_POST["externalLink"];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $user = new User($first_name, $last_name, $email, $hashedPassword, $dateOfBirth, $displayName, $userType, $externalLink, $profileText);


    if ($user->emailExists($databaseCreator)) {
        $errorMsg = "Email already exists.";
    } elseif ($user->userNameExists($databaseCreator)) {
        $errorMsg = "Username already exists.";
    } else {

        if ($user->insertUser($databaseCreator)) {
            $successMsg = "User registered successfully.";
            $first_name = $last_name = $email = $password = $dateOfBirth = $displayName = $userType = $profileText = $externalLink = $hashedPassword = "";

            header("Location: ./login_form.php");

        } else {
            $errorMsg = "Could not insert records: " . $user->getLastError();
        }
    }
}

$databaseCreator->closeConnection();
include('../views/register_form.html');
?>


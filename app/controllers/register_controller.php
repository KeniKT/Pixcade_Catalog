<?php
include('../controllers/session.php');

require_once '../models/dbconfig/dbcreator.php';
require_once '../models/user.php';

$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);
// $databaseCreator->createDatabase();

$errorMsg = ""; // This is for the error message after the user fails with one of the inputs
$successMsg = ""; // This is for the success message after the user successfully registers

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

    // I made this to make the user password more protected
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Create a User instance
    $user = new User($first_name, $last_name, $email, $externalLink,$dateOfBirth, $displayName, $userType, $externalLink, $profileText);

    // Check for existing email or username (you can implement this in the User model)
    if ($user->emailExists($databaseCreator)) {
        $errorMsg = "Email already exists.";
    } elseif ($user->userNameExists($databaseCreator)) {
        $errorMsg = "Username already exists.";
    } else {
        // Insert the user into the database
        if ($user->insertUser($databaseCreator)) {
            $successMsg = "User registered successfully.";
            $first_name = $last_name = $email = $password=$dateOfBirth = $displayName = $userType = $profileText = $externalLink= $hashedPassword="";
            // You can redirect the user to a login page here
        } else {
            $errorMsg = "Could not insert records: " . $user->getLastError();
        }
    }
}

$databaseCreator->closeConnection();
include('../views/register_form.html'); // This is to render the message on the same page.
?>

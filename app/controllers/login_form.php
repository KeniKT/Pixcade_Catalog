<?php

require_once '../models/dbconfig/dbcreator.php';
require_once '../models/user.php';
require_once '../controllers/login_controller.php';
require_once '../controllers/wishlist_controller.php';
require_once '../controllers/release_controller.php';


$localhost = "localhost";
$username = "alazar";
$password = "32120832asdASD!@#";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);

$errorMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = UserController::getUserByEmail($databaseCreator, $email);

    if ($user) {
        if (password_verify($password, $user->getPassword())) {
            $_SESSION["user_id"] = $user->getId();
            $_SESSION["user_firstName"] = $user->getFirstName();
            $_SESSION["user_displayName"] = $user->getDisplayName();
            $_SESSION["user_profileText"] = $user->getProfileText();
            echo $_SESSION["user_firstName"];
            if ($user->getUserType() === 'Gamer') {
                $wishlist = WishlistController::getWishlistByUserId($databaseCreator, $user->getId());
                $_SESSION['wishlist'] = $wishlist;
            } elseif ($user->getUserType() === 'Developer') {
                $releases = ReleaseController::getReleasesByUserId($databaseCreator, $user->getId());
                $_SESSION['releases'] = $releases;
            }


            session_start();
            header("Location: ./home.php");
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


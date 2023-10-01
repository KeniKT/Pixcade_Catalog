<?php
//I started the session here
session_start();

//I have set the session timeout period to 5 minutes(300 seconds)
$timeout = 300;

// I checked if the user is logged in and still active or inactive
if (isset($_SESSION['user_id']) && isset($_SESSION['last_activity'])) {
    $inactive = time() - $_SESSION['last_activity'];
    if ($inactive >= $timeout) {
        //Logged the user out as the above scenario has passed
        session_unset();
        session_destroy();
        header("Location: login_form.html"); // Redirected to the login page
    }
}

// I have to update the new session for the user after I have logged him out.
$_SESSION['last_activity'] = time();
?>


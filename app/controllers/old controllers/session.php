<?php
session_start();

$timeout = 300;

if (isset($_SESSION['user_id']) && isset($_SESSION['last_activity'])) {
    $inactive = time() - $_SESSION['last_activity'];
    if ($inactive >= $timeout) {
        session_unset();
        session_destroy();
        header("Location: login_form.html");
    }
}

$_SESSION['last_activity'] = time();
?>


<?php

if (isset($_SESSION['email'])) {
    header('Location: ./app/views/homepage.php');
} else {
    header('Location: ./app/views/login.php');
}

?>
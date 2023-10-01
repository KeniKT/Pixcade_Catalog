<?php
require_once 'dbcreator.php';

$localhost = "localhost";
$username = "alazar";
$password = "32120832asdASD!@#";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);

$databaseCreator->createDatabase();

$databaseCreator->closeConnection();
?>

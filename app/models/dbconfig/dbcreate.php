<?php
require_once 'dbcreator.php';

$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);

$databaseCreator->createDatabase();

$databaseCreator->closeConnection();
?>

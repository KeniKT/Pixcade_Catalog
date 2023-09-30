<?php
require_once 'DatabaseCreator.php';

$localhost = "localhost";
$username = "username";
$password = "password";

$databaseCreator = new DatabaseCreator($localhost, $username, $password);

$databaseName = "script";

$databaseCreator->createDatabase($databaseName);

$databaseCreator->closeConnection();

?>
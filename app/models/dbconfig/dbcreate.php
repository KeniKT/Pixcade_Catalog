<?php
require_once 'dbcreator.php';

$localhost = "localhost";
$username = "root";
$password = " ";

$databaseCreator = new DatabaseCreator($localhost, $username, $password);

$databaseName = "script";

$databaseCreator->createDatabase($databaseName);

$databaseCreator->closeConnection();

?>
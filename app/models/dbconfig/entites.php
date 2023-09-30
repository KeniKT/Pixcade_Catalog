<?php
require_once 'dbcreator.php';

$localhost = "localhost";
$username = "root";
$password = " ";

$databaseCreator = new DatabaseCreator($localhost, $username, $password);

$usersFields = [
    "userId INT AUTO_INCREMENT PRIMARY KEY",
    "firstName VARCHAR(30) NOT NULL",
    "lastName VARCHAR(30) NOT NULL",
    "email VARCHAR(50) NOT NULL",
    "dateOfBirth DATE NOT NULL",
    "displayName VARCHAR(50) NOT NULL",
    "userType ENUM ('Developer', 'Gamer') NOT NULL",
    "externalLink VARCHAR(100) NOT NULL",
    "profileText TEXT NOT NULL",
];

$databaseCreator->createTable("users", $usersFields);


$tagFields = [
    "tagId INT AUTO_INCREMENT PRIMARY KEY",
];

$databaseCreator->createTable("tag", $tagFields);

$descriptorsFields = [
    "descriptorId INT AUTO_INCREMENT PRIMARY KEY",
    "name VARCHAR(50) NOT NULL",
    "description TEXT NOT NULL",
   
];

$databaseCreator->createTable("descriptor", $descriptorsFields);

$genreFields = [
    "genreId INT AUTO_INCREMENT PRIMARY KEY",
];

$databaseCreator->createTable("genre", $genreFields);


$platformFields = [
    "platformId INT AUTO_INCREMENT PRIMARY KEY",
];

$databaseCreator->createTable("platform", $platformFields);



$gameFields = [
    "gameId INT AUTO_INCREMENT PRIMARY KEY",
    "title VARCHAR(50) NOT NULL",
    "caption VARCHAR(30) NOT NULL",
    "description TEXT NOT NULL",
    "price DECIMAL(10,2) NOT NULL",
    "discount DECIMAL(5,2) DEFAULT 0",
    "releaseDate DATE NOT NULL",
    "status ENUM ('active', 'inactive', 'pending') NOT NULL",
    "visibility BOOLEAN DEFAULT true NOT NULL",
    
    "FOREIGN KEY (genreId) REFERENCES genre(genraId)",
    "FOREIGN KEY (developerId) REFERENCES descriptor(descriptorId)",
    
];

$databaseCreator->createTable("game", $gameFields);

$wish_listFields = [
    "wishListId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (userId) REFERENCES user(userId)"
];

$databaseCreator->createTable("wish_list", $wish_listFields);

$wish_list_itemFields = [
    "wishListItemId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (wishListId) REFERENCES wish_list(wishListId)",
    "FOREIGN KEY (gameId) REFERENCES game(gameId)",

];

$databaseCreator->createTable("wish_list_item", $wish_list_itemFields);

$releaseFields = [
    "releaseId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (userId) REFERENCES user(userId)",
    "FOREIGN KEY (gameId) REFERENCES game(gameId)",

];

$databaseCreator->createTable("release", $releaseFields);

$ratingFields = [
    "ratingId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (userId) REFERENCES user(userId)",
    "FOREIGN KEY (gameId) REFERENCES game(gameId)",

];

$databaseCreator->createTable("rating", $ratingFields);

$reviewFields = [
    "reviewId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (userId) REFERENCES user(userId)",
    "FOREIGN KEY (gameId) REFERENCES game(gameId)",

];

$databaseCreator->createTable("review", $reviewFields);

$game_platformFields = [
    "gameplatformId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (userId) REFERENCES user(userId)",
    "FOREIGN KEY (platformId) REFERENCES platform(platformId)",

];

$databaseCreator->createTable("game_platform", $game_platformFields);


$game_tagFields = [
    "gametagId INT AUTO_INCREMENT PRIMARY KEY",
    "FOREIGN KEY (gameId) REFERENCES game(gameId)",
    "FOREIGN KEY (tagId) REFERENCES tag(tagId)",

];

$databaseCreator->createTable("game_tag", $game_tagFields);


$databaseCreator->closeConnection();
?>
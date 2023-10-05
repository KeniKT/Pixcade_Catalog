<?php
require_once 'dbcreator.php';

$localhost = "localhost";
$username = "root";
$password = "";
$databaseName = "script";

$databaseCreator = new DatabaseCreator($localhost, $username, $password, $databaseName);

$usersFields = [
    "userId INT AUTO_INCREMENT PRIMARY KEY",
    "firstName VARCHAR(30) NOT NULL",
    "lastName VARCHAR(30) NOT NULL",
    "email VARCHAR(50) NOT NULL UNIQUE",
    "password VARCHAR(255) NOT NULL",
    "dateOfBirth DATE NOT NULL",
    "displayName VARCHAR(50) NOT NULL",
    "profilePicture VARCHAR(100)",
    "userType ENUM ('Developer', 'Gamer') NOT NULL",
    "externalLink VARCHAR(100)",
    "profileText TEXT",
];

$databaseCreator->createTable("users", $usersFields);

$tagFields = [
    "tagId INT AUTO_INCREMENT PRIMARY KEY",
];

$databaseCreator->createTable("tag", $tagFields);

$descriptorFields = [
    "descriptorId INT AUTO_INCREMENT PRIMARY KEY",
    "name VARCHAR(50) NOT NULL",
    "description TEXT",
];

$databaseCreator->createTable("descriptor", $descriptorFields);

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
    "releaseDate DATE NOT NULL",
    "banner VARCHAR(100)",
    "genreId INT, FOREIGN KEY (genreId) REFERENCES genre(genreId)",
    "developerId INT, FOREIGN KEY (developerId) REFERENCES users(userId)",
];

$databaseCreator->createTable("game", $gameFields);

$wishlistFields = [
    "wishlistId INT AUTO_INCREMENT PRIMARY KEY",
    "userId INT, FOREIGN KEY (userId) REFERENCES users(userId)",
];

$databaseCreator->createTable("wishlist", $wishlistFields);

$wishlistItemFields = [
    "wishlistItemId INT AUTO_INCREMENT PRIMARY KEY",
    "wishlistId INT, FOREIGN KEY (wishlistId) REFERENCES wishlist(wishlistId)",
    "gameId INT, FOREIGN KEY (gameId) REFERENCES game(gameId)",
];

$databaseCreator->createTable("wishlist_item", $wishlistItemFields);

$releaseFields = [
    "releaseId INT AUTO_INCREMENT PRIMARY KEY",
    "userId INT, FOREIGN KEY (userId) REFERENCES users(userId)",
    "gameId INT, FOREIGN KEY (gameId) REFERENCES game(gameId)",
];

$databaseCreator->createTable("releases", $releaseFields);

$ratingFields = [
    "ratingId INT AUTO_INCREMENT PRIMARY KEY",
    "ratingValue FLOAT NOT NULL",
    "userId INT, FOREIGN KEY (userId) REFERENCES users(userId)",
    "gameId INT, FOREIGN KEY (gameId) REFERENCES game(gameId)",
];

$databaseCreator->createTable("rating", $ratingFields);

$reviewFields = [
    "reviewId INT AUTO_INCREMENT PRIMARY KEY",
    "userId INT, FOREIGN KEY (userId) REFERENCES users(userId)",
    "gameId INT, FOREIGN KEY (gameId) REFERENCES game(gameId)",
];

$databaseCreator->createTable("review", $reviewFields);

$gamePlatformFields = [
    "gamePlatformId INT AUTO_INCREMENT PRIMARY KEY",
    "userId INT, FOREIGN KEY (userId) REFERENCES users(userId)",
    "platformId INT, FOREIGN KEY (platformId) REFERENCES platform(platformId)",
];

$databaseCreator->createTable("game_platform", $gamePlatformFields);

$gameTagFields = [
    "gameTagId INT AUTO_INCREMENT PRIMARY KEY",
    "gameId INT, FOREIGN KEY (gameId) REFERENCES game(gameId)",
    "tagId INT, FOREIGN KEY (tagId) REFERENCES tag(tagId)",
];

$databaseCreator->createTable("game_tag", $gameTagFields);

$screenshotFields = [
    "screenshotID INT AUTO_INCREMENT PRIMARY KEY",
    "image VARCHAR(100) NOT NULL",
    "gameId INT, FOREIGN KEY (gameId) REFERENCES game(gameId)",
];

$databaseCreator->createTable("screenshot", $screenshotFields);

$databaseCreator->closeConnection();
?>

<?php
class UserController{

public static function getUserByEmail($databaseCreator, $email)
{
    $conn = $databaseCreator->getConnection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Create a User instance from the retrieved data
        $user = new User(
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['password'],
            $row['dateOfBirth'],
            $row['displayName'],
            $row['userType'],
            $row['externalLink'],
            $row['profileText']
        );

        $user->setId($row['id']); // Set the user's ID

        return $user;
    } else {
        return null;
    }
}
}
?>

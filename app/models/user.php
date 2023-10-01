<?php
class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $dateOfBirth;
    private $displayName;
    private $userType;
    private $externalLink;
    private $profileText;
    private $lastError;


    public function __construct($firstName, $lastName, $email,$password, $dateOfBirth, $displayName, $userType, $externalLink=null, $profileText=null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password =$password;
        $this->dateOfBirth = $dateOfBirth;
        $this->displayName = $displayName;
        $this->userType = $userType;
        $this->externalLink = $externalLink;
        $this->profileText = $profileText;
    }


    public function emailExists($databaseCreator)
    {
        $email = $this->email;
        $conn = $databaseCreator->getConnection();

        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $count = $stmt->num_rows;
        $stmt->close();

        return $count > 0;
    }

    public function userNameExists($databaseCreator)
    {
        $displayName = $this->displayName;
        $conn = $databaseCreator->getConnection();

        $stmt = $conn->prepare("SELECT displayName FROM users WHERE displayName = ?");
        $stmt->bind_param("s", $displayName);
        $stmt->execute();
        $stmt->store_result();
        $count = $stmt->num_rows;
        $stmt->close();

        return $count > 0;
    }

    public function insertUser($databaseCreator)
    {
        $conn = $databaseCreator->getConnection();

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, dateOfBirth, displayName, userType, externalLink, profileText, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $this->firstName, $this->lastName, $this->email, $this->dateOfBirth, $this->displayName, $this->userType, $this->externalLink, $this->profileText, $this->password);

        if ($stmt->execute()) {
            return true;
        } else {
            $this->lastError = $stmt->error;
            return false;
        }
    }

    public function getLastError()
    {
        return $this->lastError;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getLasttName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getdateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function setdateOfBirth($dateOfBirth)
    {
        $this->$dateOfBirth = $dateOfBirth;
    }
    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setDisplayName($displayName)
    {
        $this->$displayName = $displayName;
    }
    public function getUserType()
    {
        return $this->userType;
    }

    public function setUserType($userType)
    {
        $this->userType = $$userType;
    }
    public function getExternalLink()
    {
        return $this->externalLink;
    }

    public function setExternalLink($externalLink)
    {
        $this->externalLink = $$externalLink;
    }
    public function getProfileText()
    {
        return $this->profileText;
    }

    public function setProfileText($profileText)
    {
        $this->profileText = $$profileText;
    }


}
?>


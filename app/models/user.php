<?php
class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $dateOfBirth;
    private $userName;
    private $userType;
    private $externalLink;
    private $profileText;

    public function __construct($firstName, $lastName, $email, $dateOfBirth, $userName, $userType, $externalLink=null, $profileText=null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->dateOfBirth = $dateOfBirth;
        $this->userName = $userName;
        $this->userType = $userType;
        $this->externalLink = $externalLink;
        $this->profileText = $profileText;
    }

    public function getId()
    {
        return $this->id;
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
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->$dateOfBirth = $dateOfBirth;
    }
    public function getDisplayName()
    {
        return $this->userName;
    }

    public function setDisplayName($userName)
    {
        $this->$userName = $userName;
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


<?php
class Review
{
    private $id;
    private $userId;
    private $gameId;
    private $reviewText;
    private $reviewDate;

    function __construct($userId, $gameId, $reviewText, $reviewDate)
    {
        $this->userId = $userId;
        $this->gameId = $gameId;
        $this->reviewText = $reviewText;
        $this->reviewDate = $reviewDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    public function getReviewText()
    {
        return $this->reviewText;
    }

    public function setReviewText($reviewText)
    {
        $this->reviewText = $reviewText;
    }

    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    public function setReviewDate($reviewDate)
    {
        $this->reviewDate = $reviewDate;
    }


}

?>


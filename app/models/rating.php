<?php
class Rating
{
    private $id;
    private $userId;
    private $gameId;
    private $ratingValue;

    function __construct($userId, $gameId, $ratingValue)
    {
        $this->userId = $userId;
        $this->gameId = $gameId;
        $this->ratingValue = $ratingValue;
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

    public function getRatingValue()
    {
        return $this->ratingValue;
    }

    public function setRatingValue($ratingValue)
    {
        $this->ratingValue = $ratingValue;
    }

}

?>


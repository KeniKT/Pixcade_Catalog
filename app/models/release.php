<?php
class Release
{
    private $id;
    private $gameId;
    private $userId;

    function __construct($gameId, $userId)
    {
        $this->gameId = $gameId;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

}
?>


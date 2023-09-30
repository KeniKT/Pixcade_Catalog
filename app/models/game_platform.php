<?php
class GamePlatform
{
    private $id;
    private $gameId;
    private $platformId;

    function __construct($gameId, $platformId)
    {
        $this->gameId = $gameId;
        $this->platformId = $platformId;
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

    public function getPlatformId()
    {
        return $this->platformId;
    }

    public function setPlatformId($platformId)
    {
        $this->platformId = $platformId;
    }

}
?>


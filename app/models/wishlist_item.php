<?php
class WishlistItem
{
    private $id;
    private $wishlistId;
    private $gameId;

    function __construct($wishlistId, $gameId)
    {
        $this->wishlistId = $wishlistId;
        $this->gameId = $gameId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getWishlistId()
    {
        return $this->wishlistId;
    }

    public function setWishlistId($wishlistId)
    {
        $this->wishlistId = $wishlistId;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

}

?>


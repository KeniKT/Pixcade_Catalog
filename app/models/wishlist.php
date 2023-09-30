<?php

class Wishlist
{
    private $id;
    private $userId;
    // This array is used to store wishlist items for that specific user wishlist
    private $wishlistItems = [];

    function __construct($userId)
    {
        $this->userId = $userId;
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
    // use this to add wishlist item to the user specific wishlist
    public function addWishlistItem(WishlistItem $wishlistItem)
    {
        $this->wishlistItems[] = $wishlistItem;
    }
    // this one to retreive all wishlist item of users' wishlist
    public function getWishlistItems()
    {
        return $this->wishlistItems;
    }


}

?>


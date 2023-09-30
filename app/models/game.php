<?php
class Game
{
    private $id;
    private $title;
    private $caption;
    private $description;
    private $price;
    private $discount;
    private $releaseDate;
    private $status;
    private $visibility;
    private $genreId;
    private $userId;
    function __construct(
        $title,
        $caption,
        $description,
        $price,
        $discount,
        $releaseDate,
        $status,
        $visibility,
        $genreId,
        $userId
    ) {
        $this->title = $title;
        $this->caption = $caption;
        $this->description = $description;
        $this->price = $price;
        $this->discount = $discount;
        $this->releaseDate = $releaseDate;
        $this->status = $status;
        $this->visibility = $visibility;
        $this->genreId = $genreId;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getCaption()
    {
        return $this->caption;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getVisibility()
    {
        return $this->visibility;
    }

    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    public function getGenreId()
    {
        return $this->genreId;
    }

    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
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


<?php
class GameTag
{
    private $id;
    private $genreId;
    private $tagId;

    function __construct($genreId, $tagId)
    {
        $this->genreId = $genreId;
        $this->tagId = $tagId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGenreId()
    {
        return $this->genreId;
    }

    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }

    public function getTagId()
    {
        return $this->tagId;
    }

    public function setTagId($tagId)
    {
        $this->tagId = $tagId;
    }

}
?>


<?php
class Screenshot{
    private $id;
    private $gameId;
    private $image;

    function __construct($gameId, $image)
    {
        $this->gameId = $gameId;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }
}
?>

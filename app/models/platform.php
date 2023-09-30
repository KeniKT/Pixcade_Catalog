<?php
class Platform extends Descriptors{
    private $id;

    public function __construct($name,$description=null){
        parent::__construct($name, $description);
    }

    public function getId(){
        return $this->id;
    }

}
?>

<?php
class Descriptors{
    private $id;
    private $name;
    private $description;

    public function __construct($name, $description=null){
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setDescription($description){
        $this->description = $description;
    }
}
?>

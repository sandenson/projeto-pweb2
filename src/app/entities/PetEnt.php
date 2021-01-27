<?php
class PetEnt {
  private $name;
  private $description;
  private $type;

  public function __construct($name, $description, $type){
    $this->name = $name;
    $this->description = $description;
    $this->type = $type;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function getDescription(){
    return $this->description;
  }
  
  public function setDescription($description){
    $this->description = $description;
  }

  public function getType(){
    return $this->type;
  }

  public function setType($type){
    $this->type = $type;
  }
}

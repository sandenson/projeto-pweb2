<?php namespace Pet;
  class Pet {
    private $name;
    private $description;
    private $type;
    private $isAdopted;
    private $adoptedBy;

    public function __construct($name, $description, $type, $isAdopted, $adoptedBy){
      $this->name = $name;
      $this->description = $description;
      $this->type = $type;

      if(!($isAdopted && $adoptedBy)) {
        $this->isAdopted = false;
        $this->adoptedBy = null;
      }

      $this->adoptedBy = $adoptedBy;
      $this->isAdopted = $isAdopted;
    }

    public function setName($name){
      $this->name = $name;
    }

    public function getName(){
      return $this->name;
    }

    public function setDescription($description){
      $this->description = $description;
    }

    public function getDescription(){
      return $this->description;
    }

    public function setType($type){
      $this->type = $type;
    }

    public function getType(){
      return $this->type;
    }

    public function setIsAdopted($isAdopted){
      $this->isAdopted = $isAdopted;
    }

    public function getIsAdopted(){
      return $this->isAdopted;
    }

    public function setAdoptedBy($adoptedBy){
      $this->adoptedBy = $adoptedBy;
    }

    public function getAdoptedBy(){
      return $this->adoptedBy;
    }

    public static function findAll() {
  
    }

    public static function findByPk() {
  
    }

    public static function findByUsername() {
  
    }

    public static function findByEmail() {
  
    }

    public function create() {
  
    }

    public function update() {
  
    }
    
    public function delete() {
  
    }
  }
?>
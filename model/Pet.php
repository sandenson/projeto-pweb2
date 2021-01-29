<?php
  require_once "database/database.php";

  class Pet {
    private $name;
    private $description;
    private $type;
    private $sex;
    private $registeredBy;
    private $isAdopted;
    private $adoptedBy;

    public function __construct($name, $description, $type, $sex, $registeredBy, $isAdopted){
      $this->name = $name;
      $this->description = $description;
      $this->type = $type;
      $this->sex = $sex;
      $this->registeredBy = $registeredBy;
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

    public function setSex($sex){
      $this->sex = $sex;
    }

    public function getSex(){
      return $this->sex;
    }
    
    public function setRegisteredBy($registeredBy){
      $this->registeredBy = $registeredBy;
    }

    public function getRegisteredBy(){
      return $this->registeredBy;
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

    public static function findAll($filter) {
      $conn = DbConnection::getConnection();

      if ($filter == "Todos") {
        try {
          $query = $conn->prepare("SELECT * FROM `pets`");
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"], $resPet["adoptedBy"]);

            array_push($pets, $pet);
          }

          return isset($pets) ? $pets : null;
        } catch (\PDOException $e) {
          return null;
        }
      }

      else if ($filter == "Adotados") {
        try {
          $query = $conn->prepare("SELECT * FROM `pets` WHERE `isAdopted` = TRUE");
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"], $resPet["adoptedBy"]);

            array_push($pets, $pet);
          }

          return isset($pets) ? $pets : null;
        } catch (\PDOException $e) {
          return null;
        }
      }

      else if ($filter == "Esperando por adoção") {
        try {
          $query = $conn->prepare("SELECT * FROM `pets` WHERE `isAdopted` = FALSE");
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"], $resPet["adoptedBy"]);

            array_push($pets, $pet);
          }

          return isset($pets) ? $pets : null;
        } catch (\PDOException $e) {
          return null;
        }
      }
    }

    public static function findByRegisterer($username) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT * FROM `pets` WHERE `registeredBy` = ?");
        $query->execute([$username]);

        $result = $query->fetchAll();

        $pets = array();

        forEach($result as $resPet) {
          $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"], $resPet["adoptedBy"]);

          array_push($pets, $pet);
        }

        return isset($pets) ? $pets : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public function create() {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("INSERT INTO `pets` (`name`, `description`, `type`, `sex`, `registeredBy`) VALUES (?,?,?,?,?)");
        $query->execute([
          $this->name,
          $this->description,
          $this->type,
          $this->sex,
          $this->registeredBy
        ]);
      } catch (PDOException $e) {
        return null;
      }
    }

    public function update() {
  
    }
    
    public function delete() {
  
    }
  }
?>
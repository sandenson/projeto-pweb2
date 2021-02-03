<?php
  require_once "database/database.php";

  class Pet {
    private $id;
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

    public function setId($id){
      $this->id = $id;
    }

    public function getId(){
      return $this->id;
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
      $loggedUser = $_SESSION["loggedUser"];

      if ($filter == "Todos") {
        try {
          $query = $conn->prepare("SELECT * FROM `pets`");
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
            $pet->setId($resPet["id"]);

            if ($resPet["isAdopted"]) {
              $pet->setAdoptedBy($resPet["adoptedBy"]);
            }

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
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
            $pet->setId($resPet["id"]);
            $pet->setAdoptedBy($resPet["adoptedBy"]);

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
            $pet->setId($resPet["id"]);

            array_push($pets, $pet);
          }

          return isset($pets) ? $pets : null;
        } catch (\PDOException $e) {
          return null;
        }
      }
    }

    public static function findByPk($id) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT * FROM `pets` WHERE `id` = ?");
        $query->execute([$id]);
        $result = $query->fetch();

        $pet = new Pet($result["name"], $result["description"], $result["type"], $result["sex"], $result["registeredBy"], $result["isAdopted"]);

        return isset($pet) ? $pet : null;
      } catch (\PDOException $e) {
        return null;
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
          $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
          $pet->setId($resPet["id"]);

          if ($resPet["isAdopted"]) {
            $pet->setAdoptedBy($resPet["adoptedBy"]);
          }

          array_push($pets, $pet);
        }

        return isset($pets) ? $pets : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public static function findByAdopter($username) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT * FROM `pets` WHERE `adoptedBy` = ?");
        $query->execute([$username]);

        $result = $query->fetchAll();

        $pets = array();

        forEach($result as $resPet) {
          $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
          $pet->setId($resPet["id"]);
          $pet->setAdoptedBy($resPet["adoptedBy"]);

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

        $query2 = $conn->prepare("SELECT `id` FROM `pets` WHERE `name` = ? AND `description` = ? AND `type` = ? AND `sex` = ? AND `registeredBy` = ?");
        $query2->execute([
          $this->name,
          $this->description,
          $this->type,
          $this->sex,
          $this->registeredBy
        ]);

        $result = $query2->fetch();
        
        return $result["id"];
      } catch (PDOException $e) {
        return null;
      }
    }

    public function update($id) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("UPDATE `pets` SET `name` = ?, `description` = ? WHERE `id` = ?");
        $query->execute([
          $this->name,
          $this->description,
          $id
        ]);
      } catch (\PDOException $e) {
        return null;
      }
    }
    
    public static function delete($petId) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("DELETE FROM `pets` WHERE `id` = ?");
        $query->execute([$petId]);
      } catch (PDOException $e) {
        return null;
      }
    }

    public static function adopt($petId) {
      $conn = DbConnection::getConnection();
      $loggedUser = $_SESSION["loggedUser"];

      try {
        $query = $conn->prepare("UPDATE `pets` SET `adoptedBy` = ?, `isAdopted` = TRUE WHERE `id` = ?");
        $query->execute([
          $loggedUser->username,
          $petId
        ]);
      } catch (PDOException $e) {
        return null;
      }
    }
  }
?>
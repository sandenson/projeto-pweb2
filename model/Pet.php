<?php
  require_once "database/database.php";
  require_once "model/PetImg.php";

  class Pet {
    private $id;
    private $name;
    private $description;
    private $type;
    private $sex;
    private $registeredBy;
    private $isAdopted;
    private $adoptedBy;
    private $adoptionLocation;

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

    public function setAdoptionLocation($adoptionLocation){
      $this->adoptionLocation = $adoptionLocation;
    }

    public function getAdoptionLocation(){
      return $this->adoptionLocation;
    }

    public static function findAll($filter, $page) {
      $conn = DbConnection::getConnection();
      $loggedUser = $_SESSION["loggedUser"];

      $offset = ($page - 1) * 20;

      if ($filter == "1") {
        try {
          $query = $conn->prepare("SELECT COUNT(`id`) AS `pages` FROM `pets`");
          $query->execute();
          $result = $query->fetch();
          $pages = intval(ceil($result["pages"] / 20));

          $query = $conn->prepare("SELECT `pets`.`id`, `pets`.`name`, `pets`.`description`, `pets`.`type`, `pets`.`sex`, `pets`.`isAdopted`, `pets`.`adoptedBy`, `pets`.`registeredBy`, `pets_imgs`.`name` AS 'image' FROM `pets` LEFT JOIN `pets_imgs` ON `pets_imgs`.`petId` = `pets`.`id` LIMIT 20 OFFSET ".$offset);
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
            $pet->setId($resPet["id"]);
            $pet->image = $resPet["image"];

            if ($resPet["isAdopted"]) {
              $pet->setAdoptedBy($resPet["adoptedBy"]);
            }

            array_push($pets, $pet);
          }

          return isset($pets) ? [$pets, $pages] : null;
        } catch (\PDOException $e) {
          return null;
        }
      }

      else if ($filter == "2") {
        try {
          $query = $conn->prepare("SELECT COUNT(`id`) AS `pages` FROM `pets` WHERE `pets`.`isAdopted` = TRUE");
          $query->execute();
          $result = $query->fetch();
          $pages = intval(ceil($result["pages"] / 20));

          $query = $conn->prepare("SELECT `pets`.`id`, `pets`.`name`, `pets`.`description`, `pets`.`type`, `pets`.`sex`, `pets`.`isAdopted`, `pets`.`adoptedBy`, `pets`.`registeredBy`, `pets_imgs`.`name` AS 'image' FROM `pets` LEFT JOIN `pets_imgs` ON `pets_imgs`.`petId` = `pets`.`id` WHERE `pets`.`isAdopted` = TRUE LIMIT 20 OFFSET ".$offset);
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
            $pet->setId($resPet["id"]);
            $pet->setAdoptedBy($resPet["adoptedBy"]);
            $pet->image = $resPet["image"];

            array_push($pets, $pet);
          }

          return isset($pets) ? [$pets, $pages] : null;
        } catch (\PDOException $e) {
          return null;
        }
      }

      else if ($filter == "3") {
        try {
          $query = $conn->prepare("SELECT COUNT(`id`) AS `pages` FROM `pets` WHERE `pets`.`isAdopted` = FALSE");
          $query->execute();
          $result = $query->fetch();
          $pages = intval(ceil($result["pages"] / 20));

          $query = $conn->prepare("SELECT `pets`.`id`, `pets`.`name`, `pets`.`description`, `pets`.`type`, `pets`.`sex`, `pets`.`isAdopted`, `pets`.`adoptedBy`, `pets`.`registeredBy`, `pets_imgs`.`name` AS 'image' FROM `pets` LEFT JOIN `pets_imgs` ON `pets_imgs`.`petId` = `pets`.`id` WHERE `pets`.`isAdopted` = FALSE LIMIT 20 OFFSET ".$offset);
          $query->execute();

          $result = $query->fetchAll();

          $pets = array();

          forEach($result as $resPet) {
            $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"], $resPet["adoptedBy"]);
            $pet->setId($resPet["id"]);
            $pet->image = $resPet["image"];

            array_push($pets, $pet);
          }

          return isset($pets) ? [$pets, $pages] : null;
        } catch (\PDOException $e) {
          return null;
        }
      }
    }

    public static function findByPk($id) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT `pets`.`id`, `pets`.`name`, `pets`.`description`, `pets`.`type`, `pets`.`sex`, `pets`.`isAdopted`, `pets`.`adoptedBy`, `pets`.`registeredBy`, `pets`.`adoptionLocation`, `pets_imgs`.`name` AS 'image' FROM `pets` LEFT JOIN `pets_imgs` ON `pets_imgs`.`petId` = `pets`.`id` WHERE `pets`.`id` = ?");
        $query->execute([$id]);
        $result = $query->fetch();

        $pet = new Pet($result["name"], $result["description"], $result["type"], $result["sex"], $result["registeredBy"], $result["isAdopted"]);
        $pet->setId($id);
        $pet->setAdoptionLocation($result["adoptionLocation"]);
        $pet->setAdoptedby($result["adoptedBy"]);
        $pet->image = $result["image"];

        return isset($pet) ? $pet : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public static function findByRegisterer($username, $page) {
      $conn = DbConnection::getConnection();

      $offset = ($page - 1) * 20;

      try {
        $query = $conn->prepare("SELECT COUNT(`id`) AS `pages` FROM `pets` WHERE `pets`.`isAdopted` = FALSE");
        $query->execute();
        $result = $query->fetch();
        $pages = intval(ceil($result["pages"] / 20));

          
        $query = $conn->prepare("SELECT `pets`.`id`, `pets`.`name`, `pets`.`description`, `pets`.`type`, `pets`.`sex`, `pets`.`isAdopted`, `pets`.`adoptedBy`, `pets`.`registeredBy`, `pets_imgs`.`name` AS 'image' FROM `pets` LEFT JOIN `pets_imgs` ON `pets_imgs`.`petId` = `pets`.`id` WHERE `pets`.`registeredBy` = ? LIMIT 20 OFFSET ".$offset);
        $query->execute([$username]);

        $result = $query->fetchAll();

        $pets = array();

        forEach($result as $resPet) {
          $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["registeredBy"], $resPet["isAdopted"]);
          $pet->setId($resPet["id"]);
          $pet->image = $resPet["image"];

          if ($resPet["isAdopted"]) {
            $pet->setAdoptedBy($resPet["adoptedBy"]);
          }

          array_push($pets, $pet);
        }

        return isset($pets) ? [$pets, $pages] : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public static function findByAdopter($username, $page) {
      $conn = DbConnection::getConnection();

      $offset = ($page - 1) * 20;

      try {$query = $conn->prepare("SELECT COUNT(`id`) AS `pages` FROM `pets` WHERE `pets`.`isAdopted` = FALSE");
        $query->execute();
        $result = $query->fetch();
        $pages = intval(ceil($result["pages"] / 20));

        $query = $conn->prepare("SELECT `pets`.`id`, `pets`.`name`, `pets`.`description`, `pets`.`type`, `pets`.`sex`, `pets`.`isAdopted`, `pets`.`adoptedBy`, `pets`.`adoptedBy`, `pets_imgs`.`name` AS 'image' FROM `pets` LEFT JOIN `pets_imgs` ON `pets_imgs`.`petId` = `pets`.`id` WHERE `pets`.`adoptedBy` = ? LIMIT 20 OFFSET ".$offset);
        $query->execute([$username]);

        $result = $query->fetchAll();

        $pets = array();

        forEach($result as $resPet) {
          $pet = new Pet($resPet["name"], $resPet["description"], $resPet["type"], $resPet["sex"], $resPet["adoptedBy"], $resPet["isAdopted"]);
          $pet->setId($resPet["id"]);
          $pet->image = $resPet["image"];

          if ($resPet["isAdopted"]) {
            $pet->setAdoptedBy($resPet["adoptedBy"]);
          }

          array_push($pets, $pet);
        }

        return isset($pets) ? [$pets, $pages] : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public function create() {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("INSERT INTO `pets` (`name`, `description`, `type`, `sex`, `registeredBy` , `adoptionLocation`) VALUES (?,?,?,?,?,?)");
        $query->execute([
          $this->name,
          $this->description,
          $this->type,
          $this->sex,
          $this->registeredBy,
          $this->adoptionLocation
        ]);

        $query2 = $conn->prepare("SELECT `id` FROM `pets` WHERE `name` = ? AND `description` = ? AND `type` = ? AND `sex` = ? AND `registeredBy` = ? AND `adoptionLocation` = ?");
        $query2->execute([
          $this->name,
          $this->description,
          $this->type,
          $this->sex,
          $this->registeredBy,
          $this->adoptionLocation
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
        $query = $conn->prepare("UPDATE `pets` SET `name` = ? , `description` = ? , `adoptionLocation` = ? WHERE `id` = ?");
        $query->execute([
          $this->name,
          $this->description,
          $this->adoptionLocation,
          $id
        ]);
      } catch (\PDOException $e) {
        return null;
      }
    }
    
    public static function delete($petId) {
      $conn = DbConnection::getConnection();

      try {
        PetImg::delete($petId);

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
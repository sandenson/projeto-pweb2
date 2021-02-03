<?php
  require_once "database/database.php";

  class PetImg {
    private $petId;
    private $name;

    public function __construct($petId, $name){
      $this->petId = $petId;
      $this->name = $name;
    }

    public function setPetId($petId){
      $this->petId = $petId;
    }

    public function getPetId(){
      return $this->petId;
    }

    public function setName($name){
      $this->name = $name;
    }

    public function getName(){
      return $this->name;
    }

    public static function findByPk($petId) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT `name` FROM `pets_imgs` WHERE `petId` = ?");
        $query->execute([$petId]);
        $imgName = $query->fetch();

        return isset($imgName) ? $imgName : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public function create() {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("INSERT INTO `pets_imgs` (`petId`, `name`) VALUES (?,?)");
        $query->execute([
          $this->petId,
          $this->name
        ]);
      } catch (PDOException $e) {
        return null;
      }
    }

    public function update($petId) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("UPDATE `pets_imgs` SET `name` = ? WHERE `petId` = ?");
        $query->execute([
          $petId,
          $this->name
        ]);
      } catch (\PDOException $e) {
        return null;
      }
    }
    
    public static function delete($petId) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("DELETE FROM `pets_imgs` WHERE `petId` = ?");
        $query->execute([$petId]);
      } catch (PDOException $e) {
        return null;
      }
    }
  }
?>
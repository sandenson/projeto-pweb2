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

    public function update() {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT `name` FROM `pets_imgs` WHERE `petId` = ?");
        $query->execute([$this->petId]);
        $oldImgName = $query->fetch();
      } catch (\PDOException $e) {
        return null;
      }

      try {
        if ($oldImgName){
          $query = $conn->prepare("UPDATE `pets_imgs` SET `name` = ? WHERE `petId` = ?");
          $query->execute([
            $this->name,
            $this->petId
          ]);

          if ($oldImgName) {
            unlink("uploads/img/".$oldImgName["name"]);
          }
        }

        $query = $conn->prepare("INSERT INTO `pets_imgs` (`petId`, `name`) VALUES (?,?)");
        $query->execute([
          $this->petId,
          $this->name
        ]);
      } catch (\PDOException $e) {
        return null;
      }
    }
    
    public static function delete($petId) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT `name` FROM `pets_imgs` WHERE `petId` = ?");
        $query->execute([$petId]);
        $oldImgName = $query->fetch();

        unlink("uploads/img/".$oldImgName["name"]);
      } catch (\PDOException $e) {
        return null;
      }

      try {
        $query = $conn->prepare("DELETE FROM `pets_imgs` WHERE `petId` = ?");
        $query->execute([$petId]);
      } catch (PDOException $e) {
        return null;
      }
    }
  }
?>
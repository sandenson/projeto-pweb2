<?php
require_once "database/database.php";

class Img
{
  private $petId;
  private $userPk;
  private $name;

  public function __construct($petId, $userPk, $name)
  {
    $this->petId = $petId;
    $this->userPk = $userPk;
    $this->name = $name;
  }

  public function setPetId($petId)
  {
    $this->petId = $petId;
  }

  public function getPetId()
  {
    return $this->petId;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public static function findByPk($pk)
  {
    $conn = DbConnection::getConnection();

    if ($_GET["class"] == "User") $column = "userPk";
    if ($_GET["class"] == "Pet") $column = "petId";

    try {
      $query = $conn->prepare("SELECT `name` FROM `imgs` WHERE `".$column."` = ?");
      $query->execute([$pk]);
      $imgName = $query->fetch();

      return isset($imgName) ? $imgName : null;
    } catch (\PDOException $e) {
      return null;
    }
  }

  public function create()
  {
    $conn = DbConnection::getConnection();

    try {
      $query = $conn->prepare("INSERT INTO `imgs` (`petId`, `userPk`, `name`) VALUES (?,?,?)");
      $query->execute([
        $this->petId,
        $this->userPk,
        $this->name
      ]);
    } catch (PDOException $e) {
      return null;
    }
  }

  public function update()
  {
    $conn = DbConnection::getConnection();

    if ($_GET["class"] == "User") $column = "userPk";
    if ($_GET["class"] == "Pet") $column = "petId";

    try {
      $query = $conn->prepare("SELECT `name` FROM `imgs` WHERE `".$column."` = ?");
      $query->execute([$this->$column]);
      $oldImgName = $query->fetch();
    } catch (\PDOException $e) {
      return null;
    }

    try {
      if ($oldImgName) {
        $query = $conn->prepare("UPDATE `imgs` SET `name` = ? WHERE `".$column."` = ?");
        $query->execute([
          $this->name,
          $this->$column
        ]);

        unlink("uploads/img/" . $oldImgName["name"]);
      }
      else $this->create();
    } catch (\PDOException $e) {
      return null;
    }
  }

  public static function delete($pk)
  {
    $conn = DbConnection::getConnection();

    if ($_GET["class"] == "User") $column = "userPk";
    if ($_GET["class"] == "Pet") $column = "petId";

    try {
      $query = $conn->prepare("SELECT `name` FROM `imgs` WHERE `".$column."` = ?");
      $query->execute([$pk]);
      $oldImgName = $query->fetch();

      unlink("uploads/img/" . $oldImgName["name"]);
    } catch (\PDOException $e) {
      return null;
    }

    try {
      $query = $conn->prepare("DELETE FROM `imgs` WHERE `".$column."` = ?");
      $query->execute([$pk]);
    } catch (PDOException $e) {
      return null;
    }
  }
}

<?php
  require_once('../models/Pet.php');
  require_once('../../config/database.php');
  require_once('./PictureController.php');

  class PetController {
    function storePet($name, $description, $type, $picture) {
      $PictureController = new PictureController();

      $pet = new Pet($name, $description, $type, $picture);

      $petArray = $pet->getPetArray();
      $sql = "INSERT INTO pets (name, description, type) VALUES (?,?,?)";
        
      $id = insertIntoDB($sql, $petArray);

      $PictureController->storePicture($picture, $id);
    }

    // function getPets() {
    //   //listar as parada
    //   include ('../database/DatabaseConnection.php');
    //   $query = "SELECT * from pets";
    //   $resuit = mysqli_query($conexao, $query);
    //   while ($row = mysqli_fetch_array($resuit, MYSQLI_NUM)) {
    //     echo "Id: $row[0]. ";
    //     echo "Nome: $row[1]. ";
    //     echo "Descrição: $row[2]. ";
    //     echo "Tipo: $row[3]. ";
    //     echo "Raça: $row[4]. ";
    //     echo "</br>";
    //   }
    // }
  }
?>

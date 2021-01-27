<?php
  require_once 'PetController.php';

  $petController = new PetController();

  $picture = $_FILES['pictures'];
  
  if(($_POST['name'] != '') && ($_POST['description'] != '') && isset($_POST['type']) && (is_uploaded_file($picture['tmp_name']))){
    $petController->storePet($_POST['name'], $_POST['description'], $_POST['type'], $picture);
  } else {
    echo 'Falha no cadastro' . "<br>". '<a href="../view/html/index.php">Voltar ao início</a>';
  }
?>
<?php
  require_once 'UserController.php';

  $userController = new UserController();
  if(isset($_POST['name']) && isset($_POST['birthday']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['address'])){
    $userController->storeUser($_POST['name'], $_POST['birthday'], $_POST['email'], $_POST['username'], $_POST['address']);
  }
?>
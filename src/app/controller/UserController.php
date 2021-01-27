<?php
  require_once('../models/User.php');
  require_once('../../config/database.php');

  class UserController {
    function storeUser($name, $birthday, $email, $username, $address) {
      $user = new User($name, $birthday, $email, $username, $address);

      $userArray = $user->getUserArray();
      $sql = "INSERT INTO users (name, birthday, email, username, address) VALUES (?,?,?,?,?)";

      insertIntoDB($sql, $userArray);
    }
    function getUsers() {}
  }

  //listar as parada 

// include ('../database/DatabaseConnection.php');
// $query = "SELECT * from users";
// $resuit = mysqli_query($conexao, $query);
// while ($row = mysqli_fetch_array($resuit, MYSQLI_NUM)) {
//   echo "Id: $row[0]. ";
//   echo "Nome: $row[1]. ";
//   echo "Data de Nascimento: $row[2]. ";
//   echo "Email: $row[3]. ";
//   echo "Username: $row[4]. ";
//   echo "Endereco: $row[5]. ";
//   echo "</br>";
// }
?>
<?php
  require_once "database/database.php";

  class SessionController {
    public static function store () {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
        $query->execute([$username, $password]);
        $result = $query->fetch();

        if (!$result) {
          $_SESSION["sessionErrorMessage"] = "Erro de cadastro";

          header("Location: ./");

          return null;
        }

        $_SESSION["loggedUser"] = (object) ['username' => $username, 'name' => $result["name"]];;

        header("Location: ./");
      } catch (\PDOException $e) {
        $_SESSION["sessionErrorMessage"] = "Erro de cadastro";

        header("Location: ./");

        return null;
      }
    }
    
    public static function storeNew ($username, $name) {
      $_SESSION["loggedUser"] = (object) ['username' => $username, 'name' => $name];

      header("Location: ./");
    }

    public function update () {

    }

    public static function delete () {
      $_SESSION["loggedUser"] = null;
      echo $_SESSION["loggedUser"];

      header("Location: ./");
    }

    public function adopt ($id) {
      
    }

    public function put_pet ($id) {

    }
  }
?>
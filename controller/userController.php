<?php namespace UserController;
  include '..\model';
  use User;

  class UserController {
    public static function index () {
      $users = User\User::findAll();

      require_once '../view/usersList.php';
    }

    public static function store () {
      $name = $_POST["name"];
      $birthday = $_POST["birthday"];
      $email = $_POST["email"];
      $username = $_POST["username"];
      $address = $_POST["address"];
      $cpf = $_POST["cpf"];
      $password = $_POST["password"];

      $user = new User\User($name, $birthday, $email, $username, $address, $cpf, $password);
      $result = $user->create();

      if ($result == null) {
        $_SESSION["sessionErrorMessage"] = "Erro de cadastro";
        header("Location: ./");
      }

      $loggedUser = $user->username;
      
      $_SESSION["loggedUser"] = serialize($loggedUser);
      header("Location: ./");
    }

    public function update () {

    }

    public static function delete () {
      $loggedUser = $_SESSION["loggedUser"];

      User\User::delete($loggedUser);

      $_SESSION["loggedUser"] = null;
      header("Location: ./");
    }

    public function adopt ($id) {
      
    }

    public function put_pet ($id) {

    }
?>
<?php
  require_once "model/User.php";
  require_once "controller/SessionController.php";

  class UserController {
    public static function index () {
      $users = User::findAllOthers();

      require_once 'view/usersList/index.php';
    }

    public static function profile () {
      $loggedUser = $_SESSION["loggedUser"];

      $user = User::findByPk($loggedUser->username);

      require_once "view/profile/index.php";
    }

    public static function store () {
      $name = $_POST["name"];
      $birthday = $_POST["birthday"];
      $email = $_POST["email"];
      $username = $_POST["username"];
      $address = $_POST["address"];
      $cpf = $_POST["cpf"];
      $password = $_POST["password"];

      $user = new User($name, $birthday, $email, $username, $address, $cpf, $password);
      $result = $user->create();

      if ($result == null) {
        $_SESSION["sessionErrorMessage"] = "Erro de cadastro";
      }

      SessionController::storeNew($user->getUsername(), $user->getName());
    }

    public function update () {

    }

    public static function delete () {
      $loggedUser = $_SESSION["loggedUser"];

      User::delete($loggedUser->username);

      $_SESSION["loggedUser"] = null;
      header("Location: ./");
    }

    public function adopt ($id) {
      
    }

    public function put_pet ($id) {

    }
  }
?>
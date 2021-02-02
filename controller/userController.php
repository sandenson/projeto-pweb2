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
      if (!isset($_POST["nAddress"]) && !isset($_POST["nCpf"]) && !isset($_POST["nEmail"]) && !isset($_POST["nBirthday"]) && !isset($_POST["nPassword"]) && !isset($_POST["confirmNPassword"])) {
        header("Location: ?class=User&action=profile");
      }

      $conn = DbConnection::getConnection();
      $query = $conn->prepare("SELECT * FROM `users` WHERE `username` = ?");

      $loggedUser = $_SESSION["loggedUser"];

      $query->execute([$loggedUser->username]);
      $result = $query->fetch();

      $address = $_POST["nAddress"] != "" ? $_POST["nAddress"] : $result["address"];
      $cpf = $_POST["nCpf"] != "" ? $_POST["nCpf"] : $result["cpf"];
      $email = $_POST["nEmail"] != "" ? $_POST["nEmail"] : $result["email"];
      $birthday = $_POST["nBirthday"] != "" ? $_POST["nBirthday"] : $result["birthday"];
      $password = ($_POST["nPassword"] != "" && $_POST["confirmNPassword"] != "" && $_POST["nPassword"] == $_POST["confirmNPassword"]) ? $_POST["nPassword"] : $result["password"];

      $user = new User($result["name"], $birthday, $email, $result["username"], $address, $cpf, $password);
      $user->update();

      header("Location: ?class=User&action=profile");
    }

    public static function delete () {
      $loggedUser = $_SESSION["loggedUser"];

      User::delete($loggedUser->username);

      $_SESSION["loggedUser"] = null;
      header("Location: ./");
    }
  }
?>
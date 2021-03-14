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

      if ($_FILES["picture"]["name"] != "") {
        $imgName = date("mdYHis").".".pathinfo($_FILES["picture"]["name"])["extension"];

        $petImg = new Img(null, $username, $imgName);
        $petImg->create();
        
        move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/img/".$imgName);
      }

      SessionController::storeNew($user->getUsername(), $user->getName());
    }

    public function update () {
      if ($_POST["nAddress"] == "" && $_POST["nCpf"] == "" && $_POST["nEmail"] == "" && $_POST["nBirthday"] == "" && $_POST["nPassword"] == "" && $_POST["confirmNPassword"] == "" && $_FILES["nPicture"]["name"] == "") {
        header("Location: ?class=User&action=profile");
      }

      $loggedUser = $_SESSION["loggedUser"];

      $result = User::findByPk($loggedUser->username);

      $address = $_POST["nAddress"] != "" ? $_POST["nAddress"] : $result->getAddress();
      $cpf = $_POST["nCpf"] != "" ? $_POST["nCpf"] : $result->getCpf();
      $email = $_POST["nEmail"] != "" ? $_POST["nEmail"] : $result->getEmail();
      $birthday = $_POST["nBirthday"] != "" ? $_POST["nBirthday"] : $result->getBirthday();
      $password = ($_POST["nPassword"] != "" && $_POST["confirmNPassword"] != "" && $_POST["nPassword"] == $_POST["confirmNPassword"]) ? $_POST["nPassword"] : $result->getPassword();

      $user = new User($result->getName(), $birthday, $email, $result->getUsername(), $address, $cpf, $password);
      $user->update();

      if ($_FILES["nPicture"]["name"] != "") {
        $imgName = date("mdYHis").".".pathinfo($_FILES["nPicture"]["name"])["extension"];

        $petImg = new Img(null, $loggedUser->username, $imgName);
        $petImg->update();

        move_uploaded_file($_FILES["nPicture"]["tmp_name"], "uploads/img/".$imgName);
      }

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
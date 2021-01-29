<?php
  require_once "model/Pet.php";

  class PetController {
    public static function index () {
      $filter = isset($_POST["filter"]) ? $_POST["filter"] : "Todos";

      $pets = Pet::findAll($filter);

      require_once 'view/petsList/index.php';
    }

    public static function indexYours () {
      $loggedUser = $_SESSION["loggedUser"];

      $pets = Pet::findByRegisterer($loggedUser->username);

      require_once 'view/yourPetsList/index.php';
    }

    public static function store () {
      $loggedUser = $_SESSION["loggedUser"];

      $name = $_POST["name"];
      $description = $_POST["description"];
      $type = $_POST["type"];
      $sex = $_POST["sex"];
      $registedBy = $loggedUser->username;

      $pet = new Pet($name, $description, $type, $sex, $registedBy, false);
      $pet->create();

      header("Location: ./");
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
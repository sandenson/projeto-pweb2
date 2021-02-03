<?php
  require_once "model/Pet.php";
  require_once "model/PetImg.php";

  class PetController {
    public static function index () {
      $filter = isset($_POST["filter"]) ? $_POST["filter"] : "Todos";

      $pets = Pet::findAll($filter);

      require_once "view/petsList/index.php";
    }

    public static function indexYourRegistrations () {
      $loggedUser = $_SESSION["loggedUser"];

      $pets = Pet::findByRegisterer($loggedUser->username);

      require_once "view/yourRegisteredPetsList/index.php";
    }

    public static function indexYourAdoptions () {
      $loggedUser = $_SESSION["loggedUser"];

      $pets = Pet::findByAdopter($loggedUser->username);

      require_once "view/yourAdoptedPetsList/index.php";
    }

    public static function indexNotAdopted () {
      $pets = Pet::findAll("Esperando por adoção");

      require_once "view/adopt/index.php";
    }

    public static function store () {
      $loggedUser = $_SESSION["loggedUser"];

      $name = $_POST["name"];
      $description = $_POST["description"];
      $type = $_POST["type"];
      $sex = $_POST["sex"];
      $registedBy = $loggedUser->username;

      $pet = new Pet($name, $description, $type, $sex, $registedBy, false);
      $petId = $pet->create();

      if ($_FILES["picture"]["name"] != "") {
        $imgName = date("mdYHis").".".pathinfo($_FILES["picture"]["name"])["extension"];

        $petImg = new PetImg($petId, $imgName);
        $petImg->create();
        
        move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/img/".$imgName);
      }

      header("Location: ./");
    }

    public function update () {
      if ($_POST["nName"] == "" && $_POST["nDesc"] == "" && $_FILES["nPicture"]["name"] == "") {
        header("Location: ?class=Pet&action=indexYourRegistrations");
      }

      $result = Pet::findByPk($_POST["petId"]);

      $name = $_POST["nName"] != "" ? $_POST["nName"] : $result->getName();
      $desc = $_POST["nDesc"] != "" ? $_POST["nDesc"] : $result->getDescription();

      $pet = new Pet($name, $desc, $result->getType(), $result->getSex(), $result->getRegisteredBy(), $result->getIsAdopted());
      $pet->update($_POST["petId"]);

      if ($_FILES["nPicture"]["name"] != "") {
        $imgName = date("mdYHis").".".pathinfo($_FILES["nPicture"]["name"])["extension"];

        $petImg = new PetImg($_POST["petId"], $imgName);
        $petImg->update();

        move_uploaded_file($_FILES["nPicture"]["tmp_name"], "uploads/img/".$imgName);
      }

      header("Location: ?class=Pet&action=indexYourRegistrations");
    }

    public static function delete () {
      $petId = $_POST["petId"];

      echo $petId;

      Pet::delete($petId);

      header("Location: ?class=Pet&action=indexYourRegistrations");
    }

    public function adopt () {
      $petId = $_POST["petId"];

      Pet::adopt($petId);

      header("Location: ".$_POST["action"]);
    }
  }
?>
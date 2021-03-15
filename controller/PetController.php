<?php
  require_once "model/Pet.php";
  require_once "model/Img.php";
  require_once "utils/watermark.php";

  class PetController {
    public static function index () {
      $filter = isset($_GET["filter"]) ? $_GET["filter"] : "1";
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;

      $pets = Pet::findAll($filter, $page);

      require_once "view/petsList/index.php";
    }

    public static function indexYourRegistrations () {
      $loggedUser = $_SESSION["loggedUser"];
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;

      $pets = Pet::findByRegisterer($loggedUser->username, $page);

      require_once "view/yourRegisteredPetsList/index.php";
    }

    public static function indexYourAdoptions () {
      $loggedUser = $_SESSION["loggedUser"];
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;

      $pets = Pet::findByAdopter($loggedUser->username, $page);

      require_once "view/yourAdoptedPetsList/index.php";
    }

    public static function indexNotAdopted () {
      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      $pets = Pet::findAll("3", $page);

      require_once "view/adopt/index.php";
    }

    public static function petProfile () {
      $pet = Pet::findByPk($_POST["petId"]);

      require_once "view/petProfile/index.php";
    }

    public static function store () {
      $loggedUser = $_SESSION["loggedUser"];

      $name = $_POST["name"];
      $description = $_POST["description"];
      $type = $_POST["type"];
      $sex = $_POST["sex"];
      $adoptionLocation = $_POST["adoptionLocation"];
      $registedBy = $loggedUser->username;

      $pet = new Pet($name, $description, $type, $sex, $registedBy, false);
      $pet->setAdoptionLocation($adoptionLocation);
      $petId = $pet->create();

      if ($_FILES["picture"]["name"] != "") {
        $imgName = date("mdYHis").".".pathinfo($_FILES["picture"]["name"])["extension"];

        $petImg = new Img($petId, null, $imgName);
        $petImg->create();

        WM::getWatermarkedImage($imgName);
      }

      header("Location: ./");
    }

    public function update () {
      if ($_POST["nName"] == "" && $_POST["nDesc"] == "" && $_POST["nAdoptionLocation"] == "" && $_FILES["nPicture"]["name"] == "") {
        header("Location: ?class=Pet&action=indexYourRegistrations");
      }

      $result = Pet::findByPk($_POST["petId"]);

      $name = $_POST["nName"] != "" ? $_POST["nName"] : $result->getName();
      $desc = $_POST["nDesc"] != "" ? $_POST["nDesc"] : $result->getDescription();
      $adoptionLocation = $_POST["nAdoptionLocation"] != "" ? $_POST["nAdoptionLocation"] : $result->getAdoptionLocation();

      $pet = new Pet($name, $desc, $result->getType(), $result->getSex(), $result->getRegisteredBy(), $result->getIsAdopted());
      $pet->setAdoptionLocation($adoptionLocation);
      $pet->update($_POST["petId"]);

      if ($_FILES["nPicture"]["name"] != "") {
        $imgName = date("mdYHis").".".pathinfo($_FILES["nPicture"]["name"])["extension"];

        $petImg = new Img($_POST["petId"], null, $imgName);
        $petImg->update();

        WM::getWatermarkedImage($imgName);
      }

      header("Location: ./");
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

      header("Location: ./");
    }

    public static function ranking () {
      $pets = Pet::listByRanking();
      require_once("view/ranking/index.php");
    }

    public static function report () {
      $pets = Pet::dailyReport($_POST["reportDate"]);

      require_once("mpdf.php");
      // require_once("view/dailyReport/index.php");
    }
  }

?>
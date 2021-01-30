<?php
  session_start();

  if (isset($_GET["view"])) {
    require_once "view/".$_GET["view"]."/index.php";
  }

  else if (isset($_GET["class"]) && isset($_GET["action"])) {
    $controller = $_GET["class"]."Controller";
    $function = $_GET["action"];

    require_once "controller/".$controller.".php";

    $controller = new $controller();
    $controller->$function();
  }

  else if (isset($_SESSION["loggedUser"])) {
    require_once "view/home/index.php";
  }

  else {
    require_once "view/login/index.php";
  }
?>
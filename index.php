<?php
  include "./controller";
  use UserController as UC;

  session_start();

  if (isset($_GET["view"])) {
    require_once "./views/".$_GET["view"]."/index.php";
  }

  if (isset($_GET["class"]) && isset($_GET["action"])) {
    $controller = $_GET["class"]."Controller";
    $function = $_GET["action"];

    require_once "./controller/".$controller.".php";

    $controller = new $controller();
    $controller->$function();
  }

  else if (isset($_SESSION["loggedUser"])) {
    require_once "src/views/MainMenu/index.php";
  }
?>
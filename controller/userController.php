<?php
  include '..\model';
  use User;

  class UserController {
    public function index () {
      $_REQUEST['users'] = User\User::findAll();

      require_once 'view/usersList.php';
    }

    public function store () {

    }

    public function update () {

    }

    public function delete () {}
  }
?>
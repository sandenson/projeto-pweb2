<?php
  include "../repositories/IUserRepository.php";
  use IUserRepository as Repo;
  include "../entities/UserEnt.php";
  use UserEnt as Ent;

  class UserMod extends Ent\UserEnt implements Repo\IUserRepository {
    public function findAll () {
      
    }

    public function findById ($id) {

    }

    public function create (...$data) {

    }

    public function findBy (...$data) {

    }

    public function update (...$data) {

    }

    public function delete () {

    }

    public function adoptPet ($pet_id) {

    }

    public function unadoptPet ($pet_id) {

    }

    public function getAllAdoptedPets () {

    }
  }
?>
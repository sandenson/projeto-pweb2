<?php
  include 'src/app/repositories/IUserRepository.php';
  use IUserRepository;

  class UserRepository implements IUserRepository\IUserRepository {
    public function findAll () {
      
    }

    public function findById ($id) {}

    public function create (...$data) {}
    
    public function findBy (...$data) {}

    public function update (...$data) {}

    public function delete () {}

    public function adoptPet ($pet_id) {}

    public function unadoptPet ($pet_id) {}

    public function getAllAdoptedPets () {}
  }
?>
<?php namespace IUserRepository;
  include 'src\app\repositories\IRepository.php';
  use IRepository;

  interface IUserRepository extends IRepository\IRepository {
    public function adoptPet ($pet_id);
    public function unadoptPet ($pet_id);
    public function getAllAdoptedPets ();
  }
?>
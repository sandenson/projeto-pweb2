<?php namespace UserEnt;
  class UserEnt {
    private $name;
    private $birthday;
    private $email;
    private $username;
    private $address;

    public function __construct($name, $birthday, $email, $username, $address){
      $this->name = $name;
      $this->birthday = $birthday;
      $this->email = $email;
      $this->username = $username;
      $this->address = $address;
    }

    public function setName($name){
      $this->name = $name;
    }

    public function getName(){
      return $this->name;
    }

    public function setBirthday($birthday){
      $this->birthday = $birthday;
    }

    public function getBirthday(){
      return $this->birthday;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setUsername($username){
      $this->username = $username;
    }

    public function getUsername(){
      return $this->username;
    }

    public function setAddress($address){
      $this->address = $address;
    }

    public function getAddress(){
      return $this->address;
    }
  }
?>
<?php
  require_once 'database/database.php';
  
  class User {
    private $name;
    private $birthday;
    private $email;
    private $username;
    private $address;
    private $cpf;

    public function __construct($name, $birthday, $email, $username, $address, $cpf, $password){
      $this->name = $name;
      $this->birthday = $birthday;
      $this->email = $email;
      $this->username = $username;
      $this->address = $address;
      $this->cpf = $cpf;
      $this->password = $password;
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

    public function setPassword($password){
      $this->password = $password;
    }

    public function getPassword(){
      return $this->password;
    }

    public static function findAll() {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT * FROM `users`");
        $query->execute();
        $result = $query->fetchAll();

        $users = array();

        forEach($result as $resUser) {
          $user = new User($resUser["name"], $resUser["birthday"], $resUser["email"], $resUser["username"], $resUser["address"], $resUser["cpf"], $resUser["password"]);

          array_push($users, $user);
        }

        return isset($users) ? $users : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public static function findByPk($username) {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("SELECT * FROM `users` WHERE `username` = ?");
        $query->execute([$username]);
        $result = $query->fetch();

        $user = new User($result["name"], $result["birthday"], $result["email"], $result["username"], $result["address"], $result["cpf"], $result["password"]);

        return isset($user) ? $user : null;
      } catch (\PDOException $e) {
        return null;
      }
    }

    public function create() {
      $conn = DbConnection::getConnection();

      try {
        $query = $conn->prepare("INSERT INTO `users` (`name`, `birthday`, `email`, `username`, `address`, `cpf`, `password`) VALUES (?,?,?,?,?,?,?)");
        $query->execute([
          $this->name,
          $this->birthday,
          $this->email,
          $this->username,
          $this->address,
          $this->cpf,
          $this->password
        ]);
      } catch (\PDOException $e) {
        return null;
      }
    }

    public function update() {
      
    }
    
    public static function delete($username) {
      $conn = DbConnection::getConnection();
      echo $username;

      try {
        $query = $conn->prepare("DELETE FROM `users` WHERE `username` = ?");
        $query->execute([$username]);
      } catch (\PDOException $e) {
        return null;
      }
    }
  }
?>
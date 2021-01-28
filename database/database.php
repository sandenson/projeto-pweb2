<?php
  class DbConnection {
    public static function getConnection () {
      $servername = "localhost";
      $username = "root";
      $password = "root";

      $conn = new PDO("mysql:host=$servername;dbname=projeto_pweb_sbll", $username, $password);

      return $conn;
    }
  }

  // function insertIntoDB($query, $data) {
  //   $servername = "localhost";
  //   $username = "root";
  //   $password = "root";

  //   try {
  //     $conn = new PDO("mysql:host=$servername;dbname=projeto_pweb_sbll", $username, $password);
  //     // set the PDO error mode to exception
  //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //     echo '<a href="../view/html/index.php">Voltar ao início</a>';
  //     try {
  //       $conn->prepare($query)->execute($data);
  //       return $conn->lastInsertId();
  //     } catch(PDOException $e) {
  //       echo "Insertion failed: " . $e->getMessage() . "\n" . $query;
  //     }

  //   } catch(PDOException $e) {
  //     echo "Connection failed: " . $e->getMessage();
  //   }
  // }
?>
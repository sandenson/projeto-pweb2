<?php
  class PictureController {
    public function storePicture($picture, $id) {
      $servername = "localhost";
      $username = "root";
      $password = "root";

      [,$ext] = explode('/', $picture['type']);

      $nomeFinal = '../../../images/'.time().'.'.$ext;

      echo $nomeFinal;

      if (move_uploaded_file($picture['tmp_name'], $nomeFinal)) {
        $tamanhoImg = filesize($nomeFinal);

        $mySqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));
        echo $mySqlImg;

        try {
          $conn = new PDO("mysql:host=$servername;dbname=projeto_pweb_sbll", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          try {
            $query = "INSERT INTO pets_pics(pet_id, image) VALUES(?,?)";

            $conn->prepare($query)->execute([$id, $mySqlImg]);
          } catch(PDOException $e) {
            echo "Insertion failed: " . $e->getMessage() . "\n" . $query;
          }

        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
      }

      $sql = "INSERT INTO pets (name, description, type) VALUES (?,?,?)";
    }
  }
?>
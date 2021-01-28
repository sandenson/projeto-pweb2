<?php
  if(!isset($_SESSION["loggedUser"])) {
    header("Location: ./");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <div style = "display:flex;align-items:center;justify-content:center;">
    <h1>Esta é a home page,
      <?php
        $user = $_SESSION["loggedUser"];
        echo $user->name;
      ?>
    </h1>
    <form style = "margin-left:30vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>

  <div style = "display:flex;align-items:center;justify-content:center;margin-top: 10vh;">
    <div style = "margin-right: 10vw;">
      <form action="?class=Session&action=delete" method="POST">
        <button type="submit">
          Conheça outros usuários
        </button>
      </form>
    </div>

    <div style = "margin-left: 10vw;">
      <form action="?class=Session&action=delete" method="POST">
        <button type="submit">
          Adote um animal
        </button>
      </form>

      <form action="?class=Session&action=delete" method="POST">
        <button type="submit">
          Ponha um animal para adoção
        </button>
      </form>
    </div>
  </div>
</body>
</html>
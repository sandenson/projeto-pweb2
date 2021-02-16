<?php
if (!isset($_SESSION["loggedUser"])) {
  header("Location: ./");
}
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="view/css/doc.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>Página inicial</title>
</head>

<body id="home">
  <div id="header">
    <h1><?php
      $user = $_SESSION["loggedUser"];
      echo "Olá, ".$user->name."!";
    ?></h1>
    <div class="header">
      <form action="?class=User&action=profile" method="POST">
        <button type="submit">
          Perfil
        </button>
      </form>
      <form action="?class=Session&action=delete" method="POST">
        <button type="submit">
          Sair
        </button>
      </form>
    </div>
  </div>

  <div>
    <div>
      <form action="?class=User&action=index" method="POST">
        <button type="submit">
          Conheça outros usuários
        </button>
      </form>
    </div>

    <div>
      <form action="?class=Pet&action=indexYourAdoptions" method="POST">
        <button type="submit">
          Veja os pets que você adotou
        </button>
      </form>
    </div>

    <div>
      <form action="?view=registerPets" method="POST">
        <button type="submit">
          Registre um pet para adoção
        </button>
      </form>

      <form action="?class=Pet&action=indexYourRegistrations" method="POST">
        <button type="submit">
          Gerencie seus pets registrados
        </button>
      </form>
    </div>

    <div>
      <form action="?class=Pet&action=index" method="POST">
        <button type="submit">
          Veja todos os pets cadastrados
        </button>
      </form>

      <form action="?class=Pet&action=indexNotAdopted" method="POST">
        <button type="submit">
          Adote um pet
        </button>
      </form>
    </div>
  </div>
</body>

</html>
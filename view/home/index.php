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

  <link rel="apple-touch-icon" sizes="57x57" href="view/assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="view/assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="view/assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="view/assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="view/assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="view/assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="view/assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="view/assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="view/assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="view/assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="view/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="view/assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="view/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="view/assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="view/assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

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
      <form action="?class=Pet&action=ranking" method="POST">
        <button type="submit">
          Veja os pets mais adotados
        </button>
      </form>

      <form action="?class=Pet&action=indexNotAdopted" method="POST">
        <button type="submit">
          Adote um pet
        </button>
      </form>

      <form action="?view=getReport" method="POST">
        <button type="submit">
          Solicitar relatório de adoções
        </button>
      </form>
    </div>
  </div>
</body>

</html>
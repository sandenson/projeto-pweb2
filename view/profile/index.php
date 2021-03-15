<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <title>Perfil</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form action="./" method="POST">
      <button type="submit">
        Voltar
      </button>
    </form>
    
    <form style="margin-left:30vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>

  <h1>Perfil - <?php
    $loggedUser = $_SESSION["loggedUser"];
    echo $loggedUser->name;
  ?></h1>
  <p><?php
    echo "@".$loggedUser->username
  ?></p>

  <ul>
    <li style="list-style: none"><?php
      echo $user->image ? "<img height='300' src='uploads/img/" . $user->image . "'alt='foto_do_usuario'>" : "<img height='300' src='view/assets/Drip_Goku.jpg'alt='foto_do_usuario'>";
    ?></li>
    <li style="list-style: none">Email: <?php echo $user->getEmail() ?></li>
    <li style="list-style: none">CPF: <?php echo $user->getCpf() ?></li>
    <li style="list-style: none">Endereço: <?php echo $user->getAddress() ?></li>
    <li style="list-style: none">Data de nascimento: 
    <?php
      $birthday = $user->getBirthday();
      $nBirthday = $birthday[8].$birthday[9].$birthday[4].$birthday[5].$birthday[6].$birthday[7].$birthday[0].$birthday[1].$birthday[2].$birthday[3];
      echo str_replace("-", "/", $nBirthday);
    ?></li>
  </ul>

  <form action="?view=updateUser" method="POST">
    <button type="submit">
      Atualizar dados
    </button>
  </form>
    
  <form action="?class=User&action=delete" method="POST">
    <button type="submit">
      Apagar conta
    </button>
  </form>
</body>

</html>
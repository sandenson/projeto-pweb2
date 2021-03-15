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

  <title>Atualização do usuário</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form action="?class=User&action=profile" method="POST">
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

  <h1>Atualização de dados - <?php
    $loggedUser = $_SESSION["loggedUser"];
    echo $loggedUser->name;
  ?></h1>
  <p><?php
    echo "@".$loggedUser->username
  ?></p>

  <form action="?class=User&action=update" method="POST" enctype="multipart/form-data">
    <label>Email:</label><input type="email" name="nEmail" placeholder="Novo email"><br>
    <label>CPF:</label><input type="text" name="nCpf" placeholder="Novo CPF"><br>
    <label>Endereço:</label><input type="text" name="nAddress" placeholder="Novo endereço"><br>
    <label>Data de nascimento:<input type="date" name="nBirthday"><br>
    <label>Nova senha:</label><input type="password" name="nPassword" placeholder="Nova senha"><br>
    <label>Confirmar senha:</label><input type="password" name="confirmNPassword" placeholder="Confirmar senha"><br>
    <label>Nova foto de perfil:</label>
    <div id="image-handler" class="images">
      <input type="file" name="nPicture" accept="image/*"/><br>
    </div>
    <button type="submit">
      Atualizar dados
    </button>
  </form>
</body>

</html>
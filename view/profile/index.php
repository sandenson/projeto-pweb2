<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <li style="list-style: none">Email: <?php echo $user->getEmail() ?></li>
    <li style="list-style: none">CPF: <?php echo $user->getCpf() ?></li>
    <li style="list-style: none">Endereço: <?php echo $user->getAddress() ?></li>
    <li style="list-style: none">Data de nascimento: <?php echo $user->getBirthday() ?></li>
  </ul>

  <form action="" method="POST">
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
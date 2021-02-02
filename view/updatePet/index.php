<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  <form action="?class=User&action=update" method="POST">
    <label>Email:</label><input type="email" name="nEmail" placeholder="Novo email"><br>
    <label>CPF:</label><input type="text" name="nCpf" placeholder="Novo CPF"><br>
    <label>Endereço:</label><input type="text" name="nAddress" placeholder="Novo endereço"><br>
    <label>Data de nascimento:<input type="date" name="nBirthday"><br>
    <label>Nova senha:</label><input type="password" name="nPassword" placeholder="Nova senha"><br>
    <label>Confirmar senha:</label><input type="password" name="confirmNPassword" placeholder="Confirmar senha"><br>
    <button type="submit">
      Atualizar dados
    </button>
  </form>
</body>

</html>
<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suas adoções</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form style="margin-right:10vw" action="./" method="POST">
      <button type="submit">
        Voltar
      </button>
    </form>
    <h1>Lista de adoções</h1>
    <form style="margin-left:30vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>

  <?php
  if ($pets) {
  ?>
    <table>
      <tr>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Sexo</th>
        <th>Registrado por</th>
      </tr>
      <?php
      foreach ($pets as $index => $pet) :
      ?>
        <tr>
          <td><?php echo $pet->getName(); ?></td>
          <td><?php echo $pet->getType(); ?></td>
          <td><?php echo $pet->getSex(); ?></td>
          <td><?php echo "@".$pet->getRegisteredBy(); ?></td>
        </tr>
      <?php
      endforeach;
      ?>
    </table>
  <?php
  } else {
  ?>
    <p>Você não adotou nem um pet. Se puder, ajude a causa!</p>
  <?php
  }
  ?>
</body>

</html>
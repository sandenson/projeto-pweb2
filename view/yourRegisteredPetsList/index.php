<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento de pets registrados</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form style="margin-right:10vw" action="./" method="POST">
      <button type="submit">
        Voltar
      </button>
    </form>
    <h1>Gerencie seus pets registrados para adoção</h1>
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
        <th>Status</th>
        <th></th>
        <th></th>
      </tr>
      <?php
      foreach ($pets as $index => $pet) :
      ?>
        <tr>
          <td><?php echo $pet->getName(); ?></td>
          <td><?php echo $pet->getType(); ?></td>
          <td><?php echo $pet->getSex(); ?></td>
          <td><?php echo $pet->getIsAdopted() ? "Adotado" : "Esperando por adoção"; ?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="petId" value=<?php echo $pet->getId(); ?>>
              <button type="submit">Atualizar informações</button>
            </form>
          </td>
          <td>
            <form action="?class=Pet&action=delete" method="POST">
              <input type="hidden" name="petId" value=<?php echo $pet->getId(); ?>>
              <button type="submit">Deletar registro do pet</button>
            </form>
          </td>
        </tr>
      <?php
      endforeach;
      ?>
    </table>
  <?php
  } else {
  ?>
    <p>Você não tem nenhum pet registrado para adoção.</p>
  <?php
  }
  ?>
</body>

</html>
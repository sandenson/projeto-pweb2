<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de pets</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form style="margin-right:10vw" action="./" method="POST">
      <button type="submit">
        Voltar
      </button>
    </form>
    <h1>Veja todos os pets registrados</h1>
    <form style="margin-left:30vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>

  <form action="?class=Pet&action=index" method="POST">
    Filtrar <select name="filter" id="filter">
      <option>Todos</option>
      <option>Adotados</option>
      <option>Esperando por adoção</option>
    </select>
    <button type="submit">Filtrar</button>
  </form>

  <p>Categoria: <b><?php echo isset($_POST["filter"]) ? $_POST["filter"] : "Todos" ?></b></p>

  <?php
  if ($pets) {
  ?>
    <table>
      <tr>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Sexo</th>
        <th>Status</th>
        <th>Registrado por</th>
        <th>Adotado por</th>
      </tr>
      <?php
      foreach ($pets as $index => $pet) :
      ?>
        <tr>
          <td><?php echo $pet->getName(); ?></td>
          <td><?php echo $pet->getType(); ?></td>
          <td><?php echo $pet->getSex(); ?></td>
          <td><?php echo $pet->getIsAdopted() ? "Adotado" : "Esperando por adoção"; ?></td>
          <td><?php echo "@".$pet->getRegisteredBy() ?></td>
          <td><?php echo $pet->getAdoptedBy() ? "@".$pet->getAdoptedBy() : "" ?></td>
        </tr>
      <?php
      endforeach;
      ?>
    </table>
  <?php
  } else {
    if (!isset($_POST["filter"]) || $_POST["filter"] == "Todos") {
      echo "<p>Não há nenhum pet registrado no momento.</p>";
    }

    else if ($_POST["filter"] == "Esperando por adoção") {
      echo "<p>Não há nenhum pet registrado esperando por adoção no momento.</p>";
    }

    else {
      echo "<p>Não há nenhum pet registrado adotado no momento.</p>";
    }
  }
  ?>
</body>

</html>
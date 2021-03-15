<?php
if (!isset($_SESSION["loggedUser"])) {
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

  <title>Lista de pets</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form style="margin-right:10vw" action="./">
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

  <form action="?class=Pet&action=index" method="GET">
  <input type="hidden" name="class" value="Pet">
  <input type="hidden" name="action" value="index">
    Filtrar <select name="filter" id="filter">
      <option value="1">Todos</option>
      <option value="2">Adotados</option>
      <option value="3">Esperando por adoção</option>
    </select>
    <button type="submit">Filtrar</button>
  </form>

  <p>Categoria: <b><?php
    if (isset($_GET["filter"]) && $_GET["filter"] == "1") echo "Todos";
    else if (isset($_GET["filter"]) && $_GET["filter"] == "2") echo "Adotados";
    else if (isset($_GET["filter"]) && $_GET["filter"] == "3") echo "Esperando por adoção";
    else echo "Todos";
  ?></b></p>

  <?php
  $loggedUser = $_SESSION["loggedUser"];

  if ($pets[0]) {
  ?>
    <table>
      <tr>
        <th></th>
        <th>Nome</th>
        <th>Espécie</th>
        <th>Sexo</th>
        <th>Status</th>
        <th>Adotado por</th>
        <th>Registrado por</th>
        <th></th>
      </tr>
      <?php
      foreach ($pets[0] as $index => $pet) :
      ?>
        <tr>
          <td><?php echo $pet->image ? "<img height='300' src='uploads/img/" . $pet->image . "'alt='foto_do_pet'>" : ""; ?></td>
          <td><?php echo $pet->getName(); ?></td>
          <td><?php echo $pet->getType(); ?></td>
          <td><?php echo $pet->getSex(); ?></td>
          <td><?php echo $pet->getIsAdopted() ? "Adotado" : "Esperando por adoção"; ?></td>
          <td>
            <?php
            echo $pet->getAdoptedBy() ? ($pet->getAdoptedBy() == $loggedUser->username ? "@" . $loggedUser->username . " (Você)" : "@" . $pet->getAdoptedBy()) : "";
            ?>
          </td>
          <td>
            <?php
            echo $pet->getRegisteredBy() ? ($pet->getRegisteredBy() == $loggedUser->username ? "@" . $loggedUser->username . " (Você)" : "@" . $pet->getRegisteredBy()) : "";
            ?>
          </td>
          <td>
            <form action="?class=Pet&action=petProfile" method="post">
              <input type="hidden" name="petId" value="<?php echo $pet->getId(); ?>">
              <button type="submit">Página do pet</button>
            </form>
          </td>
        </tr>
      <?php
      endforeach;
      ?>
    </table>

  <?php
  } else {
    if (!isset($_GET["filter"]) || $_GET["filter"] == "1") {
      echo "<p>Não há nenhum pet registrado no momento.</p>";
    } else if ($_GET["filter"] == "3") {
      echo "<p>Não há nenhum pet registrado esperando por adoção no momento.</p>";
    } else {
      echo "<p>Não há nenhum pet registrado adotado no momento.</p>";
    }
  }
  ?>

  <br>

  <div>
    <?php
      if ($pets[1]) {
        if ($pets[1] == 1) { ?>
          <p>Páginas: <b>1</b></p>
        <?php } else {
          $filter = isset($_GET["filter"]) ? "&filter=".$_GET["filter"] : "&filter=1" ?>
          <p>Páginas: 
            <?php for ($i = 1; $i < $pets[1]+1; $i++) {
              if (isset($_GET["page"]) && $i != $_GET["page"]) {
                if ($i == 1) { ?>
                  <a href="<?php
                    echo "?class=".$_GET["class"]."&action=".$_GET["action"].$filter."&page=".($i);
                  ?>"><b><?php echo ($i) ?> </b></a>                  
                <?php }
                else { ?>
                  <a href="<?php
                      echo "?class=".$_GET["class"]."&action=".$_GET["action"].$filter."&page=".($i);
                  ?>"><b><?php echo ($i) ?> </b></a> 
                <?php }
              }

              else if (isset($_GET["page"]) && $i == $_GET["page"]) {
                if ($i == 1) { ?>
                  <b><?php echo ($i) ?> </b>                  
                <?php }
                else { ?>
                  <b><?php echo ($i) ?> </b>
                <?php }
              }
              
              else if (!isset($_GET["page"])) {
                if ($i == 1) { ?>
                  <b><?php echo ($i) ?> </b>                  
                <?php }
                else { ?>
                  <a href="<?php
                      echo "?class=".$_GET["class"]."&action=".$_GET["action"].$filter."&page=".($i);
                  ?>"><b><?php echo ($i) ?> </b></a>
                <?php }
              } ?>
          </p>
          <?php
          }
        }
      }
    ?>
  </div>
</body>

</html>
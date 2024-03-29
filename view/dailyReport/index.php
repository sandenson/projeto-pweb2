<html lang='pt-BR'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>

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

  <title>Relatório de adoções</title>
</head>

<body>
  <div style='display:flex;align-items:center;justify-content:center;'>
    <h1>Relatório de adoções - <?php
      $date = new DateTime($pets[1]);
      $date = $date->format('d \d\\e m \d\\e Y');
      if ($date[6] == '0' && $date[7] == '1') $date = substr_replace($date, 'janeiro', 6, 2);
      else if ($date[6] == '0' && $date[7] == '2') $date = substr_replace($date, 'fevereiro', 6, 2);
      else if ($date[6] == '0' && $date[7] == '3') $date = substr_replace($date, 'março', 6, 2);
      else if ($date[6] == '0' && $date[7] == '4') $date = substr_replace($date, 'abril', 6, 2);
      else if ($date[6] == '0' && $date[7] == '5') $date = substr_replace($date, 'maio', 6, 2);
      else if ($date[6] == '0' && $date[7] == '6') $date = substr_replace($date, 'junho', 6, 2);
      else if ($date[6] == '0' && $date[7] == '7') $date = substr_replace($date, 'julho', 6, 2);
      else if ($date[6] == '0' && $date[7] == '8') $date = substr_replace($date, 'agosto', 6, 2);
      else if ($date[6] == '0' && $date[7] == '9') $date = substr_replace($date, 'setembro', 6, 2);
      else if ($date[6] == '1' && $date[7] == '0') $date = substr_replace($date, 'outubro', 6, 2);
      else if ($date[6] == '1' && $date[7] == '1') $date = substr_replace($date, 'novembro', 6, 2);
      else if ($date[6] == '1' && $date[7] == '2') $date = substr_replace($date, 'dezembro', 6, 2);
      echo $date;
    ?></h1>
    <form style='margin-left:30vw' action='?class=Session&action=delete' method='POST'>
      <button type='submit'>
        Sair
      </button>
    </form>
  </div>

  <?php
  $loggedUser = $_SESSION['loggedUser'];

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
      </tr>
      <?php
      foreach ($pets[0] as $index => $pet) :
      ?>
        <tr>
          <td><?php echo $pet->image ? '<img height=`300` src=`uploads/img/' . $pet->image . 'alt=`foto_do_pet`>' : ''; ?></td>
          <td><?php echo $pet->getName(); ?></td>
          <td><?php echo $pet->getType(); ?></td>
          <td><?php echo $pet->getSex(); ?></td>
          <td><?php echo $pet->getIsAdopted() ? 'Adotado' : 'Esperando por adoção'; ?></td>
          <td>
            <?php
            echo $pet->getAdoptedBy() ? ($pet->getAdoptedBy() == $loggedUser->username ? '@' . $loggedUser->username . ' (Você)' : '@' . $pet->getAdoptedBy()) : '';
            ?>
          </td>
          <td>
            <?php
            echo $pet->getRegisteredBy() ? ($pet->getRegisteredBy() == $loggedUser->username ? '@' . $loggedUser->username . ' (Você)' : '@' . $pet->getRegisteredBy()) : '';
            ?>
          </td>
        </tr>
      <?php
      endforeach;
      ?>
    </table>

  <?php
  } else {
    echo '<p>Nenhum pet foi adotado neste dia.</p>';
  }
  ?>
</body>

</html>
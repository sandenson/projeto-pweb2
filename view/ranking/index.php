<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Ranking</title>
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
  
  <ul id="list">
    <?php
    if ($pets) {
      foreach ($pets as $index => $pet) :
    ?>
        <li style="list-style:none"><?php echo $pet ?></li>
      <?php
      endforeach;
    } else {
      ?>
      <p>Pets ainda não foram adotados</p>
    <?php
    }
    ?>
  </ul>
</body>

</html>
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
    <h1>Veja o ranking de pets mais adotados</h1>
    <form style="margin-left:30vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>
  
  <table>
    <tr>
      <th></th>
      <th></th>
    </tr>
    <?php
    if ($pets[0]) {
      for ($i = 0; $i < count($pets[0]); $i++) {
    ?>
        <tr>
          <td><?php echo $pets[0][$i].": " ?></td>
          <td><?php echo $pets[1][$i] == 1 ? $pets[1][$i]." adoção" : $pets[1][$i]." adoções" ?></td>
        </tr>
      <?php
      }
    } else {
      ?>
      <p>Pets ainda não foram adotados</p>
    <?php
    }
    ?>
  </table>
</body>

</html>
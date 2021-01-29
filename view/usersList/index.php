<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conheça outros usuários</title>
  </head>
  <body>
    <div style = "display:flex;align-items:center;justify-content:center;">
      <form style = "margin-right:10vw" action="./" method="POST">
        <button type="submit">
          Voltar
        </button>
      </form>
      <h1>Conheça outros usuários</h1>
      <form style = "margin-left:30vw" action="?class=Session&action=delete" method="POST">
        <button type="submit">
          Sair
        </button>
      </form>
    </div>

    <ul>
      <?php
        if ($users) {
          foreach ($users as $index => $user):
      ?>
        <li style="list-style:none"><?php echo $user->getName()." (@".$user->getUsername().")" ?></li>
      <?php
          endforeach;
        }

        else {
      ?>
          <p>Parece que você é o único por aqui...</p>
      <?php
        }
      ?>
    </ul>
  </body>
</html>

<?php
  if(!isset($_SESSION["loggedUser"])) {
    header("Location: ./");
  }
?>

<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página inicial</title>
</head>
<body>
  <div style = "display:flex;align-items:center;justify-content:center;">
    <h1>Esta é a home page,
      <?php
        $user = $_SESSION["loggedUser"];
        echo $user->name;
      ?>
    </h1>
    <form style = "margin-left:30vw" action="?class=User&action=profile" method="POST">
      <button type="submit">
        Perfil
      </button>
    </form>
    <form style = "margin-left:3vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>

  <div style = "display:flex;align-items:center;justify-content:center;margin-top: 10vh;">
    <div style = "margin-right: 10vw;">
      <form action="?class=User&action=index" method="POST">
        <button type="submit">
          Conheça outros usuários
        </button>
      </form>
    </div>

    <div style = "margin-right: 10vw;">
      <form action="?class=Pet&action=indexYourAdoptions" method="POST">
        <button type="submit">
          Veja os pets que você adotou
        </button>
      </form>
    </div>

    <div>
      <form action="?view=registerPets" method="POST">
        <button type="submit">
          Registre um pet para adoção
        </button>
      </form>

      <form action="?class=Pet&action=indexYourRegistrations" method="POST">
        <button type="submit">
          Gerencie seus pets registrados
        </button>
      </form>
    </div>

    <div style = "margin-left: 10vw;">
      <form action="?class=Pet&action=index" method="POST">
        <button type="submit">
          Veja todos os pets cadastrados
        </button>
      </form>

      <form action="?class=Pet&action=indexNotAdopted" method="POST">
        <button type="submit">
          Adote um pet
        </button>
      </form>
    </div>
  </div>
</body>
</html>
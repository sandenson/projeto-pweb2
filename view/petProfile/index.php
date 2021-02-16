<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do pet</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form action="./" method="POST">
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

  <h1>Perfil do pet - <?php
    echo $pet->getName();
    $loggedUser = $_SESSION["loggedUser"];
  ?></h1>

  <ul>
    <li style="list-style: none"><?php echo $pet->image ? "<img height='300' src='uploads/img/" . $pet->image . "'alt='foto_do_pet'>" : ""; ?></li>
    <li style="list-style: none"><b>Nome:</b> <?php echo $pet->getName() ?></li>
    <li style="list-style: none"><b>Descrição:</b> <?php echo $pet->getDescription() ?></li>
    <li style="list-style: none"><b>Espécie:</b> <?php echo $pet->getType() ?></li>
    <li style="list-style: none"><b>Sexo:</b> <?php echo $pet->getSex() ?></li>
    <li style="list-style: none"><b>Registrado por:</b>
      <?php
        echo $pet->getRegisteredBy() ? ($pet->getRegisteredBy() == $loggedUser->username ? "@".$loggedUser->username." (Você)" : "@".$pet->getRegisteredBy()) : "";
      ?>
    </li>
    <li style="list-style: none"><b>Status:</b> <?php echo $pet->getIsAdopted() ? "Adotado" : "Esperando por adoção"; ?></li>
    <?php
      if ($pet->getIsAdopted()) {
        ?>
          <li style="list-style: none"><b>Adotado por:</b>
            <?php
              echo $pet->getAdoptedBy() ? ($pet->getAdoptedBy() == $loggedUser->username ? "@".$loggedUser->username." (Você)" : "@".$pet->getAdoptedBy()) : "";
            ?>
          </li>
        <?php
      }

      else {?>
        <li style="list-style: none">
        <b>Local de adoção:</b><br>
          <iframe width = "100%" height = "300" src="https://maps.google.com/maps?q=<?php echo $pet->getAdoptionLocation(); ?>&output=embed" frameborder="0"></iframe>
        </li>
      <?php }
    ?>
  </ul>
  
  <?php
    if ($loggedUser->username == $pet->getRegisteredBy() && $pet->getIsAdopted() == false) {?>
      <form action="?view=updatePet" method="POST">
        <input type="hidden" name="petId" value=<?php echo $pet->getId(); ?>>
        <button type="submit">
          Atualizar dados
        </button>
      </form>
        
      <form action="?class=Pet&action=delete" method="POST">
        <button type="submit">
          Deletar registro do pet
        </button>
      </form>

      <form action="?class=Pet&action=adopt" method="POST">
        <input type="hidden" name="petId" value="<?php echo $pet->getId(); ?>" />
        <button type="submit">
          Adotar
        </button>
      </form>
    <?php }

    else if ($loggedUser->username == $pet->getAdoptedBy()) {?>
      <form action="?view=updatePet" method="POST">
        <input type="hidden" name="petId" value=<?php echo $pet->getId(); ?>>
        <input type="hidden" name="petName" value=<?php echo $pet->getName(); ?>>
        <button type="submit">
          Atualizar dados
        </button>
      </form>
        
      <form action="?class=Pet&action=delete" method="POST">
        <button type="submit">
          Deletar registro do pet
        </button>
      </form>
    <?php }

    else if ($loggedUser->username != $pet->getRegisteredBy() && $pet->getIsAdopted() == false) {?>
      <form action="?class=Pet&action=adopt" method="POST">
        <input type="hidden" name="petId" value="<?php echo $pet->getId(); ?>" />
        <input type="hidden" name="petName" value=<?php echo $pet->getName(); ?>>
        <button type="submit">
          Adotar
        </button>
      </form>
    <?php }
  ?>

  
</body>

</html>
<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atualização do pet</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form action="?class=Pet&action=indexYourRegistrations" method="POST">
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

  <h1>Atualização de dados - <?php
    echo $_POST["petName"];
  ?></h1>

  <form action="?class=Pet&action=update" method="POST" enctype="multipart/form-data">
    <label>Nome: </label><input type="text" name="nName" placeholder="Novo nome"><br>
    <label>Descrição: </label><input type="text" name="nDesc" placeholder="Nova descrição"><br>
    <label>Foto: </label><br>
    <div id="image-handler" class="images">
      <input type="file" name="nPicture" accept="image/*"/><br>
    </div>
    <input type="hidden" name="petId" value="<?php echo $_POST["petId"]; ?>" />
    <button type="submit">
      Atualizar dados
    </button>
  </form>
</body>

</html>
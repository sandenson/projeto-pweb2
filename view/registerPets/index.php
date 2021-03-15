<!-- - Cadastro de usuários (nome, data de nascimento, email, nome de usuário, foto, endereço) do sistema com validação dos dados;
- Cadastro de pets (fotos, nome, descrição, tipo, com validação dos dados; -->

<?php
  if(!isset($_SESSION["loggedUser"])) {
    header('Location: ../../');
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="stylesheet" type="text/css" href="view/css/doc.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2? família=Satisfazer&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Satisfy', cursive;
    }
  </style>

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

  <title>Cadastro de pets</title>
</head>
<body>
  <form action="./" method="POST">
    <button type="submit">
      Voltar
    </button>
  </form>
  <div class="body_cad">
    <div class="conteudo_cad">
      <h1 class="title_cad" >Cadastro de pets</h1>
      <div class="organizer_form">
        <form class="form" action="?class=Pet&action=store" method="POST" enctype="multipart/form-data">
          <label>Nome: </label> <input  type="text" name="name" placeholder="Nome" required><br>
          <label>Descrição: </label> <input type="text" name="description" placeholder="Descrição"><br>
          <label>Espécie: </label> 
          <select class="button_cad" name="type" required>
            <option>Cachorro</option>
            <option>Gato</option>
            <option>Toupeira</option>
            <option>Lontra</option>
            <option>Jacaré</option>
            <option>Passarinho</option>
            <option>Sapo</option>
          </select><br>
          <label>Sexo: </label> 
          <select class="button_cad" name="sex" required>
            <option>Fêmea</option>
            <option>Macho</option>
          </select><br>
          <label>Local de adoção: </label> <input type="text" name="adoptionLocation" placeholder="Local de adoção" required><br>
          <label>Adicione uma foto:</label><br>
          <div id="image-handler" class="images">
            <input type="file" name="picture" accept="image/*"/><br>
          </div>
          <input class="button_cad" type="submit" name="ok">
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
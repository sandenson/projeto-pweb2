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
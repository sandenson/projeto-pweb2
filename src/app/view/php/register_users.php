<!-- - Cadastro de usuários (nome, data de nascimento, email, nome de usuário, foto, endereço) do sistema com validação dos dados;
- Cadastro de pets (fotos, nome, descrição, tipo, com validação dos dados; -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/doc.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2? família=Satisfazer&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Satisfy', cursive;
        }
    </style>
  <title>Document</title>
</head>
<body>
  <a class="button" href="index.php">Voltar</a>
  <div class="body_cad">
        <div class="conteudo_cad">
          <h1 class="title_user" >Cadastro de usuários</h1>
          <div class="organizer_form">
            <form action="../../controllers/createUser.php" method="POST">
              <input type="text" name="name" placeholder="Nome"><br>
              <input type="date" name="birthday" placeholder="Data de nascimento"><br>
              <input type="email" name="email" placeholder="Email"><br>
              <input type="text" name="username" placeholder="Nome de usuário"><br>
              <input type="text" name="address" placeholder="Endereço"><br>
              <input type="submit" name="ok">
            </form>
          </div>
        </div>
    </div>
</body>
</html>
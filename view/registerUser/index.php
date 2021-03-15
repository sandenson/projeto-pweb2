<!-- - Cadastro de usuários (nome, data de nascimento, email, nome de usuário, foto, endereço) do sistema com validação dos dados;
- Cadastro de pets (fotos, nome, descrição, tipo, com validação dos dados; -->

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="view/css/doc.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">

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

  <title>Cadastro de usuário</title>
</head>

<body>
  <div class="body_cad">
    <div class="conteudo_cad">
      <h1 class="title_user">sign up</h1>
      <div class="organizer_form">
        <form action="?class=User&action=store" method="POST" enctype="multipart/form-data">
          <label>Nome:</label>
          <input type="text" name="name" placeholder="Nome" required><br>
          <label>Data de nascimento:</label>
          <input type="date" name="birthday" placeholder="Data de nascimento" required><br>
          <label>Email:</label>
          <input type="email" name="email" placeholder="Email" required><br>
          <label>Nome de usuário:</label>
          <input type="text" name="username" placeholder="Nome de usuário" required><br>
          <label>Endereço:</label>
          <input type="text" name="address" placeholder="Endereço" required><br>
          <label>CPF:</label>
          <input type="text" name="cpf" placeholder="CPF" required><br>
          <label>Senha:</label>
          <input type="password" name="password" placeholder="Senha" required><br>
          <label>Adicione uma foto:</label><br>
            <input type="file" name="picture" accept="image/*"/><br>
          <div class="a">
            <a href="?view=login">Já tem uma conta? Faça login!</a>
            <input type="submit" name="ok">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
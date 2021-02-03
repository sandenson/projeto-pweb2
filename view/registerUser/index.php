<!-- - Cadastro de usuários (nome, data de nascimento, email, nome de usuário, foto, endereço) do sistema com validação dos dados;
- Cadastro de pets (fotos, nome, descrição, tipo, com validação dos dados; -->

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="view/css/doc.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
  <title>Cadastro de usuário</title>
</head>

<body>
  <div class="body_cad">
    <div class="conteudo_cad">
      <h1 class="title_user">sign up</h1>
      <div class="organizer_form">
        <form action="?class=User&action=store" method="POST">
          <input type="text" name="name" placeholder="Nome" required><br>
          <input type="date" name="birthday" placeholder="Data de nascimento" required><br>
          <input type="email" name="email" placeholder="Email" required><br>
          <input type="text" name="username" placeholder="Nome de usuário" required><br>
          <input type="text" name="address" placeholder="Endereço" required><br>
          <input type="text" name="cpf" placeholder="CPF" required><br>
          <input type="password" name="password" placeholder="Senha" required><br>
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
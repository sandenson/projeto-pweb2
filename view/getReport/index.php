<!-- - Cadastro de usuários (nome, data de nascimento, email, nome de usuário, foto, endereço) do sistema com validação dos dados;
- Cadastro de pets (fotos, nome, descrição, tipo, com validação dos dados; -->

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="view/css/doc.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
  <title>Solicitar relatório de adoções</title>
</head>

<body>
  <div style="display:flex;align-items:center;justify-content:center;">
    <form style="margin-right:10vw" action="./">
      <button type="submit">
        Voltar
      </button>
    </form>
    <h1>Solicitar relatório de adoções</h1>
    <form style="margin-left:30vw" action="?class=Session&action=delete" method="POST">
      <button type="submit">
        Sair
      </button>
    </form>
  </div>

  <form action="?class=Pet&action=report" method="POST">
    <label for="reportDate">Data do relatório: </label><input type="date" name="reportDate" required><br>
    <button type="submit">Solicitar relatório</button>
  </form>
</body>

</html>
<?php
session_start();
include "ConectaBD.php";

$erro = "";

// Processa o login
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['username'];
    $senha   = $_POST['password'];

    $sql = "SELECT * FROM usuarios 
            WHERE usuario='$usuario' 
            AND senha='$senha'";

    $resultado = mysqli_query($conexao, $sql);

    if ($linha = mysqli_fetch_assoc($resultado)) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $linha['usuario'];
        $_SESSION['tipo'] = $linha['tipo']; // admin ou user

        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Materialize -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet"/>
  <link href="css/style.css" type="text/css" rel="stylesheet"/>

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #fff;
      font-family: 'Poppins', sans-serif;
    }
    .login-card {
      width: 350px;
      padding: 40px 30px;
      border-radius: 10px;
      text-align: center;
    }
    h5 {
      font-weight: 700;
      color: #2f2f5f;
      margin-bottom: 25px;
    }
    .input-field input {
      background-color: #e6e6e6 !important;
      border-radius: 4px !important;
      padding-left: 12px !important;
    }
    .btn-login {
      background-color: #8b80f9 !important;
      width: 100%;
      font-weight: 600;
      border-radius: 5px;
    }
    .erro {
      color: red;
      margin-bottom: 15px;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="login-card z-depth-0">
    <h5>LOGIN</h5>

    <?php if ($erro != "") { ?>
      <div class="erro"><?= $erro ?></div>
    <?php } ?>

    <form method="POST">
      <div class="input-field">
        <input id="username" name="username" type="text" required>
        <label for="username">Username</label>
      </div>

      <div class="input-field">
        <input id="password" name="password" type="password" required>
        <label for="password">Password</label>
      </div>

      <button class="btn btn-login waves-effect waves-light" type="submit">
        LOGIN
      </button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
</body>
</html>
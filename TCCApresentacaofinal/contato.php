<?php
session_start();
include "ConectaBD.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Portal de Noticias Panatinaikos</title>

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <style>
    body {
      background-color: #fff3e0;
    }

    html, body {
      height: 100%;
      margin: 0;
    }

    .page-wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1 0 auto;
    }

    footer {
      flex-shrink: 0;
    }

    .input-field label {
      color: #000;
    }
  </style>
</head>

<body>

<div class="page-wrapper">

  <?php include "Navbar.php"; ?>

  <main class="content">
    <section id="contato" class="container">
      <h4 class="center-align">Fale Conosco</h4>

      <div class="row">

        <!-- FORMULÁRIO -->
        <form class="col s12 m6" method="POST" action="enviarcontato.php">

          <div class="input-field">
            <input type="text" id="nome" name="nome" required>
            <label for="nome">Nome</label>
          </div>

          <div class="input-field">
            <input type="email" id="email" name="email" required>
            <label for="email">Email</label>
          </div>

          <div class="input-field">
            <input type="text" id="telefone" name="telefone">
            <label for="telefone">Telefone</label>
          </div>

          <div class="input-field">
            <textarea id="mensagem" name="mensagem" class="materialize-textarea" required></textarea>
            <label for="mensagem">Mensagem</label>
          </div>

          <button class="btn orange darken-3" type="submit">Enviar</button>
        </form>

        <!-- CONTATOS -->
        <div class="col s12 m6">
          <ul class="collection">
            <li class="collection-item black-text">📍 Av. Principal, 1234 - Baita chão - RS</li>
            <li class="collection-item black-text">📞 (55) 3456-7890 / (55) 91234-5678</li>
            <li class="collection-item black-text">📧 panatinaikosbasquete@gmail.com</li>
            <li class="collection-item black-text">🕗 Segunda a Sexta das 8h às 17h</li>
          </ul>
        </div>

      </div>
    </section>
  </main>

  <?php include "footer.php"; ?>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/materialize.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  M.updateTextFields();
});
</script>

</body>
</html>
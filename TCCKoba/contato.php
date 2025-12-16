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

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   <style>
    body {
      background-color: #fff3e0;
    }
    .hero {
      background-color: #ff9800;
      color: white;
      padding: 60px 20px;
      text-align: center;
    }
    .stats {
      background-color: #ffe0b2;
      padding: 40px 0;
    }
    .stat-item {
      text-align: center;
    }
    .btn-large {
      margin: 10px;
    }
.input-field label{
     color: #000;
      
   }
    .noticia-destaque img {
      width: 100%;
      border-radius: 8px;
    }
    .card .card-image img {
      height: 150px;
      object-fit: cover;
      border-radius: 8px 8px 0 0;
    }
    .card-content p {
      font-size: 0.9rem;
      color: #444;
    }
    .mais-noticias {
      margin-top: 30px;
      text-align: right;
      font-weight: bold;
      color: #2e7d32;
    }
    .mais-noticias a {
      color: #2e7d32;
      text-decoration: none;
    }
    .mais-noticias a:hover {
      text-decoration: underline;
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
  </style>
</head>
<body>
  <div class="page-wrapper">
<?php
      include "Navbar.php";

?>

        <section id="contato" class="container">
    <h4 class="center-align">Fale Conosco</h4>
    <div class="row">
      <form class="col s12 m6">
        <div class="input-field "><input type="text" id="nome"><label for="nome">Nome</label></div>
        <div class="input-field"><input type="email" id="email"><label for="email">Email</label></div>
        <div class="input-field"><input type="text" id="telefone"><label for="telefone">Telefone</label></div>
        <div class="input-field"><textarea id="mensagem" class="materialize-textarea"></textarea><label for="mensagem">Mensagem</label></div>
        <button class="btn orange darken-3" type="submit">Enviar</button>
      </form>
      <div class="col s12 m6">
        <ul class="collection">
          <li class="collection-item black-text">📍 Av. Principal, 1234 - Baita chão - RS</li>
          <li class="collection-item black-text">📞 (55) 3456-7890 / (55) 91234-5678</li>
          <li class="collection-item black-text">📧 contato@basquetepanatinaikos.com.br</li>
          <li class="collection-item black-text">🕗 Segunda a Sexta das 8h às 17h</li>
        </ul>
      </div>
    </div>
  </section>
      </div>
    </div>
<?php include "footer.php"; ?>
  </div>

</body>
</html>
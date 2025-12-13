<?php
session_start();
include "ConectaBD.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Todas as Notícias</title>

  <!-- Materialize -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" rel="stylesheet">

  <style>
    body {
      background-color: #fff3e0;
    }

    .noticia-item {
      padding: 20px 0;
      border-bottom: 1px solid #ddd;
    }

    .noticia-item img {
      width: 100%;
      height: 120px;
      object-fit: cover;
      border-radius: 6px;
    }

    .noticia-data {
      font-size: 0.9rem;
      color: #2e7d32;
      margin-bottom: 6px;
      display: block;
    }

    .noticia-titulo {
      font-size: 1.2rem;
      font-weight: bold;
      color: #000;
    }

    .noticia-resumo {
      font-size: 0.95rem;
      color: #444;
      margin: 8px 0;
    }
  </style>
</head>

<body>

<?php include "Navbar.php"; ?>

<div class="container" style="margin-top:40px;">
  <h4 class="green-text text-darken-2">Mais Notícias</h4>
  <div class="divider green"></div>

  <?php
  $sql = "SELECT * FROM noticias ORDER BY ID DESC";
  $resultado = mysqli_query($conexao, $sql);

  while ($linha = mysqli_fetch_assoc($resultado)):
      $dataPub = date('d/m/Y', strtotime($linha['Datapubli']));
  ?>

  <div class="row noticia-item valign-wrapper">

    <!-- IMAGEM -->
    <div class="col s12 m3">
      <img src="<?= htmlspecialchars($linha['Imagem']) ?>">
    </div>

    <!-- CONTEÚDO -->
    <div class="col s12 m9">
      <span class="noticia-data">
        <?= $dataPub ?>
      </span>

      <div class="noticia-titulo">
        <?= htmlspecialchars($linha['Titulo']) ?>
      </div>

      <div class="noticia-resumo">
        <?= substr(strip_tags($linha['Conteudo']), 0, 220) ?>...
      </div>

      <a href="noticia.php?id=<?= $linha['ID'] ?>" class="green-text">
        Ler mais
      </a>
    </div>

  </div>

  <?php endwhile; ?>

</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="css/materialize.js"></script>
</body>
</html>
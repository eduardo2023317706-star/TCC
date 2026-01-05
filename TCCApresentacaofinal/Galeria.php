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
    .card-image img {
    transition: transform 0.3s ease;
    }
    .card-image img:hover {
    transform: scale(1.05);
    }
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

  <?php include "Navbar.php"; ?>

  <main class="content">
    <!-- Galeria -->
    <section id="Galeria" class="orange lighten-5">
      <div class="container">
        <h4 class="center-align">Galeria Panatinaikos</h4>

        <div class="row center-align">
          <?php
          $sql = "SELECT * FROM galeria ORDER BY id DESC";
          $resultado = mysqli_query($conexao, $sql);

          while ($img = mysqli_fetch_assoc($resultado)) {
          ?>
            <div class="col s12 m3">
              <div class="card hoverable">
                <div class="card-image">
                  <img 
                    src="<?= $img['imagem'] ?>" 
                    class="modal-trigger"
                    data-target="modal<?= $img['id'] ?>"
                    style="height:250px; object-fit:cover; cursor:pointer;"
                  >

                  <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') { ?>
                    <a 
                      href="ExcluirGaleria.php?id=<?= $img['id'] ?>" 
                      class="btn-floating halfway-fab red"
                      onclick="return confirm('Excluir esta imagem?')"
                    >
                      <i class="material-icons">delete</i>
                    </a>
                  <?php } ?>
                </div>
              </div>
            </div>

            <!-- MODAL -->
            <div id="modal<?= $img['id'] ?>" class="modal">
              <div class="modal-content center-align">
                <img src="<?= $img['imagem'] ?>" style="max-width:100%; max-height:80vh;">
              </div>
            </div>

          <?php } ?>
        </div>
      </div>
    </section>
  </main>

  <?php include "footer.php"; ?>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var modals = document.querySelectorAll('.modal');
  M.Modal.init(modals);
});
</script>

</body>
</html>
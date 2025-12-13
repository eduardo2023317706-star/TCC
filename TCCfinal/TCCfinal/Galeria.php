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
  </style>
</head>
<body>
<?php include "Navbar.php"; ?>
    <!-- Galeria -->
  <section id="Galeria" class="orange lighten-5">
  <div class="container">
    <h4 class="center-align">Galeria Panatinaikos</h4>

    <div class="row center-align">

      <?php
      $sql = "SELECT imagem FROM galeria ORDER BY id DESC";
      $resultado = mysqli_query($conexao, $sql);

      if (mysqli_num_rows($resultado) > 0) {
          while ($linha = mysqli_fetch_assoc($resultado)) {
      ?>
      
        <div class="col s12 m3">
          <div class="card">
            <div class="card-image">
              <img 
                src="<?= htmlspecialchars($linha['imagem']) ?>" 
                style="height:250px; object-fit:cover;"
              >
            </div>
          </div>
        </div>

      <?php
          }
      } else {
          echo "<p class='center-align'>Nenhuma imagem na galeria.</p>";
      }
      ?>

    </div>
  </div>
</section>
 

</body>
</html>
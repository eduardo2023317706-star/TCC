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
  </style>
</head>
<body>
<?php
      include "Navbar.php";

?>
  <section id="inicio" class="container" style="margin-top:40px;">

<?php
$sql = "SELECT * FROM noticias ORDER BY ID DESC LIMIT 4";
$resultado = mysqli_query($conexao, $sql);

$noticias = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $noticias[] = $row;
}

if (count($noticias) > 0):
?>

  <h5 class="green-text text-darken-2">Notícias em Destaque</h5>
  <div class="divider green"></div>

  <!-- NOTÍCIA PRINCIPAL -->
  <div class="row noticia-destaque">

    <!-- IMAGEM (ESQUERDA) -->
    <div class="col s12 m8  ">
       <img src="<?= htmlspecialchars($noticias[0]['Imagem']) ?>" style="height:350px;width: 650px; object-fit:cover;" class="responsive-img"> 
    </div>

    <!-- CONTEÚDO (DIREITA) -->
    <div class="col s12 m4">
      <h5>
            <?= substr(strip_tags($noticias[0]['Conteudo']), 0, 300) ?>...
      </h5>

      <a href="noticia.php?id=<?php echo $noticias[0]['ID']; ?>" class="btn green">
       LER MAIS
      </a>
    </div>

  </div>
</div>


  <!-- 3 NOTÍCIAS MENORES -->
  <div class="row">
    <?php for ($i = 1; $i < count($noticias); $i++): ?>
      <div class="col s12 m4">
        <div class="card small">
          <div class="card-image">
            <img src="<?= htmlspecialchars($noticias[$i]['Imagem']) ?>" style="height:150px; object-fit:cover;">
          </div>
          <div class="card-content">
            <span class="card-title" style="font-size:16px;">
             <h5> <?= htmlspecialchars($noticias[$i]['Titulo']) ?></h5>
            </span>
          </div>
          <a href="noticia.php?id=<?php echo $noticias[$i]['ID']; ?>" class="btn green">
            LER MAIS
          </a>
        </div>
      </div>
    <?php endfor; ?>
  </div>

  <!-- BOTÃO MAIS NOTÍCIAS -->
  <div class="right-align" style="margin-top:10px;">
    <a href="TodasNoticias.php" class="green-text text-darken-2">
      <strong>Mais Notícias...</strong>
    </a>

<?php else: ?>
  <p>Nenhuma notícia encontrada.</p>
<?php endif; ?>

</section>


  
  <!-- Footer -->




  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
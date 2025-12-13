<?php
session_start();
include "ConectaBD.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM noticias WHERE ID = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 0) {
    echo "Notícia não encontrada.";
    exit;
}

$noticia = mysqli_fetch_assoc($resultado);
$dataBrasileira = date('d/m/Y H:i', strtotime($noticia['Datapubli']));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($noticia['Titulo']); ?></title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<style>
  body {
    background-color: #fff3e0;
  }
  .noticia-container img {
    width: 100%;
    border-radius: 8px;
    margin-bottom: 20px;
  }
</style>
</head>

<body>
<?php include "Navbar.php"; ?>

<div class="container noticia-container">
  <h4><?php echo htmlspecialchars($noticia['Titulo']); ?></h4>
  <p><em>Publicado em <?php echo $dataBrasileira; ?></em></p>

  <img src="<?php echo htmlspecialchars($noticia['Imagem']); ?>" alt="Imagem da notícia">

  <p><?php echo nl2br(htmlspecialchars($noticia['Conteudo'])); ?></p>

  <?php if (!empty($noticia['tags'])): ?>
    <p><strong>Tags:</strong> <?php echo htmlspecialchars($noticia['tags']); ?></p>
  <?php endif; ?>

  <br>
  <a href="index.php" class="btn green">
    <i class="material-icons left">arrow_back</i> Voltar
  </a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/materialize.js"></script>
</body>
</html>
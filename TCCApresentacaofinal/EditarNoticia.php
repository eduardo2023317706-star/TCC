<?php
session_start();
include "ConectaBD.php";

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM noticias WHERE ID = $id";
$res = mysqli_query($conexao, $sql);
$noticia = mysqli_fetch_assoc($res);

if (!$noticia) {
    header("Location: TodasNoticias.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $conteudo = mysqli_real_escape_string($conexao, $_POST['conteudo']);

    $sqlUpdate = "
        UPDATE noticias 
        SET Titulo='$titulo', Conteudo='$conteudo' 
        WHERE ID=$id
    ";
    mysqli_query($conexao, $sqlUpdate);

    header("Location: TodasNoticias.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Notícia</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" rel="stylesheet">
  <style>
    body { background:#fff3e0; }
    </style>
</head>

<body>
<?php include "Navbar.php"; ?>

<div class="container" style="margin-top:40px;">
  <h4>Editar Notícia</h4>

  <form method="POST">
    <div class="input-field">
      <input type="text" name="titulo" value="<?= htmlspecialchars($noticia['Titulo']) ?>" required>
      <label class="active">Título</label>
    </div>

    <div class="input-field">
      <textarea name="conteudo" class="materialize-textarea" required><?= htmlspecialchars($noticia['Conteudo']) ?></textarea>
      <label class="active">Conteúdo</label>
    </div>

    <button class="btn green">Salvar Alterações</button>
    <a href="TodasNoticias.php" class="btn grey">Cancelar</a>
  </form>
</div>

</body>
</html>
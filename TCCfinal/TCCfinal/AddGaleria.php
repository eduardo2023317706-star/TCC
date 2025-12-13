<?php
session_start();
include "ConectaBD.php";

// só admin entra
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
    exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Imagem à Galeria</title>

  <!-- Materialize -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" rel="stylesheet">

  <!-- CropperJS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

  <style>
    body {
      background: #fff3e0;
    }
    .container {
      margin-top: 40px;
    }
    img {
      max-width: 100%;
    }
  </style>
</head>

<body>

<?php include "Navbar.php"; ?>

<div class="container">
  <h4 class="center-align">Adicionar imagem à galeria</h4>

  <div class="card">
    <div class="card-content">

      <input type="file" id="inputImage" accept="image/*" required>

      <div style="margin-top:20px;">
        <img id="imagePreview">
      </div>

      <br>
      <button id="cropBtn" class="btn green">Salvar imagem</button>

      <form id="formUpload" method="POST">
        <input type="hidden" name="imagem_base64" id="imagem_base64">
      </form>

    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/materialize.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
let cropper;
const input = document.getElementById('inputImage');
const image = document.getElementById('imagePreview');
const cropBtn = document.getElementById('cropBtn');
const base64Input = document.getElementById('imagem_base64');

input.addEventListener('change', (e) => {
  const file = e.target.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = () => {
    image.src = reader.result;
    cropper && cropper.destroy();

    cropper = new Cropper(image, {
      aspectRatio: 2 / 1, // 800x600
      viewMode: 1
    });
  };
  reader.readAsDataURL(file);
});

cropBtn.addEventListener('click', () => {
  if (!cropper) return;

  const canvas = cropper.getCroppedCanvas({
    width: 800,
    height: 600
  });

  base64Input.value = canvas.toDataURL("image/png");
  document.getElementById('formUpload').submit();
});
</script>

</body>
</html>

<?php
// ================= SALVAR IMAGEM =================
if (isset($_POST['imagem_base64'])) {

    $base64 = $_POST['imagem_base64'];
    $base64 = str_replace('data:image/png;base64,', '', $base64);
    $base64 = base64_decode($base64);

    $pasta = "imagens/";
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nome = uniqid() . ".png";
    $caminho = $pasta . $nome;

    file_put_contents($caminho, $base64);

    $sql = "INSERT INTO galeria (imagem) VALUES ('$caminho')";
    mysqli_query($conexao, $sql);

    echo "<script>
      M.toast({html: 'Imagem adicionada com sucesso!'});
      setTimeout(() => window.location='Galeria.php', 1200);
    </script>";
}
?>
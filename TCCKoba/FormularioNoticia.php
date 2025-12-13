<?php
session_start();
include 'ConectaBD.php';

// debug
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Notícia</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" rel="stylesheet">

<style>
body { background:#f5f5f5; font-family:Arial; }
form {
  background:#fff;
  padding:30px;
  max-width:600px;
  margin:40px auto;
  border-radius:8px;
}
.thumb-box {
  width:300px;
  height:200px;
  border:2px dashed #ff0;
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  pointer-events:none;
}
.popup {
  display:none;
  position:fixed;
  inset:0;
  background:rgba(0,0,0,.6);
  justify-content:center;
  align-items:center;
}
.popup.active { display:flex; }
.image-box {
  width:100%;
  height:260px;
  background:#ddd no-repeat center;
  cursor:move;
  position:relative;
}
.preview img { max-width:100%; margin-top:10px; }
</style>
</head>

<body>
<?php include "NavBar.php"; ?>

<h4 class="center-align">Cadastrar Nova Notícia</h4>

<form method="POST">
  <label>Título</label>
  <input type="text" name="titulo" required>

  <label>Conteúdo</label>
  <textarea name="conteudo" required></textarea>

  <label>Tags</label>
  <input type="text" name="tags">

  <label>Imagem (300x200)</label><br>
  <input type="file" id="fileInput" accept="image/*">
  <input type="hidden" name="imagem_base64" id="imagem_base64">

  <div class="preview"></div>

  <button class="btn green" name="enviar">Publicar</button>
</form>

<!-- POPUP DO CROP -->
<div class="popup">
  <div style="background:#fff;padding:15px;width:360px">
    <div class="image-box">
      <div class="thumb-box"></div>
    </div>
    <input type="range" id="zoom" min="-10" max="10"  step="1" value="0">
    <button class="btn green" id="crop">Cortar</button>
    <button class="btn red" id="cancel">Cancelar</button>
  </div>
</div>

<script>
const fileInput = document.getElementById('fileInput');
const popup = document.querySelector('.popup');
const imageBox = document.querySelector('.image-box');
const zoom = document.getElementById('zoom');
const cropBtn = document.getElementById('crop');
const cancelBtn = document.getElementById('cancel');
const preview = document.querySelector('.preview');
const hidden = document.getElementById('imagem_base64');

let img = new Image(), scale=1, posX=0, posY=0, drag=false, sx, sy;

fileInput.onchange = e => {
  const r = new FileReader();
  r.onload = ev => { img.src = ev.target.result; popup.classList.add('active'); };
  r.readAsDataURL(e.target.files[0]);
};

img.onload = () => draw();

function draw(){
  imageBox.style.backgroundImage = `url(${img.src})`;
  imageBox.style.backgroundSize = `${img.width*scale}px ${img.height*scale}px`;
  imageBox.style.backgroundPosition = `${posX}px ${posY}px`;
}

zoom.oninput = () => {
  scale = 1 + (zoom.value / 11.5);
  draw();
};

imageBox.onmousedown = e => { drag=true; sx=e.clientX-posX; sy=e.clientY-posY; };
document.onmouseup = ()=> drag=false;
document.onmousemove = e => {
  if(!drag) return;
  posX = e.clientX-sx; posY = e.clientY-sy; draw();
};

cropBtn.onclick = () => {
  const canvas = document.createElement('canvas');
  canvas.width = 300; canvas.height = 200;
  const ctx = canvas.getContext('2d');

  const box = imageBox.getBoundingClientRect();
  const thumb = document.querySelector('.thumb-box').getBoundingClientRect();

  const x = (thumb.left-box.left-posX)/scale;
  const y = (thumb.top-box.top-posY)/scale;

  ctx.drawImage(img, x, y, 300/scale, 200/scale, 0, 0, 300, 200);

  const base64 = canvas.toDataURL('image/png');
  hidden.value = base64;
  preview.innerHTML = `<img src="${base64}">`;
  popup.classList.remove('active');
};

cancelBtn.onclick = ()=> popup.classList.remove('active');
</script>
</body>
</html>

<?php
// ===================== SALVAR =====================
if (isset($_POST['enviar'])) {

  if (empty($_POST['imagem_base64'])) {
    die();
  }

  $titulo = $_POST['titulo'];
  $conteudo = $_POST['conteudo'];
  $tags = $_POST['tags'];
  $data = date('Y-m-d H:i:s');

  $img = $_POST['imagem_base64'];
  $img = str_replace('data:image/png;base64,','',$img);
  $img = base64_decode($img);

  $nome = "imagens/" . uniqid() . ".png";
  file_put_contents($nome, $img);

  $sql = "INSERT INTO noticias (Titulo,Conteudo,Datapubli,tags,Imagem)
          VALUES ('$titulo','$conteudo','$data','$tags','$nome')";

  if (mysqli_query($conexao,$sql)) {
    echo "<p style='color:green;text-align:center'>✅ Notícia publicada!</p>";
  } else {
    echo mysqli_error($conexao);
  }
}
?>
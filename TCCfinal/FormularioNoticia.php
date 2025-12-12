<?php include 'ConectaBD.php'; 

// Mostra as cagada q eu fiz
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Notícia</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f5f5f5;
    }
    h1 {
      text-align: center;
      color: #2e7d32;
    }
    form {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type="text"], textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      background-color: #2e7d32;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 15px;
    }
    button:hover {
      background-color: #1b5e20;
    }
    img.preview {
      margin-top: 10px;
      max-width: 100%;
      border-radius: 5px;
      display: none;
    }
  </style>
</head>
<body>

  <h1> Cadastrar Nova Notícia</h1>

  <form action="FormularioNoticia.php" method="POST" enctype="multipart/form-data">
    
    <label><strong>Título:</strong></label>
    <input type="text" name="titulo" required>

    <label><strong>Conteúdo:</strong></label>
    <textarea name="conteudo" rows="6" required></textarea>

    <label><strong>Tags (separe por vírgula):</strong></label>
    <input type="text" name="tags">

    <label><strong>Imagem:</strong></label>
    <input type="file" name="imagem" accept="image/*" id="imagem" required>
    <img id="preview" class="preview">

    <button type="submit" name="enviar">Publicar Notícia</button>
  </form>

  <script>
    // Pré-visualização da imagem antes do upload
    const input = document.getElementById('imagem');
    const preview = document.getElementById('preview');
    input.addEventListener('change', () => {
      const file = input.files[0];
      if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
      } else {
        preview.style.display = 'none';
      }
    });
  </script>

</body>
</html>

<?php

// PROCESSAMENTO DO FORMULÁRIO

if (isset($_POST['enviar'])) {

    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $tags = $_POST['tags'];
    $data = date('Y-m-d H:i:s'); // Data automática

    // Pasta onde os arquivos serão armazenados
    $pasta = "imagens/";

    $nomeArquivo = basename($_FILES["imagem"]["name"]);
    $caminhoFinal = $pasta . $nomeArquivo;

    // Verifica se o arquivo ta na extensão aceita
    $tipo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    $permitidos = ['jpg', 'jpeg', 'png'];

    if (!in_array($tipo, $permitidos)) {
        echo "<p style='color:red; text-align:center;'>❌ Formato de imagem não permitido!</p>";
        exit;
    }

    //upload
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoFinal)) {

        // coloca a notícia no banco de dados
        $sql = "INSERT INTO noticias (Titulo, Conteudo, Datapubli, tags, Imagem)
                VALUES ('$titulo', '$conteudo', '$data', '$tags', '$caminhoFinal')";

        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "<p style='color:green; text-align:center;'>✅ Notícia publicada com sucesso!</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Erro ao salvar no banco: " . mysqli_error($conexao) . "</p>";
        }

    } else {
    echo "<p style='color:red; text-align:center;'>❌ Erro ao fazer upload da imagem.</p>";

    // Mostra mais detalhes para depurar
    echo "<pre>";
    echo "Arquivo temporário: " . $_FILES['imagem']['tmp_name'] . "\n";
    echo "Erro de upload (código): " . $_FILES['imagem']['error'] . "\n";
    echo "Pasta destino: " . realpath($pasta) . "\n";
    echo "</pre>";
}
}
?>

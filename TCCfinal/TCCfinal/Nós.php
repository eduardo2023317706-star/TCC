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


  <!-- Estatísticas -->
  <div class="container center-align">
    <div class="row">
      <div class="col s4"><h5>+500</h5><p>Alunos Treinados</p></div>
      <div class="col s4"><h5>10</h5><p>Anos de Experiência</p></div>
      <div class="col s4"><h5>3</h5><p>Treinadores Profissionais</p></div>
    </div>
  </div>

  <!-- Programas -->
   <section id="Programas" >
    <div class="row" >
      <div class="col s12 m4 l2 push-l3">
        <div class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="imagens/PanaInfatil.png"  height="300">
      </div>
      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4">Iniciantes (8-12 anos)</span>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Iniciantes (8-12 anos)<i class="material-icons right">close</i></span>
        <p><strong>
          Treinador prórpio para as categoria Sub-12.<br>
          Treinos 5x por semana.<br>
          horarios diversificados.<br>
          manhã ou tarde.
        </strong><br>
        </p>
      </div>
    </div>
  </div>
      <div class="col s12 m4 l2 push-l3">
        <div class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="imagens/Pana16.png"  height="300">
      </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Categorias de base (14-19 anos)</span>
        </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Categorias de base (14-18 anos)<i class="material-icons right">close</i></span>
          <p><strong>
            Treinador prórpio para as categoria Sub-18.<br>
            Treinos 5x por semana.<br>
            treinos separados entre as categorias mesclados com enfrentamento entre categorias adjacentes.<br>
            Trabalho fisico, tecnico e mental.<br>
          Categorias disputam o estadual gaucho de basquete.
          </strong><br>
          </p>
      </div>
    </div>
  </div>
      <div class="col s12 m4 l2 push-l3">
        <div class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="imagens/Panaidosos.png"  height="300">
      </div>
      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4">Veteranos (21+ anos)</span>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Veteranos (21+ anos)<i class="material-icons right">close</i></span>
        <p><strong>
          Horarios para treinos, seja eles coletivos ou individuais<br>
          competições de catergoria adultas ou master<br>
          horarios de "peladas" recreativas<br>
          competição regional fronteira-oeste
        </strong><br>
        </p>
      </div>
    </div>
  </div>
    </div>
  </section>

  <!-- Treinadores -->
  <section id="treinadores" class="container">
    <h4 class="center-align">Nossa Equipe Técnica</h4>
    <div class="row">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Anderson Borges de Borges</span>
            <p>Treinador Principal das categorias de Base sub-13 a sub-18 – Ex-jogador profissional com 20 anos de experiência.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Guilherme</span>
            <p>Treinadora de Fundamentos das categorias sub-12 e abaixo – Especialista em desenvolvimento técnico.</p>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Cleon</span>
            <p>Treinador auxiliar e responsavel pelo club – Foco em condicionamento e desenvolvimento do mental dos jogadores.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

 

  <!-- Footer -->
   <footer class="page-footer green">
    <div class="container">
      <div class="row">
         <!-- Contato -->
        <section id="contato" class="container">
    <h4><a href="contato.php" class="center-align">Fale Conosco</a></h4>
  </footer>




  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
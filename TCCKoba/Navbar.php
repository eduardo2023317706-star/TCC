<!-- Navbar -->
<nav class="green">
  <div class="nav-wrapper container">

    <!-- Logo -->
    <a href="index.php" class="brand-logo" style="display:flex; align-items:center;">
      <img src="imagens/panatiicon.png" class="circle" width="55" height="55">
    </a>

    <!-- Botão Mobile -->
    <a href="#" data-target="nav-mobile" class="sidenav-trigger">
      <i class="material-icons">menu</i>
    </a>

    <!-- Menu Desktop -->
    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">Notícias</a></li>
      <li><a href="Nós.php">Nós</a></li>
      <li><a href="Galeria.php">Galeria</a></li>
      <li><a href="contato.php">Contato</a></li>

      <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') { ?>
        <li>
          <a href="FormularioNoticia.php">
            <i class="material-icons left">add</i>Notícia
          </a>
        </li>
        <li>
          <a href="AddGaleria.php">
            <i class="material-icons left">linked_camera</i>Galeria
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="material-icons left">exit_to_app</i>Sair
          </a>
        </li>
      <?php } else { ?>
        <li><a href="Login.php">Login</a></li>
      <?php } ?>
    </ul>

  </div>
</nav>

<!-- Menu Mobile -->
<ul id="nav-mobile" class="sidenav">
  <li><a href="index.php">Notícias</a></li>
  <li><a href="Nós.php">Nós</a></li>
  <li><a href="Galeria.php">Galeria</a></li>
  <li><a href="contato.php">Contato</a></li>

  <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') { ?>
    <li><a href="FormularioNoticia.php">Adicionar Notícia</a></li>
    <li><a href="AddGaleria.php">Gerenciar Galeria</a></li>
    <li><a href="logout.php">Sair</a></li>
  <?php } else { ?>
    <li><a href="Login.php">Login</a></li>
  <?php } ?>
</ul>
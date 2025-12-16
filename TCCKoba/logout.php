<?php
session_start();

// limpa todas as variáveis de sessão
$_SESSION = [];

session_destroy();
header("Location: index.php");
exit;
?>
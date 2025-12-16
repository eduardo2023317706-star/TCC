<?php
session_start();
include "ConectaBD.php";

// só admin
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: TodasNoticias.php");
    exit;
}

$id = intval($_GET['id']);

// pega imagem pra apagar do servidor
$sqlImg = "SELECT Imagem FROM noticias WHERE ID = $id";
$resImg = mysqli_query($conexao, $sqlImg);
$img = mysqli_fetch_assoc($resImg);

if ($img && file_exists($img['Imagem'])) {
    unlink($img['Imagem']);
}

// exclui do banco
$sql = "DELETE FROM noticias WHERE ID = $id";
mysqli_query($conexao, $sql);

header("Location: TodasNoticias.php");
exit;
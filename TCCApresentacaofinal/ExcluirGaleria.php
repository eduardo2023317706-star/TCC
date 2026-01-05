<?php
session_start();
include "ConectaBD.php";

// segurança
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'admin') {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

// busca imagem
$sql = "SELECT imagem FROM galeria WHERE id = $id";
$res = mysqli_query($conexao, $sql);
$img = mysqli_fetch_assoc($res);

// apaga arquivo físico
if ($img && file_exists($img['imagem'])) {
    unlink($img['imagem']);
}

// apaga do banco
mysqli_query($conexao, "DELETE FROM galeria WHERE id = $id");

header("Location: Galeria.php");
exit;
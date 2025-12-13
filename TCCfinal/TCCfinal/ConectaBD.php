<?php

$bdServidor = 'localhost'; 
$bdUsuario = 'root'; 
$bdSenha = '';
$bdBanco = 'tccpanatinaikos';

mysqli_report(MYSQLI_REPORT_OFF);

$conexao = @mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (!$conexao) {
    echo('Erro de conexão: ' . 
        mysqli_connect_error());
    die();
}
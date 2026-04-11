<?php
$host   = 'mysql';
$user   = 'root';
$senha  = '';
$db     = 'sisbiblioteca';

$conexao = new mysqli($host, $user, $senha, $db);

if ($conexao->connect_error) {
    die('Erro na conexao: ' . $conexao->connect_error);
}

$conexao->set_charset('utf8mb4');

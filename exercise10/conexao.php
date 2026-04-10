<?php
// =============================================
// Exercicio 10 - Conexao com o Banco de Dados
// AULA 05 - PHPMyAdmin e Conexao PHP com MySQL
// =============================================

$host   = 'localhost';
$user   = 'root';
$senha  = '';
$db     = 'sisbiblioteca';

$conexao = new mysqli($host, $user, $senha, $db);

if ($conexao->connect_error) {
    die('Erro na conexao: ' . $conexao->connect_error);
}

$conexao->set_charset('utf8mb4');

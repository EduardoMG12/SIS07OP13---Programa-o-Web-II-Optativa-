<?php
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = normalizarTexto($_POST['nome'] ?? '');
$telefone = normalizarTexto($_POST['telefone'] ?? '');

if ($nome !== '' && $telefone !== '') {
    adicionarContato($nome, $telefone);
    definirMensagem('Contato adicionado com sucesso.', 'sucesso');
} else {
    definirMensagem('Preencha nome e telefone para adicionar um contato.', 'erro');
}

header('Location: index.php');
exit;

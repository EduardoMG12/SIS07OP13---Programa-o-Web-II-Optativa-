<?php
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

limparAgenda();
definirMensagem('Agenda limpa com sucesso.', 'info');

header('Location: index.php');
exit;

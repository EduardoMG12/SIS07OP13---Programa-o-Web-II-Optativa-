<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

function normalizarTexto($valor)
{
    return trim((string) $valor);
}

function inicializarAgenda()
{
    if (!isset($_SESSION['agenda_ex7']) || !is_array($_SESSION['agenda_ex7'])) {
        $_SESSION['agenda_ex7'] = [];
    }
}

function adicionarContato($nome, $telefone)
{
    inicializarAgenda();

    $_SESSION['agenda_ex7'][] = [
        'nome' => $nome,
        'telefone' => $telefone,
    ];
}

function listarContatos()
{
    inicializarAgenda();
    return $_SESSION['agenda_ex7'];
}

function agendaEstaVazia()
{
    return empty(listarContatos());
}

function limparAgenda()
{
    $_SESSION['agenda_ex7'] = [];
}

function definirMensagem($texto, $tipo)
{
    $_SESSION['mensagem_ex7'] = $texto;
    $_SESSION['tipo_mensagem_ex7'] = $tipo;
}

function obterMensagem()
{
    $mensagem = [
        'texto' => $_SESSION['mensagem_ex7'] ?? '',
        'tipo' => $_SESSION['tipo_mensagem_ex7'] ?? 'info',
    ];

    unset($_SESSION['mensagem_ex7'], $_SESSION['tipo_mensagem_ex7']);

    return $mensagem;
}

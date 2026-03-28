<?php
function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

function receberNome($nomeDigitado)
{
    return trim((string) $nomeDigitado);
}

function nomeFoiInformado($nome)
{
    return $nome !== '';
}

function montarMensagemBoasVindas($nome)
{
    return 'Ola, ' . $nome . '! Seja bem-vindo ao exercicio de funcoes em PHP.';
}

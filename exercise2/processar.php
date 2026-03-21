<?php
$produto = trim($_POST['produto'] ?? '');
$valorBruto = str_replace(',', '.', trim($_POST['valor'] ?? ''));
$quantidadeBruta = trim($_POST['quantidade'] ?? '');

$quantidadeValida = filter_var($quantidadeBruta, FILTER_VALIDATE_INT);
$dadosValidos = $produto !== ''
    && is_numeric($valorBruto)
    && $quantidadeValida !== false
    && (float) $valorBruto >= 0
    && (int) $quantidadeBruta > 0;

if ($dadosValidos) {
    $valor = (float) $valorBruto;
    $quantidade = (int) $quantidadeBruta;
    $total = $valor * $quantidade;
}

function formatarMoeda($valor)
{
    return 'R$ ' . number_format($valor, 2, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #eef2ff;
            color: #1f2937;
            padding: 32px 16px;
        }

        .container {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #cbd5e1;
            padding: 14px;
            text-align: left;
        }

        th {
            background: #dbeafe;
        }

        .total {
            font-weight: bold;
            color: #1d4ed8;
        }

        .erro {
            padding: 14px;
            border-radius: 10px;
            background: #fee2e2;
            color: #991b1b;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Resumo da Compra</h1>

        <?php if ($dadosValidos): ?>
            <table>
                <tr>
                    <th>Campo</th>
                    <th>Informacao</th>
                </tr>
                <tr>
                    <td>Nome do Produto</td>
                    <td><?= htmlspecialchars($produto, ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
                <tr>
                    <td>Valor</td>
                    <td><?= formatarMoeda($valor) ?></td>
                </tr>
                <tr>
                    <td>Quantidade Comprada</td>
                    <td><?= $quantidade ?></td>
                </tr>
                <tr>
                    <td class="total">Total Gasto</td>
                    <td class="total"><?= formatarMoeda($total) ?></td>
                </tr>
            </table>
        <?php else: ?>
            <div class="erro">
                Dados invalidos. Preencha nome do produto, valor numerico e quantidade maior que zero.
            </div>
        <?php endif; ?>

        <a href="formulario.html">Voltar para o formulario</a>
    </div>
</body>

</html>

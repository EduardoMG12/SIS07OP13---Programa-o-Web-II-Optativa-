<?php
$valores = [
    10.5,
    "Programacao Web II",
    25,
    true,
    "42",
    7.8,
];

function formatarValor($valor)
{
    if (is_bool($valor)) {
        return $valor ? 'true' : 'false';
    }

    if (is_string($valor)) {
        return '"' . htmlspecialchars($valor, ENT_QUOTES, 'UTF-8') . '"';
    }

    return (string) $valor;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 2 - Verificacao de Tipo de Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            color: #1f2937;
            margin: 0;
            padding: 32px 16px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            padding: 24px;
        }

        h1 {
            margin-top: 0;
            color: #111827;
        }

        p {
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
        }

        th,
        td {
            border: 1px solid #dbe3f0;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #e8eefc;
        }

        tr:nth-child(even) {
            background: #f9fbff;
        }

        .true {
            color: #047857;
            font-weight: bold;
        }

        .false {
            color: #b91c1c;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Pratica em Sala - Verificacao de Tipo de Dados</h1>
        <p>Exemplo em PHP utilizando <code>gettype()</code>, <code>is_float()</code> e <code>is_string()</code>.</p>

        <table>
            <thead>
                <tr>
                    <th>Valor</th>
                    <th>Tipo com gettype()</th>
                    <th>is_float()</th>
                    <th>is_string()</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($valores as $valor): ?>
                    <tr>
                        <td><?= formatarValor($valor) ?></td>
                        <td><?= gettype($valor) ?></td>
                        <td class="<?= is_float($valor) ? 'true' : 'false' ?>">
                            <?= is_float($valor) ? 'true' : 'false' ?>
                        </td>
                        <td class="<?= is_string($valor) ? 'true' : 'false' ?>">
                            <?= is_string($valor) ? 'true' : 'false' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

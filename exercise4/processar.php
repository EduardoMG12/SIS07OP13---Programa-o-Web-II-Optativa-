<?php
function converterNumero($valor)
{
    $normalizado = str_replace(',', '.', trim($valor));

    if (strpos($normalizado, '.') !== false) {
        return (float) $normalizado;
    }

    return (int) $normalizado;
}

function formatarNumero($numero)
{
    if ((int) $numero == $numero) {
        return (string) (int) $numero;
    }

    $texto = number_format($numero, 2, ',', '.');
    return rtrim(rtrim($texto, '0'), ',');
}

$campos = ['numero1', 'numero2', 'numero3', 'numero4', 'numero5'];
$numeros = [];
$dadosValidos = $_SERVER['REQUEST_METHOD'] === 'POST';

foreach ($campos as $campo) {
    $valorRecebido = trim($_POST[$campo] ?? '');
    $valorNormalizado = str_replace(',', '.', $valorRecebido);

    if ($valorRecebido === '' || !is_numeric($valorNormalizado)) {
        $dadosValidos = false;
        break;
    }

    $numeros[] = converterNumero($valorRecebido);
}

if ($dadosValidos && count(array_unique($numeros, SORT_REGULAR)) !== count($numeros)) {
    $dadosValidos = false;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Array Numerico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #eef2ff;
            color: #1f2937;
            padding: 32px 16px;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
        }

        h1,
        h2 {
            margin-top: 0;
        }

        ol {
            padding-left: 22px;
            line-height: 1.8;
        }

        pre {
            background: #111827;
            color: #f9fafb;
            padding: 16px;
            border-radius: 10px;
            overflow-x: auto;
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
        <h1>Resultado do Exercicio 4</h1>

        <?php if ($dadosValidos): ?>
            <h2>Numeros na ordem de insercao</h2>
            <ol>
                <?php foreach ($numeros as $numero): ?>
                    <li><?= formatarNumero($numero) ?></li>
                <?php endforeach; ?>
            </ol>

            <h2>Array completo</h2>
            <pre><?php print_r($numeros); ?></pre>
        <?php else: ?>
            <div class="erro">
                Informe cinco numeros validos e diferentes entre si.
            </div>
        <?php endif; ?>

        <a href="formulario.html">Voltar para o formulario</a>
    </div>
</body>

</html>

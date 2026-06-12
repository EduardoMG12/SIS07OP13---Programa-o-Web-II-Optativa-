<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim - <?= htmlspecialchars($_POST['nome']) ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #e8d5b5 0%, #f5e6d3 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .card { background: white; border-radius: 20px; padding: 40px; max-width: 560px; width: 100%; box-shadow: 0 10px 40px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #5a3e2b; font-size: 1.6em; margin-bottom: 5px; }
        .subtitle { text-align: center; color: #8b7355; font-size: 0.9em; margin-bottom: 25px; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 25px; }
        .info-item { background: #fcf9f5; border-radius: 10px; padding: 12px 15px; border: 1px solid #e8ddd0; }
        .info-item .label { font-size: 0.75em; color: #8b7355; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-item .value { font-size: 1.1em; font-weight: 600; color: #5a3e2b; margin-top: 2px; }
        .info-item.full { grid-column: 1 / -1; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background: #5a3e2b; color: white; padding: 10px; text-align: center; font-size: 0.85em; }
        td { padding: 10px; text-align: center; border-bottom: 1px solid #e8ddd0; }
        tr:last-child td { border-bottom: none; }
        .media-box { background: linear-gradient(135deg, #8b6914, #a67c2e); color: white; border-radius: 12px; padding: 20px; text-align: center; margin-top: 20px; }
        .media-box .media-valor { font-size: 2.5em; font-weight: 700; }
        .media-box .media-label { font-size: 0.85em; opacity: 0.9; margin-top: 5px; }
        .status { margin-top: 15px; text-align: center; font-size: 1.1em; font-weight: 600; padding: 10px; border-radius: 10px; }
        .aprovado { background: #d4edda; color: #155724; }
        .recuperacao { background: #fff3cd; color: #856404; }
        .reprovado { background: #f8d7da; color: #721c24; }
        a { display: inline-block; margin-top: 20px; color: #8b6914; text-decoration: none; font-weight: 500; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h1>📄 Boletim Escolar</h1>
        <p class="subtitle">Ano Letivo <?= htmlspecialchars($_POST['ano']) ?></p>

        <div class="info-grid">
            <div class="info-item full">
                <div class="label">Aluno</div>
                <div class="value"><?= htmlspecialchars($_POST['nome']) ?></div>
            </div>
            <div class="info-item">
                <div class="label">Curso</div>
                <div class="value"><?= htmlspecialchars($_POST['curso']) ?></div>
            </div>
            <div class="info-item">
                <div class="label">Ano</div>
                <div class="value"><?= htmlspecialchars($_POST['ano']) ?></div>
            </div>
        </div>

        <?php
            $n1 = (float) $_POST['nota1'];
            $n2 = (float) $_POST['nota2'];
            $n3 = (float) $_POST['nota3'];
            $n4 = (float) $_POST['nota4'];
            $media = ($n1 + $n2 + $n3 + $n4) / 4;
        ?>

        <table>
            <thead>
                <tr>
                    <th>1º Bimestre</th>
                    <th>2º Bimestre</th>
                    <th>3º Bimestre</th>
                    <th>4º Bimestre</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= number_format($n1, 1) ?></td>
                    <td><?= number_format($n2, 1) ?></td>
                    <td><?= number_format($n3, 1) ?></td>
                    <td><?= number_format($n4, 1) ?></td>
                </tr>
            </tbody>
        </table>

        <div class="media-box">
            <div class="media-valor"><?= number_format($media, 1) ?></div>
            <div class="media-label">Média Final</div>
        </div>

        <?php
            if ($media >= 7.0) {
                $status = "Aprovado";
                $classe = "aprovado";
            } elseif ($media >= 5.0) {
                $status = "Recuperação";
                $classe = "recuperacao";
            } else {
                $status = "Reprovado";
                $classe = "reprovado";
            }
        ?>
        <div class="status <?= $classe ?>"><?= $status ?></div>

        <div style="text-align: center;">
            <a href="index.php">← Voltar ao formulário</a>
        </div>
    </div>
</body>
</html>

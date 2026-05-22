<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Exercicio 10</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Painel Administrativo</h1>

        <div class="mensagem sucesso">
            Bem-vindo, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>!
            Você está autenticado com sucesso.
        </div>

        <div class="bloco">
            <h2>Dados da Sessão</h2>
            <table>
                <tr>
                    <th>Variável</th>
                    <th>Valor</th>
                </tr>
                <tr>
                    <td><code>$_SESSION['autenticado']</code></td>
                    <td><?= $_SESSION['autenticado'] ? 'true' : 'false' ?></td>
                </tr>
                <tr>
                    <td><code>$_SESSION['usuario']</code></td>
                    <td><?= htmlspecialchars($_SESSION['usuario']) ?></td>
                </tr>
                <tr>
                    <td><code>session_id()</code></td>
                    <td><?= session_id() ?></td>
                </tr>
            </table>
        </div>

        <div class="acoes">
            <a class="botao secundario" href="logout.php">Sair</a>
        </div>
    </div>
</body>

</html>

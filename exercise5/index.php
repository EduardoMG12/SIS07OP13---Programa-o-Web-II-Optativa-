<?php
session_start();

function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

$mensagem = '';
$tipoMensagem = 'info';

if (isset($_GET['limpar']) && $_GET['limpar'] === '1') {
    unset($_SESSION['nome_ex5'], $_SESSION['telefone_ex5']);
    $mensagem = 'Os dados salvos na sessao foram removidos.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome !== '' && $telefone !== '') {
        $_SESSION['nome_ex5'] = $nome;
        $_SESSION['telefone_ex5'] = $telefone;
        $mensagem = 'Nome e telefone foram gravados em duas variaveis $_SESSION diferentes.';
        $tipoMensagem = 'sucesso';
    } else {
        $mensagem = 'Preencha nome e telefone para salvar os dados.';
        $tipoMensagem = 'erro';
    }
}

$nomeExiste = isset($_SESSION['nome_ex5']);
$telefoneExiste = isset($_SESSION['telefone_ex5']);
$nomeVazio = empty($_SESSION['nome_ex5']);
$telefoneVazio = empty($_SESSION['telefone_ex5']);
$nomeSalvo = $_SESSION['nome_ex5'] ?? '';
$telefoneSalvo = $_SESSION['telefone_ex5'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 5 - Verificando a Array $_SESSION</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Exercicio 5 - Verificando a Array $_SESSION</h1>
        <p>Formulario de armazenamento temporario usando <code>isset()</code>, <code>empty()</code> e estrutura <code>if...else</code>.</p>

        <form class="formulario" action="index.php" method="POST">
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?= escapar($nomeSalvo) ?>" required>
            </div>

            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="<?= escapar($telefoneSalvo) ?>" required>
            </div>

            <div class="acoes">
                <button class="botao" type="submit">Salvar na sessao</button>
                <a class="botao secundario" href="index.php?limpar=1">Limpar dados</a>
            </div>
        </form>

        <?php if ($mensagem !== ''): ?>
            <div class="mensagem <?= $tipoMensagem ?>">
                <?= escapar($mensagem) ?>
            </div>
        <?php endif; ?>

        <section class="bloco">
            <h2>Verificacao com isset() e empty()</h2>
            <table>
                <tr>
                    <th>Expressao</th>
                    <th>Resultado</th>
                </tr>
                <tr>
                    <td><code>isset($_SESSION['nome_ex5'])</code></td>
                    <td><?= $nomeExiste ? 'true' : 'false' ?></td>
                </tr>
                <tr>
                    <td><code>empty($_SESSION['nome_ex5'])</code></td>
                    <td><?= $nomeVazio ? 'true' : 'false' ?></td>
                </tr>
                <tr>
                    <td><code>isset($_SESSION['telefone_ex5'])</code></td>
                    <td><?= $telefoneExiste ? 'true' : 'false' ?></td>
                </tr>
                <tr>
                    <td><code>empty($_SESSION['telefone_ex5'])</code></td>
                    <td><?= $telefoneVazio ? 'true' : 'false' ?></td>
                </tr>
            </table>
        </section>

        <section class="bloco">
            <h2>Dados armazenados</h2>

            <?php if ($nomeExiste && !$nomeVazio && $telefoneExiste && !$telefoneVazio): ?>
                <table>
                    <tr>
                        <th>Campo</th>
                        <th>Valor salvo</th>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td><?= escapar($nomeSalvo) ?></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><?= escapar($telefoneSalvo) ?></td>
                    </tr>
                </table>
            <?php else: ?>
                <div class="mensagem info">
                    Nenhum dado valido foi salvo ainda na sessao.
                </div>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>

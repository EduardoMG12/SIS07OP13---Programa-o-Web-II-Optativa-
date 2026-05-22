<?php
session_start();

$usuarioValido = 'admin';
$senhaValida = '123456';
$hashValida = password_hash($senhaValida, PASSWORD_DEFAULT);

$mensagem = '';
$tipoMensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuarioValido && password_verify($senha, $hashValida)) {
        $_SESSION['autenticado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard.php');
        exit;
    }

    $mensagem = 'Usuário ou senha incorretos.';
    $tipoMensagem = 'erro';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 10 - Login com Hash</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Exercicio 10 - Login com Segurança</h1>
        <p>
            Este exercício demonstra o uso de <code>password_hash()</code> e
            <code>password_verify()</code> para autenticação segura.
        </p>

        <div class="bloco">
            <h2>Demonstração do Hash</h2>
            <p><strong>Senha definida:</strong> <code><?= $senhaValida ?></code></p>
            <p><strong>Hash gerado com <code>password_hash()</code>:</strong></p>
            <pre class="hash"><?= $hashValida ?></pre>
            <p class="nota">
                O hash muda a cada execução (salt aleatório), mas o
                <code>password_verify()</code> consegue validar a senha original.
            </p>
        </div>

        <div class="bloco">
            <h2>Login</h2>
            <p>Use o usuário <strong>admin</strong> e senha <strong>123456</strong>.</p>

            <?php if ($mensagem !== ''): ?>
                <div class="mensagem <?= $tipoMensagem ?>">
                    <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>

            <form class="formulario" method="POST">
                <div class="campo">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>

                <div class="campo">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <div class="acoes">
                    <button class="botao" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

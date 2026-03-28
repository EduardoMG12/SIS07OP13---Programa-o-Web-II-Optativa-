<?php
require_once 'funcoes.php';

$mensagem = obterMensagem();
$contatos = listarContatos();
$agendaVazia = empty($contatos);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 7 - Agenda</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Exercicio 7 - Agenda de Contatos</h1>
        <p>Atividade final da sequencia: cadastrar nome e telefone, processar os dados separadamente e mostrar a lista atualizada abaixo do formulario.</p>

        <form class="formulario" action="processar.php" method="POST">
            <div class="campo">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="campo">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>

            <div class="acoes">
                <button class="botao" type="submit">Adicionar contato</button>
            </div>
        </form>

        <?php if (!$agendaVazia): ?>
            <form class="acoes-secundarias" action="limpar.php" method="POST">
                <button class="botao secundario" type="submit">Limpar agenda</button>
            </form>
        <?php endif; ?>

        <?php if ($mensagem['texto'] !== ''): ?>
            <div class="mensagem <?= escapar($mensagem['tipo']) ?>">
                <?= escapar($mensagem['texto']) ?>
            </div>
        <?php endif; ?>

        <section class="bloco">
            <h2>Lista de contatos</h2>

            <?php if ($agendaVazia): ?>
                <div class="mensagem info">
                    Nenhum contato foi cadastrado ainda.
                </div>
            <?php else: ?>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                    </tr>
                    <?php foreach ($contatos as $indice => $contato): ?>
                        <tr>
                            <td><?= $indice + 1 ?></td>
                            <td><?= escapar($contato['nome']) ?></td>
                            <td><?= escapar($contato['telefone']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>

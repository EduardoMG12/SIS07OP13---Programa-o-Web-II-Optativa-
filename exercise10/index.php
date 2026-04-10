<?php
require_once 'conexao.php';

// Recuperacao dos dados - Livros
$sqlLivros = "SELECT * FROM livros";
$resultadoLivros = $conexao->query($sqlLivros);

// Recuperacao dos dados - Pessoa
$sqlPessoa = "SELECT * FROM pessoa";
$resultadoPessoa = $conexao->query($sqlPessoa);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 10 - Consulta ao Banco de Dados</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Exercicio 10 - Consulta ao Banco de Dados</h1>
        <p>Recuperacao de dados do banco <strong>sisbiblioteca</strong> usando MySQLi orientado a objetos.</p>

        <section class="bloco">
            <h2>Livros</h2>

            <?php if ($resultadoLivros && $resultadoLivros->num_rows > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Autor</th>
                        <th>Status</th>
                    </tr>
                    <?php while ($livro = $resultadoLivros->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($livro['id']) ?></td>
                            <td><?= htmlspecialchars($livro['nome']) ?></td>
                            <td><?= htmlspecialchars($livro['autor']) ?></td>
                            <td>
                                <span class="badge <?= $livro['status'] ? 'disponivel' : 'indisponivel' ?>">
                                    <?= $livro['status'] ? 'Disponivel' : 'Indisponivel' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <div class="mensagem info">Nenhum livro encontrado no banco de dados.</div>
            <?php endif; ?>
        </section>

        <section class="bloco">
            <h2>Pessoas</h2>

            <?php if ($resultadoPessoa && $resultadoPessoa->num_rows > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                    </tr>
                    <?php while ($pessoa = $resultadoPessoa->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($pessoa['id']) ?></td>
                            <td><?= htmlspecialchars($pessoa['cpf']) ?></td>
                            <td><?= htmlspecialchars($pessoa['nome']) ?></td>
                            <td><?= htmlspecialchars($pessoa['telefone']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <div class="mensagem info">Nenhuma pessoa encontrada no banco de dados.</div>
            <?php endif; ?>
        </section>
    </div>

    <?php $conexao->close(); ?>
</body>

</html>

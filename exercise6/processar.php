<?php
require_once 'funcoes.php';

$nome = receberNome($_POST['nome'] ?? '');
$nomeValido = nomeFoiInformado($nome);
$tituloPagina = 'Exercicio 6 - Resultado do Processamento';

include 'cabecalho.php';
?>
        <section class="bloco">
            <?php if ($nomeValido): ?>
                <div class="mensagem sucesso">
                    <?= escapar(montarMensagemBoasVindas($nome)) ?>
                </div>

                <table>
                    <tr>
                        <th>Item</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
                        <td>Nome recebido do formulario</td>
                        <td><?= escapar($nome) ?></td>
                    </tr>
                    <tr>
                        <td>Funcao utilizada</td>
                        <td><code>montarMensagemBoasVindas()</code></td>
                    </tr>
                    <tr>
                        <td>Arquivo carregado com require_once</td>
                        <td><code>funcoes.php</code></td>
                    </tr>
                </table>
            <?php else: ?>
                <div class="mensagem erro">
                    Nenhum nome valido foi informado.
                </div>
            <?php endif; ?>
        </section>

        <a class="botao secundario" href="index.php">Voltar</a>
<?php include 'rodape.php'; ?>

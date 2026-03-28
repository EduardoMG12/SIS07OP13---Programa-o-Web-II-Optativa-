<?php
require_once 'funcoes.php';

$tituloPagina = 'Exercicio 6 - Include, Require_once e Funcoes';
include 'cabecalho.php';
?>
        <section class="bloco">
            <h2>Objetivo</h2>
            <p>Este exercicio treina a reutilizacao de codigo com <code>include</code> e o carregamento de funcoes com <code>require_once</code>.</p>
            <ul class="lista">
                <li><code>cabecalho.php</code> e <code>rodape.php</code> sao inseridos na pagina com <code>include</code>.</li>
                <li><code>funcoes.php</code> possui as funcoes utilizadas no processamento.</li>
                <li>O formulario envia um nome para outra pagina, que chama uma funcao PHP para montar a mensagem final.</li>
            </ul>
        </section>

        <section class="bloco">
            <h2>Formulario</h2>
            <form class="formulario" action="processar.php" method="POST">
                <div class="campo">
                    <label for="nome">Digite seu nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <button class="botao" type="submit">Enviar nome</button>
            </form>
        </section>
<?php include 'rodape.php'; ?>

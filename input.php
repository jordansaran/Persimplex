<?php
    include 'Restricao.php';

    $decisoes = $_POST['decisoes'];
    $restricoes = $_POST['restricoes'];

    $restricao = new Restricao($decisoes, $restricoes);
?>


<?php include ('header.php'); ?>
<main>
    <form action="problem.php" method="post">
        <div id="page2" class="col s12">
            <div id="principal" class="container z-depth-5">
                <div class="row col s12">
                    <div class="input-field col s12">
                        <select name="funcao" id="funcao">
                            <option value="1" selected>Maximizar</option>
                        </select>
                        <label for="funcao">Qual o objetivo da função ?</label>
                    </div>
                </div>
                <div id="listaDecisoes" class="row col s12">
                    <label class="col s1">Função:</label>
                    <?php
                        $restricao->setTipodecisao('DecisaoVariavel');
                        $restricao->getFuncao();
                    ?>
                </div>
                <div class="row col s12">
                    <label cclass="col s1" >Restrições:</label>
                    <?php $restricao->getRestricao(); ?>
                </div>
                <div class="row hide">
                    <div class="input-field">
                        <input id="nDecisoes" type="number" class="hide" name="nDecisoes" value="<?= $restricao->getNumerodecisao(); ?>">
                    </div>
                    <div class="input-field">
                        <input id="nRestricoes" type="number" class="hide" name="nRestricoes" value="<?= $restricao->getNumeroRestricao(); ?>">
                    </div>
                </div>
                <div class="row col s12">
                    <button id="btnSolucionar" class="btn waves-effect waves-light col s4 light-green right" type="submit" name="action">Solucionar problema
                        <i class="material-icons right">send</i>
                    </button>
                    <a id="btnVoltar" class="btn waves-effect waves-light col s4 red left" href="index.php" name="voltar">Voltar</a>
                </div>
            </div>
        </div>
    </form>
</main>
<?php include ('footer.php'); ?>
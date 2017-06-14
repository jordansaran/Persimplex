<?php
    include 'Restricao.php';

    $decisoes = $_POST['decisoes'];
    $restricoes = $_POST['restricoes'];
    $interacoes = $_POST['interacoes'];

    if ( $interacoes == 0 ) $interacoes = 20;

    $restricao = new Restricao($decisoes, $restricoes, $interacoes);
?>


<?php include ('header.php'); ?>
<main>
    <form action="problem.php" method="post">
        <div id="page2" class="col l12 m6 s3">
            <div id="principal" class="container z-depth-5">
                <div class="row col l12 m6 s3">
                    <div class="input-field col l12 m6 s3">
                        <select name="funcao" id="funcao">
                            <option value="1" selected>Maximizar</option>
                            <option value="2">Minimizar</option>
                        </select>
                        <label for="funcao">Qual o objetivo da função ?</label>
                    </div>
                </div>
                <div class="row col l12 m6 s3">
                    <label for="passoapasso" class="black-text">Deseja permitir visualizar a soluçnåo problema em forma de passoa a passo?</label>
                    <div id="passoapasso" class="switch">
                        <label class="black-text">
                            Não
                            <input class="light-green" value="1" name="passoapasso" type="checkbox">
                            <span class="lever"></span>
                            Sim
                        </label>
                    </div>
                </div>
                <div id="listaDecisoes" class="row col l12 m6 s3">
                    <label class="col l12 m6 s3 black-text">Função:</label>
                    <div id="qtdeDecisoes" class="row col l12 m6 s3">
                        <?php
                            $restricao->setTipodecisao('DecisaoVariavel');
                            $restricao->getFuncao();
                        ?>
                    </div>
                </div>
                <div class="row col l12 m6 s3">
                    <label class="col l12 m6 s3 black-text">Restrições:</label>
                    <?php $restricao->getRestricao(); ?>
                </div>
                <div class="row hide">
                    <div class="input-field">
                        <input id="nDecisoes" type="number" class="hide" name="nDecisoes" value="<?= $restricao->getNumerodecisao(); ?>">
                    </div>
                    <div class="input-field">
                        <input id="nRestricoes" type="number" class="hide" name="nRestricoes" value="<?= $restricao->getNumeroRestricao(); ?>">
                    </div>
                    <div class="input-field">
                        <input id="nInteracoes" type="number" class="hide" name="nInteracoes" value="<?= $interacoes; ?>">
                    </div>
                </div>
                <?php
                    $x = "";
                    for($i = 1; $i <= $decisoes;$i++)
                      if ($i == $decisoes) $x = $x.'x'.$i;
                      else $x = $x.'x'.$i.', ';
                    $x = $x.' >= 0';
                ?>
                <div class="row l12 m6 s3">
                    <p class="black-text center"><?= $x; ?></p>
                </div>
                <div class="row col l12 m6 s3">
                    <button id="btnSolucionar" class="btn waves-effect waves-light col l4 m2 s1 light-green right" type="submit" name="action">Solucionar problema
                        <i class="material-icons right">send</i>
                    </button>
                    <a id="btnVoltar" class="btn waves-effect waves-light col l4 m2 s1 red left" href="index.php" name="voltar">Voltar</a>
                </div>
            </div>
        </div>
    </form>
</main>
<?php include ('footer.php'); ?>
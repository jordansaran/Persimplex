<?php
    include 'Simplex.php';

    $nDecisoes = $_POST['nDecisoes'];
    $nRestricoes = $_POST['nRestricoes'];
    $funcao = $_POST['DecisaoVariavel'];
    $base = $_POST['base'];
    $tipo_funcao = $_POST['funcao'];
    $interacoes = $_POST['nInteracoes'];

    if (isset($_POST['passoapasso'])) $passoapasso = boolval($_POST['passoapasso']);
    else $passoapasso = false;

    $restricao = array();
    for ($i = 1; $i <= $nRestricoes; $i++) array_push($restricao, $_POST['RestricaoVariavel'.$i]);

    $opcaoRestricao = $_POST['opcaoRestricao'];

    $simplex = new Simplex($tipo_funcao, $nDecisoes, $nRestricoes, $funcao, $restricao, $opcaoRestricao, $base, $interacoes);

    if ($tipo_funcao == 1) $simplex->maximizar();

?>

<?php include 'header.php'; ?>
<main>
    <div class="row col s12 m6 l3">
        <a id="btnVoltar" class="btn waves-effect waves-light col l12 m6 s3 red right" href="javascript:history.back()" name="voltar" style="margin-top: 10px;">Voltar</a>
    </div>
    <div class="container" style="border-top: 15px;">
        <div class="row">
            <br/>
            <?php
                if ($passoapasso)
                {
                    for ($i = 0; $i < count($simplex->lista_tabela); $i++) { ?>
                        <h6>Interação: <?= ($i + 1) ?></h6>
                        <table class="responsive-table highlight">
                            <thead>
                            <tr>
                                <?php foreach ($simplex->lista_tabela[$i][0] as $head) {
                                    echo '<th>' . $head . '</th>';
                                } ?>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            for ($w = 1; $w <= $simplex->nRestricoes + 1; $w++) {
                                echo '<tr>';
                                foreach ($simplex->lista_tabela[$i][$w] as $value) {
                                    echo '<td>' . $value . '</td>';
                                }
                                echo '</tr>';
                            } ?>
                            </tbody>
                        </table>
                        <br/>
                        <?php
                    }
                }
                else
                { ?>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <?php foreach ($simplex->tabela[0] as $head) {
                                echo '<th>' . $head . '</th>';
                            } ?>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        for ($i = 1; $i <= $simplex->qtdeRestricao; $i++) {
                            echo '<tr>';
                            foreach ($simplex->tabela[$i] as $value) {
                                echo '<td>' . $value . '</td>';
                            }
                            echo '</tr>';
                        } ?>
                        </tbody>
                    </table>
                    <br/>
        <?php   }  ?>
        </div>
        <div class="row">
            <h6 class="border">Melhor Solucão</h6>
            <?php
                foreach ($simplex->melhorSolucao() as $value)
                    echo '<p>'.$value[0].' = '.$value[1];

                echo '<p>'.$simplex->restoSolucao().'</p>';
            ?>
        </div>
    </div>
    <div class="row col s12 m6 l3">
        <a id="btnVoltar" class="btn waves-effect waves-light col l12 m6 s3 red right" href="javascript:history.back()" name="voltar" style="margin-top: 10px;">Voltar</a>
    </div>
</main>
<?php include 'footer.php'; ?>
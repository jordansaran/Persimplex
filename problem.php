<?php
    include 'Simplex.php';

    $nDecisoes = $_POST['nDecisoes'];
    $nRestricoes = $_POST['nRestricoes'];
    $funcao = $_POST['DecisaoVariavel'];
    $base = $_POST['base'];

    $restricao = array();
    for ($i = 1; $i <= $nRestricoes; $i++) array_push($restricao, $_POST['RestricaoVariavel'.$i]);

    $simplex = new Simplex($nDecisoes, $nRestricoes, $funcao, $restricao, $base);
    $simplex->maximizar();

?>

<?php include 'header.php'; ?>
<main>
    <div class="row container" style="border-top: 15px;">
        <div class="row">
            <br/>
            <?php for ($i= 0; $i < count($simplex->lista_tabela);$i++) { ?>
                <h6>Interação: <?= ($i + 1) ?></h6>
                <table class="responsive-table highlight">
                    <thead>
                    <tr>
                        <?php foreach ($simplex->lista_tabela[$i][0] as $head) {
                            echo '<th>'.$head.'</th>';
                        } ?>
                    </tr>
                    </thead>

                    <tbody>
                        <?php
                            for($w = 1; $w <= $simplex->nRestricoes + 1;$w++) {
                                echo '<tr>';
                                    foreach ($simplex->lista_tabela[$i][$w] as $value)
                                    {
                                        echo '<td>'.$value.'</td>';
                                    }
                                echo '</tr>';
                        } ?>
                    </tbody>
                </table>
                <br/>
            <?php } ?>

        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
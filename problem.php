<?php
    include 'Simplex.php';

    $nDecisoes = $_POST['nDecisoes'];
    $nRestricoes = $_POST['nRestricoes'];
    $funcao = $_POST['DecisaoVariavel'];
    $base = $_POST['base'];

    $restricao = array();
    for ($i = 1; $i <= $nRestricoes; $i++) array_push($restricao, $_POST['RestricaoVariavel'.$i]);

    $simplex = new Simplex($nDecisoes, $nRestricoes, $funcao, $restricao, $base);
?>

<?php include 'header.php'; ?>
<main>
    <div class="row container" style="border-top: 15px;">
        <div class="row">
            <?php echo print_r($simplex->zerarLinha()); ?>
            <table class="responsive-table highlight">
                <thead>
                <tr>
                    <?php
                    foreach ( $simplex->tabela[0] as $head )
                        echo '<th>'.$head.'</th>';
                    ?>
                </tr>
                </thead>

                <tbody>
                <?php
                for ($i = 1; $i <= $simplex->qtdeRestricao;$i++)
                {
                    echo '<tr>';
                    foreach ($simplex->tabela[$i] as $value)
                        echo '<td>'.$value.'</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
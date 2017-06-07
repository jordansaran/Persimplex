<?php
    include 'Simplex.php';

    $nDecisoes = $_POST['nDecisoes'];
    $nRestricoes = $_POST['nRestricoes'];
    $funcao = $_POST['DecisaoVariavel'];
    $base = $_POST['base'];

    $restricao = array();
    for ($i = 1; $i <= $nDecisoes; $i++) array_push($restricao, $_POST['RestricaoVariavel'.$i]);

    $simplex = new Simplex($nDecisoes, $nRestricoes, $funcao, $restricao, $base);
?>

<?php include 'header.php'; ?>
<main>
    <h1 class="center"><i class="large material-icons">warning</i> Em construção.</h1>
    <?php echo print_r($simplex->tabela); ?>
</main>
<?php include 'footer.php'; ?>
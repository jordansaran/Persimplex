<?php
    $decisoes = 4;
    $restricoes = 5;
?>

<?php include ('header.php'); ?>
<main>
    <div id="page2" class="container">
        <div id="principal" class="container z-depth-5">
            <div class="row col s12">
                <div class="input-field col s12">
                    <select name="funcao" id="funcao">
                        <option value="1" selected>Maximizar</option>
                    </select>
                    <label for="funcao">Qual o objetivo da função ?</label>
                </div>
            </div>
            <div class="row col s12">
                <label class="col s1" for="funcao">Função</label>
                <?php for($i = 1; $i <= $decisoes; $i++) { ?>
                    <div class="input-field col s1">
                        <input id="variavel<?=$i?>" type="number" class="validate black-text" name="variavel<?=$i?>">
                        <h6 class="col s1">+</h6>
                        <label for="variavel<?=$i?>">X<?=$i?></label>
                    </div>
                <?php } ?>
            </div>
            <div class="row col s12">
                <button id="btnSolucionar" class="btn waves-effect waves-light col s12 blue" type="button" name="solucionar">Solucionar problema
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php'); ?>
<main>
    <form action="input.php" method="post">
        <div id="page1" class="container">
            <div class="row col s12">
                <div id="principal" class="container z-depth-5">
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="metodo" id="metodo">
                                <option value="1" selected>Simplex</option>
                            </select>
                            <label for="metodo">Metódo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="decisao" type="number" class="validate black-text tooltipped" name="decisoes" value="2" min="2" max="5" data-position="top" data-delay="3" data-tooltip="Número de variáveis de decisão para solucionar o problema">
                            <label for="decisao">Quantas variáveis de decisão o problema contém ?</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="restricao" type="number" class="validate black-text tooltipped" name="restricoes" value="0" min="1" max="5" data-position="top" data-delay="3" data-tooltip="Número de variáveis de restrições para solucionar o problema">
                            <label for="restricao">Quantidade de restrições ?</label>
                        </div>
                    </div>
                    <div class="row">
                        <button id="btnContinuar" class="btn waves-effect waves-light col s12 light-green tooltipped" type="submit" name="action" data-position="bottom" data-delay="3" data-tooltip="Botão para enviar o número de decisões e restriçõs do simplex">Continuar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
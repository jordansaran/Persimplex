<main>
    <form action="input.php" method="post">
        <div id="page1" class="container">
            <div class="row">
                <div id="principal" class="container z-depth-5">
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="input-field col l12 m6 s3">
                            <i class="material-icons prefix">mode_edit</i>
                            <select name="metodo" id="metodo">
                                <option value="1" selected>Simplex</option>
                            </select>
                            <label for="metodo">Metódo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l4 m2 s1">
                            <i class="material-icons prefix">subtitles</i>
                            <input id="decisao" type="number" class="validate black-text tooltipped" name="decisoes" value="1" step="1" data-position="top" data-delay="3" data-tooltip="Número de variáveis de decisão para solucionar o problema">
                            <label for="decisao">Quantas variáveis de decisão o problema contém ?</label>
                        </div>
                        <div class="input-field col l4 m2 s1">
                            <i class="material-icons prefix">web</i>
                            <input id="restricao" type="number" class="validate black-text tooltipped" name="restricoes" value="0" min="0" data-position="top" data-delay="3" data-tooltip="Número de variáveis de restrições para solucionar o problema">
                            <label for="restricao">Quantidade de restrições ?</label>
                        </div>
                        <div class="input-field col l4 m2 s1">
                            <i class="material-icons prefix">toc</i>
                            <input id="interacao" type="number" class="validate black-text tooltipped" name="interacoes" value="0" step="1" data-position="top" data-delay="3" data-tooltip="Número de interações desejadas, se for 0, será realizado no máximo 20 interações">
                            <label for="interacao">Quantidade de interações desejada ?</label>
                        </div>
                    </div>
                    <div class="row">
                        <button id="btnContinuar" class="btn waves-effect waves-light col l12 m6 s3 light-green tooltipped" type="submit" name="action" data-position="bottom" data-delay="3" data-tooltip="Botão para enviar o número de decisões e restriçõs do simplex">Continuar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
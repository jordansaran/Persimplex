<?php
/**
 * Created by PhpStorm.
 * User: jordanferreirasaran
 * Date: 06/06/17
 * Time: 20:35
 */

include "Decisao.php";

class Restricao extends Decisao
{
    private $numeroRestricao;

    public function __construct($numeroDecisoes, $numeroRestricoes)
    {
        $this->setNumerodecisao($numeroDecisoes);
        $this->setNumeroRestricao($numeroRestricoes);
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return mixed
     */
    public function getNumeroRestricao()
    {
        return $this->numeroRestricao;
    }

    /**
     * @param mixed $numeroRestricao
     */
    public function setNumeroRestricao($numeroRestricao)
    {
        $this->numeroRestricao = $numeroRestricao;
    }



    public function getRestricao()
    {
        $this->setTipodecisao('RestricaoVariavel');
        for($i = 1; $i <= $this->getNumeroRestricao(); $i++)
        {
            echo '<div id="listaRestricoes" class="row col s12">';
                $this->getFuncaoRestricao($i);
                echo '<div class="input-field col s1">';
                    echo '<select name="opcaoRestricao[]" id="opcaoRestricao">';
                        echo '<option value="1" selected><=</option>';
                        echo '<option value="2">>=</option>';
                    echo '</select>';
                echo '</div>';
                echo '<div class="input-field col s1">';
                    echo ' <input id="base'.$i.'" type="number" class="validate black-text" name="base[]" value="0" min="0">';
                echo '</div>';
            echo '</div>';
        }
    }
}
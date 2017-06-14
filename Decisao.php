<?php
/**
 * Created by PhpStorm.
 * User: jordanferreirasaran
 * Date: 06/06/17
 * Time: 20:31
 */

class Decisao
{
    private $tipodecisao;
    private $numerodecisao;

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return mixed
     */
    public function getTipodecisao()
    {
        return $this->tipodecisao;
    }

    /**
     * @param mixed $tipodecisao
     */
    public function setTipodecisao($tipodecisao)
    {
        $this->tipodecisao = $tipodecisao;
    }

    /**
     * @return mixed
     */
    public function getNumerodecisao()
    {
        return $this->numerodecisao;
    }

    /**
     * @param mixed $numerodecisao
     */
    public function setNumerodecisao($numerodecisao)
    {
        $this->numerodecisao = $numerodecisao;
    }

    public function getFuncao()
    {
        for($j = 1; $j <= $this->getNumerodecisao(); $j++)
        {
            if ( $j == 1  ) $this->setFuncao($j);
            else $this->setFuncao($j);
        }
    }

    private function setFuncao($count)
    {
        echo '<div class="input-field col s1">';
            echo '<input id="in'.$this->getTipodecisao().$count.'" type="number" class="validate black-text" name="'.$this->getTipodecisao().'[]'.'" value="0" step="0.01">';
            echo '<label for="'.$this->getTipodecisao().$count.'">x'.$count.'</label>';
        echo '</div>';
    }


    public function getFuncaoRestricao($count)
    {
        for($j = 1; $j <= $this->getNumerodecisao(); $j++)
        {
            if ( $j == 1  ) $this->setFuncaoRestricao($count, $j);
            else $this->setFuncaoRestricao($count, $j);
        }
    }

    private function setFuncaoRestricao($restricaoCount, $count)
    {
        echo '<div class="input-field col s1">';
            echo '<input id="in'.$this->getTipodecisao().$count.'" type="number" class="validate black-text" name="'.$this->getTipodecisao().$restricaoCount.'[]'.'" value="0" step="0.01">';
            echo '<label for="'.$this->getTipodecisao().$count.'">x'.$count.'</label>';
        echo '</div>';
    }
}
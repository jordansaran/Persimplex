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
            if ( $j == $this->getNumerodecisao() )
            {
                $this->setFuncao($j);
            }
            else
            {
                $this->setFuncao($j);
                echo '<h6 id="somar" class="col s1">+</h6>';
            }
        }
    }

    private function setFuncao($count)
    {
        echo '<div class="input-field col s1">';
            echo '<input id="in'.$this->getTipodecisao().$count.'" type="number" class="validate black-text" name="'.$this->getTipodecisao().$count.'" value="0">';
            echo '<label for="'.$this->getTipodecisao().$count.'">x'.$count.'</label>';
        echo '</div>';
    }

}
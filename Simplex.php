<?php
/**
 * Created by PhpStorm.
 * User: jordanferreirasaran
 * Date: 06/06/17
 * Time: 17:17
 */

namespace sx;


class Simplex
{
    public $tabela = array();

    function __construct($decisoes, $restricoes, $função)
    {
        $j = 0;
        for ($i = 0; $i <= $restricoes - 1;$i++ )
        {
            $this->tabela['z'][$i] = $j++;
        }
    }
}

$test = new Simplex(2,4, 0);
print_r($test->tabela);
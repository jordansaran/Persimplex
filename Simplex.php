<?php
/**
 * Created by PhpStorm.
 * User: jordanferreirasaran
 * Date: 06/06/17
 * Time: 17:17
 */

class Simplex
{
    public $tabela = array();

    function __construct($decisoes, $restricoes, $função, $restricao, $base)
    {
        //Alimentar a primeira linha da tabela com valores de string
        //Estruturando a tabela como no exercicio do simples
        $this->tabela[0][0] = 'Base';
        for($i = 1;$i <= $decisoes;$i++)
        {
            $xx = 'x'.$i;
            $this->tabela[0][$i] = $xx;
        }

        for($i = 1;$i <= $restricoes;$i++)
        {
            $fx = 'f'.$i;
            $this->tabela[0][$i + $decisoes] = $fx;
        }

        $this->tabela[0][($decisoes + $restricoes + 1)] = 'b';

        ///////////////////////////////////////////////

        for($i = 1; $i <= $restricoes; $i++)
        {
            $fx = 'f'.$i;
            $this->tabela[$i][0] = $fx;

            for($j = 1; $j <= $decisoes; $j++)  $this->tabela[$i][$j] = $restricao[$i - 1][$j - 1];

            //Alimentao com valor de b
            $this->tabela[$i][($decisoes + $restricoes + 1)] = $base[$i - 1];

        }

        $this->tabela[1 + $restricoes][0] = 'Z';
        //Gerar linha de Z
        for($i = 1; $i <= $decisoes; $i++) $this->tabela[1 + $restricoes][$i] = $função[$i - 1];
        for($i = 1; $i <= $restricoes + 1;$i++) $this->tabela[1 + $restricoes][$i + $decisoes] = 0;

    }
}


//$tabela['z'][$i - 1] = $_POST['DecisaoVariavel'.$i];
//if ( $i == $nDecisoes)
//{
//    for($j = 1; $j <= $nRestricoes;$j++,$i++) $tabela['z'][$i] = 0;
//}

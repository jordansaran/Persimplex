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
    public $listaTabela = 0;
    public $qtdeRestricao = 0;

    function __construct($decisoes, $restricoes, $função, $restricao, $base)
    {
        $this->listaTabela = ($decisoes + $restricoes) + 2;
        $this->qtdeRestricao = $restricoes + 1;
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

        //Inserir dados de cada linha.
        for($i = 1; $i <= $restricoes; $i++)
        {
            $fx = 'f'.$i;
            $this->tabela[$i][0] = $fx;

            for($j = 1; $j <= $restricoes; $j++)
            {
                $this->tabela[$i][$j] = $restricao[$i - 1][$j - 1];
            }

            for($w = 1; $w <= $restricoes; $w++)
            {
                if ($i == $w)
                    $this->tabela[$i][$w + $decisoes] = 1;
                else
                    $this->tabela[$i][$w + $decisoes] = 0;
            }

            //Alimentao com valor de b
            $this->tabela[$i][($decisoes + $restricoes + 1)] = $base[$i - 1];
        }

        //Gerar linha de Z
        $this->tabela[1 + $restricoes][0] = 'Z';
        for($i = 1; $i <= $decisoes; $i++) $this->tabela[1 + $restricoes][$i] = intval($função[$i - 1]) * -1 ;
        for($i = 1; $i <= $restricoes + 1;$i++) $this->tabela[1 + $restricoes][$i + $decisoes] = 0;

    }
}
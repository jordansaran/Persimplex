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
    public $lista_tabela = array();
    public $qtdeRestricao = 0;
    public $nDecisoes = 0;
    public $nRestricoes = 0;
    public $qtdeColunasTabela = 0;

    function __construct($decisoes, $restricoes, $função, $restricao, $base)
    {
        $this->qtdeColunasTabela = ($restricoes + $decisoes) + 1;
        $this->qtdeRestricao = $restricoes + 1;
        $this->nDecisoes = $decisoes;
        $this->nRestricoes = $restricoes;

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
        for($i = 1; $i <= $decisoes; $i++) $this->tabela[1 + $restricoes][$i] = intval($função[$i - 1]) * -1;
        for($i = 1; $i <= $restricoes + 1;$i++) $this->tabela[1 + $restricoes][$i + $decisoes] = 0;

        array_push($this->lista_tabela, $this->tabela);
    }

    public function maximizar()
    {
        $interacoes = 20;
        do {
            $interacoes--;
            $this->linhasNulas();
        } while ( $this->validarFuncao() != True || $interacoes == 0);

    }

    public function validarFuncao()
    {
        $validar = True;
        for($i = 1; $i <= $this->nDecisoes; $i++)
        {
            if ( $this->tabela[$this->nRestricoes + 1][$i] != 0 )
            {
                $validar = False;
                break;
            }
        }

        return $validar;
    }

    public function quemSaiDaBse()
    {
        $menorCoficiente = $this->procurarMenorCoficienteFuncao();
        $posicao = 0;
        $valor = 999999999;

        for($i = 1; $i <= $this->nRestricoes;$i++)
        {
            $x = intval($this->tabela[$i][$menorCoficiente]);
            $y = intval($this->tabela[$i][$this->qtdeColunasTabela]);

            if( !$x == 0 )
            {
                if ( ($y / $x) < $valor )
                {
                    $valor = ($y / $x);
                    $posicao = $i;
                }
            }
        }

        $this->tabela[$posicao][0] = $this->tabela[0][$menorCoficiente];

        //Posicao e valor do Pivo.
        return array($posicao, $menorCoficiente, $this->tabela[$posicao][$menorCoficiente]);
    }

    public function linhasNulas()
    {
        $nulo = $this->zerarLinha();
        $posicao = $nulo[0];
        $coeficiente = $nulo[1];

        for($i = 1; $i <= ($this->nRestricoes + 1); $i++)
        {
            if( !$this->tabela[$i][$coeficiente] == 0 && $i != $posicao)
            {
                $valorNegativo = $this->tabela[$i][$coeficiente] * -1;

                for($j = 1; $j <= $this->qtdeColunasTabela;$j++)
                {

                    $this->tabela[$i][$j] = $this->tabela[$posicao][$j] * $valorNegativo + $this->tabela[$i][$j];
                }
            }
        }

        array_push($this->lista_tabela, $this->tabela);
    }

    public function zerarLinha()
    {
        $regras = $this->quemSaiDaBse();

        for($i = 1; $i <= $this->qtdeColunasTabela;$i++) $this->tabela[$regras[0]][$i] = floor($this->tabela[$regras[0]][$i] / $regras[2]);

        return array($regras[0],$regras[1]);
    }

    public function procurarMenorCoficienteFuncao()
    {
        $position = 0;
        $value = 0;
        for($i = 1; $i <= $this->nDecisoes; $i++)
        {
            if ( $this->tabela[count($this->tabela) - 1][$i] < $value )
            {
                $position = $i;
                $value = $this->tabela[count($this->tabela) - 1][$i];
            }
        }

        return $position;
    }
}
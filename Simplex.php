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
    public $nInteracoes = 20;
    public $opcaoRestricoes;
    public $solucao = array();
    public $base = array();

    function __construct($decisoes, $restricoes, $função, $restricao, $opcaoRestricao, $base, $interacoes)
    {
        $this->qtdeColunasTabela = ($restricoes + $decisoes) + 1;
        $this->qtdeRestricao = $restricoes + 1;
        $this->nDecisoes = $decisoes;
        $this->nRestricoes = $restricoes;
        $this->nInteracoes = $interacoes;
        $this->opcaoRestricoes = $opcaoRestricao;
        $this->base = $base;

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

            for($j = 1; $j <= $decisoes; $j++)
            {
                $this->tabela[$i][$j] = floatval($restricao[$i - 1][$j - 1]);
            }

            for($w = 1; $w <= $restricoes; $w++)
            {
                if ($i == $w)
                {
                    if ( intval($this->opcaoRestricoes[$w - 1]) == 1 ) $this->tabela[$i][$w + $decisoes] = 1;
                    elseif ( intval($this->opcaoRestricoes[$w - 1]) == 2 ) $this->tabela[$i][$w + $decisoes] = -1;
                }
                else $this->tabela[$i][$w + $decisoes] = 0;
            }

            //Alimentao com valor de b
            $this->tabela[$i][($decisoes + $restricoes + 1)] = floatval($base[$i - 1]);
        }

        //Gerar linha de Z
        $this->tabela[1 + $restricoes][0] = 'Z';
        for($i = 1; $i <= $decisoes; $i++) $this->tabela[1 + $restricoes][$i] = floatval($função[$i - 1]) * -1;
        for($i = 1; $i <= $restricoes + 1;$i++) $this->tabela[1 + $restricoes][$i + $decisoes] = 0;

        array_push($this->lista_tabela, $this->tabela);
    }

    function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function maximizar()
    {
        for($i = 1; $i <= $this->nInteracoes; $i++)
        {
            if ($this->validarFuncao() !=  True)
            {
                $this->linhasNulas();
            }
        }
    }

    public function minimizar()
    {
        for($i = 1; $i <= $this->nInteracoes; $i++)
        {
            if ($this->validarFuncao() !=  True)
            {
                $this->linhasNulas();
            }
        }
    }

    public function validarFuncao()
    {
        $validar = True;
        for($i = 1; $i <= $this->nDecisoes; $i++)
        {
            if ( $this->tabela[$this->nRestricoes + 1][$i] < 0 )
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

    private function linhasNulas()
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

    private function zerarLinha()
    {
        $regras = $this->quemSaiDaBse();

        for($i = 1; $i <= $this->qtdeColunasTabela;$i++) $this->tabela[$regras[0]][$i] = $this->tabela[$regras[0]][$i] / $regras[2];

        return array($regras[0],$regras[1]);
    }

    private function procurarMenorCoficienteFuncao()
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

    public function melhorSolucao()
    {
        for ($i = 1; $i <= $this->qtdeRestricao ;$i++)
            array_push($this->solucao,[ $this->tabela[$i][0] , $this->tabela[$i][$this->qtdeColunasTabela]]);

        return $this->solucao;
    }

    public function restoSolucao()
    {
        $solucao = array();
        $resto = array();

        $resposta = "";

        for ($i = 0; $i < $this->qtdeRestricao - 1 ;$i++)
            array_push($solucao, $this->solucao[$i][0]);

        for($i = 1; $i <= $this->qtdeColunasTabela -1;$i++)
            array_push($resto, $this->tabela[0][$i]);

        $countResto = count($resto);

        for($i = 0; $i < count($solucao); $i++)
        {
            $posicao = array_search(strval($solucao[$i]), $resto);
            if ($posicao !== false)
                unset($resto[$posicao]);
        }

        for ($i = 0; $i < $countResto; $i++)
            if (isset($resto[$i]))
                $resposta = $resposta.$resto[$i]. ' = ';

        $resposta = $resposta.' 0';

        return $resposta;
    }

    public function precoSombra()
    {
        $sombra = "";
        for($i = ($this->nDecisoes + 1); $i <= $this->qtdeColunasTabela;$i++)
            echo '<p>'.$sombra.$this->tabela[0][$i].' = '.$this->tabela[$this->nRestricoes + 1][$i].'</p>';

        return $sombra;
    }

    public function limiteRestricao()
    {
        $resultado = array();


        for($w = 0; $w < count($this->base); $w++)
        {
            $valor = 0;
            $base = $this->base;
            $base[$w] = 1;
            $conjunto = array();

            for($i = 1; $i <= $this->nRestricoes;$i++)
            {
                for($j= ($this->nDecisoes + 1); $j <= ( $this->qtdeColunasTabela - 1 ) ;$j++)
                {
                       $valor = $valor + ($this->tabela[$i][$j] * $base[$i - 1]);
                       echo $this->tabela[$i][$j].' * '.$base[$i - 1].'<br/>';
                }
                array_push($conjunto, $valor);
            }
            array_push($resultado, $conjunto);
        }

        print_r($resultado);
    }
}
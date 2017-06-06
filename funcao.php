<?php
/**
 * Created by PhpStorm.
 * User: jordanferreirasaran
 * Date: 06/06/17
 * Time: 15:51
 */

function getFuncao($decisao)
{
  for($j = 1; $j <= $decisao; $j++)
  {
    if ( $j == $decisao )
    {
       setFuncao($j);
    }
    else
    {
        setFuncao($j);
        echo '<h6 id="somar" class="col s1">+</h6>';
    }
  }
}

function setFuncao($j)
{
    echo '<div class="input-field col s1">';
        echo '<input id="variavel'.$j.'" type="number" class="validate black-text" name="variavel'.$j.'" value="0">';
        echo '<label for="variavel'.$j.'">x'.$j.'</label>';
    echo '</div>';
}

function getRestricao($decisao, $restricao)
{
    for($i = 1; $i <= $restricao; $i++)
    {
        echo '<div class="row col s12">';
            getFuncao($decisao);
            echo '<div class="input-field col s1">';
                echo '<select name="opcao" id="opcao">';
                    echo '<option value="1" selected><=</option>';
                echo '</select>';
            echo '</div>';
            echo '<div class="input-field col s1">';
                echo ' <input type="number" class="validate black-text" name="valor">';
            echo '</div>';
        echo '</div>';
    }
}


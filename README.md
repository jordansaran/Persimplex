# Persimplex

[Abrir aplicação online - Simplex](http://persimplex.herokuapp.com)

Projeto de Pesquisa Operacional - 5º semestre BSI

### Membros
1. Jordan Ferreira Saran, RA: 44905-9
2. Valdeir da Silva Neto, RA: 54083-8
3. William Rodrigues Martins Ferreira, RA: 55213-5
4. Marcelo de Souza Santos, RA: 55240-2

## Introdução
Este documento provê uma visão geral da versão do aplicativo Simplex que está sendo liberada.
Aqui será descrito as funcionalidades do aplicativo, bem como seus problemas e limitações conhecidos.
Por último são descritas as demandas e os problemas que foram resolvidos para liberação da versão atual.

O Método Simplex é um procedimento matricial usado para resolver os modelos de
programação linear, visando buscar a solução ótima para o problema.

## Notas de release

### Simplex

* Escolha do tipo método para solução;
* Quantidade ilimitada de variáveis e restrições'
* Quantidade específica de limitações, onde caso não seja atribuiada o mesmo terá o limite de 20 interações.
* Possibilidade mostrar passo a psso  ou somente o resultado final;
* Tabela de Sensibilidade, contendo, preços sobmras e limite de restrições;
* Posibilidade escolher tipo restrição;
* Disponibilidade de escolha do objetivo da função do problema.

## Datas importantes

### Simplex

| Data  | Evento    |
|:-----:|-----------|
| 17/05/2017    | Início do projeto.   |
| 22/05/2017    | Análise de tecnologias.   |
| 24/05/2017    | Início do desenvolvimento da aplicação.   |
| 27/05/2017    | Criação do layout da aplicação.  |
| 31/05/2017    | Maximizar problemas de programação linear utilizando o método simplex.  |
| 03/06/2017    | Variáveis de folga.  |
| 06/06/2017    | Elaboração das tabelas de apresentação para o usuário.  |
| 07/06/2017    | Minimizar problemas de programação linear utilizando o método simplex.  |
| 10/06/2017    | Variáveis de excesso.  |
| 11/06/2017    | Análise de sensibilidade - Preços sombra.  |
| 12/06/2017    | Elaboração do Passo a passo.  |
| 14/06/2017    | Análise de sensibilidade - Limite das variáveis de folga/exceção.  |
| 16/06/2017    | Criando README.  |


## Compatibilidade

| Requisitos    | Ferramentas   |
|---------------|---------------|
| Navegadores   | Google Chrome, Mozilla Firefox, Opera, Safari, Microsoft Edge e Internet Explorer 9+.     |
| Sistemas Operacionais     | UNIX, Mac OS X, Windows.    |

## Tecnologias

| Tecnologias   | Descrição |
|:-------------:|-----------|
| Front-end | HTML, CSS, [Jquery](https://jquery.com) |
| Back-end  | [PHP 5.6](https://secure.php.net/downloads.php#v5.6.30)  |
| Frameworks    | [Materialize](http://materializecss.com) |
| IDE    | [PhpStorm](https://www.jetbrains.com/phpstorm/)     |
| Servidor  | [Heroku](https://www.heroku.com/)    |

## Atividades realizadas no período

### Simplex

| Código    | Título    | Tarefa    | Situação  |
|:---------:|-----------|-----------|:---------:|
| 1 | Maximizar  |  Possibilita o usuário a maximizar modelos de simplex com sistemas lineares.   | Concluído 
| 2 | Maximizar - Variável de Folga e exceção   | Possibilita o usuário a maximizar modelos de simplex podendo escolher `<=` ou `>=`.  | Concluído ||
| 3 | Minimizar   | Possibilita o usuário a minimizar modelos de simplex com sistemas lineares.  | Concluído |
| 4 | Minimizar - Variável de Folga e exceção   | Possibilita o usuário a Minimizar modelos de simplex podendo escolher `<=` ou `>=`.  | Concluído ||
| 5 | Quantidade de interações     | Possibilita ao usuário definir quantas interações ele deseja realizar para solução do problema.     | Concluído     |
| 6 | Demonstrar passo a passo      | Demostrar ao usuário o passo de como o problema foi resolvido.     | Concluído     |
| 7 | Análise de Sensibilidade - Preços Sombras     | Mostrar ao usuário os preços sombras das variáveis de folga ou exceção.     | Concluído     |
| 8 | Análise de Sensibilidade - Limite de Interações     | Mostrar ao usuário o limite de restrições, sendo, o menor e maior possiveis alterações em seus valores que não iriam implicar na função objetivo.     | Concluído     |

## Guia de uso do Simplex

### Expressão

Escolha o tipo de método para solução do problema, neste caso só possuimos um único tipo, sendo ele, o método simplex.

Em seguida, escolha a quantidade de variáveis de decisão, restrição e interações para solução do problema.

Caso a quantidade de interações permaneça como "0", a aplicação irá limitar a quantidade para no máximo 20 interações.
 
Escolha o tipo de função objetivo.  
  
Exemplo de expressão:

* Max Z = 3x1 + 5x2
* Min Z = -3x1 - 5x2

### Restrições

Exemplos de restrições:

* x1 <= 4
* x2 <= 6
* 3x1 + 2x2 <= 18

### Apresentação do Resultado
Selecione a forma de apresentação do resultado, todas as iterações ou somente a tabela com o resultado final.

### Maximizar / Minimizar
O resultado é apresentado após o calculo a solução ótima do problema de programção linear proposto.
Se ao final do processo a solução não for ótima, é porque um dos pontos adjacentes fornece um valor
maior que o inicial.

### Análise de Sensibilidade
A Análise de Sensibilidade é uma análise pós-otimização que busca verificar os efeitos causados
ao PPL devido as possíveis variações (aumentando ou diminuindo) dos valores dos coeficientes das
variáveis, tanto da função objetivo como nas restrições além das disponibilidades dos recursos
mencionados nas restrições (termos constantes).
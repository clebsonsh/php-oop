<?php

// booleano pode ser TRUE ou FALSE
$exibir_nome = TRUE; // declara variável com valor TRUE
// testa se $exibir_nome é TRUE
if ($exibir_nome) {
    echo 'José da Silva';
}

echo PHP_EOL;

$umidade = 91; // declara variável numérica
// testa se é maior que 90. Retorna um booleano
$vai_chover = ($umidade > 90);
// testa se $vai_chover é verdadeiro
if ($vai_chover) {
    echo 'Vai chover';
}

echo PHP_EOL;

// numérico
$a = 1234; // número decimal
$a = -123; // um número negativo
$a = 0123; // número octal (equivalente a 83 em decimal)
$a = 0x1A; // número hexadecimal (equivalente a 26 em decimal)
$a = 1.234; // ponto flutuante
$a = 4e23; // notação científica

// string é uma cadeia de caracteres
// Pode ser declarado com aspas simples ou duplas
$variavel = 'Isto é um teste';
$variavel = "Isto é um teste";

// array é uma lista valores que podem ser de tipos variados
$carros = array('Palio', 'Corsa', 'Gol');
echo $carros[1]; // resultado = 'Corsa'
echo PHP_EOL;

$misto = ['string', 42, false];
echo $misto[1]; // resultado = 42
echo PHP_EOL;

// objeto é uma entidade que encapsula metodos e propriedades
$carro = new stdClass;
$carro->modelo = 'Palio';
$carro->ano = 2002;
$carro->cor = 'Azul';
print_r($carro);
echo $carro->modelo . ' ';
echo $carro->ano . ' ';
echo $carro->cor . ' ';
echo PHP_EOL;

// misto (mixed) é usado para indicar que um parametro pode ser de tipos diversos
function exibeTipo(mixed $paremetro)
{
    echo gettype($paremetro);
    echo PHP_EOL;
}

exibeTipo(['um array']); // resultado = array
exibeTipo('uma string'); // resultado = string
exibeTipo(42); // resultado = integer

// callback (callable) é usado para indicar que uma parametro deve ser uma função
function chamaCallback(callable $callback): void
{
    // vai chamar qualquer função que for passada como parametro
    $callback();
}

$callback = function () {
    echo 'chamaCallback chamou essa função';
};

chamaCallback($callback);
echo PHP_EOL;

// nulo (NULL) signica que a variável não tem valor.
$semValor = NULL;

// Na declaração de uma função podemos declarar o tipo dos parâmetros e do retorno.
// Dependendo do tipo do retorno pode acontecer uma conversão de tipo.
// No caso dessa função o retorno do função seria float, mas é convertido para int
function calcula_imc(float $peso, float $altura): int
{
    var_dump($peso, $altura);
    return $peso / ($altura * $altura);
}

var_dump(calcula_imc('75.1', 2));

function registra_log($mensagem): void {
    file_put_contents('/tmp/system.log', $mensagem. "\n", FILE_APPEND);
}
registra_log('teste');

// Quando os parâmetros da função são tipados, é preciso passar o tipo exato.
// O parâmetro pode ser do tipo bool, float, int, string, array, callable, self
// e o nome de uma classe. Qualquer outra palavra vai causar uma exceção.
function usar_tipo_errado(boolean $test)
{
    var_dump($test);
}

usar_tipo_errado(true);

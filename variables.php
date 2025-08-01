<?php

// definição de uma variável
$nome = 'João';
$sobrenome = 'da Silva';

// exibe as variáveis $sobrenome e $nome
echo "$sobrenome, $nome".PHP_EOL;

$a = 5;
// quando criamos uma variável nova atribyindo outra variável
// é criado um novo espaço em memoria que vai guardar esse valor
$b = $a;

// se modificamos essa nova variável, a antiga permanece intacta
$b = 10;
echo $a; // resultado = 5
echo ' '; // espaço
echo $b; // resultado = 10
echo PHP_EOL;

$a = 5;
// para passar a referência de uma variável devemos usar & na hora de atribuir
$b = &$a;
$b = 10;
echo $a; // resultado = 10
echo ' '; // espaço
echo $b; // resultado = 10
echo PHP_EOL;

// objetos são sempre copiados referência
$a = new stdClass; // cria objeto
$a->nome = 'Maria'; // define atributo
$b = $a; // cria réplica
$b->nome = 'Joana'; // define atributo
echo $a->nome; // resultado = Joana
echo ' '; // espaço
echo $b->nome; // resultado = Joana
echo PHP_EOL;

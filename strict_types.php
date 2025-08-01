<?php

// Com strict_types ativo o PHP muda seu comportamento, não fazendo mais
// conversão automática de tipos. Se uma tipo errado for passado para função
// exceção do tipo TypeError é lançada.
declare(strict_types=1);

function calcula_imc(float $peso, float $altura): float
{
    var_dump($peso, $altura);

    return $peso / ($altura * $altura);
}

var_dump(calcula_imc(75, 1.85));
// strict_types é tem seu escopo restrito ao arquivo. Logo se onde a função é chamada
// é preciso ser declarado strict_types para ter efeito.
var_dump(calcula_imc('75.1', 2));

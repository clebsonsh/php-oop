<?php

class Produto
{
    // Agora os atributos da classe 'Produto' estão protegidos, sendo acessíves
    // somente dentro da classe. O que é uma boa prática.
    private $descricao;

    private $estoque;

    private $preco;
}

$p1 = new Produto;
// Tentar atribuir o valor do atributo 'descricao' vai gerar uma exceção.
$p1->descricao = 'Chocolate';
$p1->estoque = 10;
$p1->preco = 10;

<?php

// Classe serve como a planta para criação de objetos.
// É definido quais serão os atributos e comportamentos (métodos)
// que cada objeto criado com base nessa classe vai poder ter e usar
class Produto
{
    // No caso dessa classe todos os atributos são publicos, logo podem
    // ser acessados e modificados de qualquer lugar. Isso não é uma boa prática.
    public string $descricao;
    public int $estoque;
    public int $preco;
}

// Objeto é materialização de uma clase.
// Instânciamos a classe com a palavra reservada 'new'
// e guardamos uma referência para esse objeto em uma variável.
$p1 = new Produto();
$p1->descricao = "Cholocate";
$p1->estoque = 'Dez unidades';
$p1->preco = 7;

$p2 = new Produto();
$p2->descricao = "Café";
$p2->estoque = 20;
$p2->preco = 4;

var_dump($p1);
var_dump($p2);

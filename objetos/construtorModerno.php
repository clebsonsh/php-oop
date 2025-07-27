<?php

class Produto
{
    // O PHP 8 introduziu a promoção de propriedade do construtor, uma sintaxe abreviada
    // que reduz o código boilerplate ao permitir a declaração e atribuição de
    // propriedades diretamente na lista de parâmetros do construtor.
    function __construct(
        private string $descricao,
        private int    $estoque,
        private float  $preco,
    )
    {
    }

    function getDescricao(): string
    {
        return $this->descricao;
    }

    function getEstoque(): int
    {
        return $this->estoque;
    }

    function getPreco(): float
    {
        return $this->preco;
    }
}

$p1 = new Produto("Chocolate", 10, 5);
print "Descrição: " . $p1->getDescricao() . PHP_EOL;
print "Estoque: " . $p1->getEstoque() . PHP_EOL;
print "Preço: " . $p1->getPreco() . PHP_EOL;

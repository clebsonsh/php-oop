<?php

class Produto
{
    // O PHP 8 introduziu a promoção de propriedade do construtor, uma sintaxe abreviada
    // que reduz o código boilerplate ao permitir a declaração e atribuição de
    // propriedades diretamente na lista de parâmetros do construtor.
    public function __construct(
        private string $descricao,
        private int $estoque,
        private float $preco,
    ) {}

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
}

$p1 = new Produto('Chocolate', 10, 5);
echo 'Descrição: '.$p1->getDescricao().PHP_EOL;
echo 'Estoque: '.$p1->getEstoque().PHP_EOL;
echo 'Preço: '.$p1->getPreco().PHP_EOL;

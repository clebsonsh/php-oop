<?php

class Produto
{
    private $descricao;
    private $estoque;
    private $preco;

    // '__construct' é usado para definir o valor dos atributos de um objeto
    // no memento da sua criação. Tornando setters desnecesários.
    public function __construct($descricao, $estoque, $preco)
    {
        if(is_string($descricao)) {
            $this->descricao = $descricao;
        }

        if(is_int($estoque) and $estoque > 0) {
            $this->estoque = $estoque;
        }

        if(is_numeric($preco) and $preco > 0) {
            $this->preco = $preco;
        }
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function getPreco()
    {
        return $this->preco;
    }
}

$p1 = new Produto("Chocolate", 10, 5);
print "Descrição: " . $p1->getDescricao() . PHP_EOL;
print "Estoque: " . $p1->getEstoque() . PHP_EOL;
print "Preço: " . $p1->getPreco() . PHP_EOL;

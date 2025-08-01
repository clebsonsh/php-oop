<?php

class Produto
{
    private $descricao;

    private $estoque;

    private $preco;

    public function __construct($descricao, $estoque, $preco)
    {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco = $preco;

        echo "CONSTRUÍDO: Objeto: {$this->descricao}, estoque: {$this->estoque}, preco: {$this->preco}".PHP_EOL;
    }

    // '__destruct' será chamado quando o objeto for destrido. Ou seja, quando usamos unset()
    // para destruir o objeto, quando variável que guarda referência para objeto é modificado
    // (para NULL ou outro valor), quando chegamos no final da execução do programa.
    public function __destruct()
    {
        echo "DESTRUÍDO: Objeto: {$this->descricao}, estoque: {$this->estoque}, preco: {$this->preco}".PHP_EOL;
    }
}

$p1 = new Produto('Chocolate', 10, 5);
unset($p1);
$p2 = new Produto('Café', 100, 7);
$p2 = null;
$p3 = new Produto('Açucar', 300, 3);

<?php

class Produto
{
    private $descricao;

    private $estoque;

    private $preco;

    // Esse é um setter, é usado para definir o valor de um atributo de um objeto.
    // O uso de setter nos permite fazer válidação do valor a ser atribuido.
    public function setDescricao($descricao): void
    {
        if (is_string($descricao)) {
            $this->descricao = $descricao;
        }
    }

    // Esse é um getter, é usado para ter acesso a um atributo privade de um objeto.
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setEstoque($estoque): void
    {
        if (is_int($estoque)) {
            $this->estoque = $estoque;
        }
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }
}

$p1 = new Produto;
$p1->setDescricao('Cholocate');
$p1->setEstoque(10);

echo 'Descrição: '.$p1->getDescricao().PHP_EOL;
echo 'Estoque: '.$p1->getEstoque().PHP_EOL;

<?php

class Budget
{
    private array $items;

    public function add(Budgetable $item, int $quantity)
    {
        $this->items[] = [$quantity, $item];
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += ($item[0] * $item[1]->getPrice());
        }

        return $total;
    }
}

<?php

namespace App\Calculator;
abstract class OperatorAbstract
{
    protected $operands;

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}
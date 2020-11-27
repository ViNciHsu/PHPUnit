<?php

namespace App\Calculator;
use App\Calculator\Exceptions\NoOperandsException;

class Addition extends OperatorAbstract implements OperationInterface
{

    public function calculate()
    {
//        $result = 0;
//        foreach ($this->operands as $operand)
//        {
//            $result += $operand;
//        }
//
//        return $result;
        // 上面寫法可換成下方if,count()在php7.2後會出錯
//        if (count($this->operands) === 0) {
//        if (!is_countable($this->operands)) {
        if (!isset($this->operands) || empty($this->operands)
            || is_null($this->operands)) {
            throw new NoOperandsException;
        }

        return array_sum($this->operands);
    }



}
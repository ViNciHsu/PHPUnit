<?php

namespace App\Calculator;
use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperatorAbstract implements OperationInterface
{

    public function calculate()
    {
//        return $result;
        // 上面寫法可換成下方
        if (!isset($this->operands) || empty($this->operands)
            || is_null($this->operands)) {
            throw new NoOperandsException;
        }
        // 寫法1
//        $result = array_shift($this->operands);
//        foreach ($this->operands as $operand){
//            $result /= $operand;
//            echo '<pre>',print_r($result,1),'</pre>';
//        }
//        return $result;

        // 寫法2
//        $result = 0;
//        foreach ($this->operands as $index => $operand) {
//            if ($index === 0)
//            {
//                $result = $operand;
////                echo '<pre>',print_r("if內".$result,1),'</pre>';
//                continue;
//            }
//            $result /= $operand;
////            echo '<pre>',print_r($result,1),'</pre>';
//        }
//        return $result;

        // 寫法3
        // 用array_filter過濾$this->operands
        return array_reduce(array_filter($this->operands), function ($a,$b)
        {
            if($a !== null && $b !== null)
            {
                return $a / $b;
            }

            return $b;
        }, null);
    }
}
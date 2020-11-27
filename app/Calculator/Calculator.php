<?php

namespace App\Calculator;

class Calculator
{
    protected $operations = [];

//    public function __construct(array $operation = [])
//    {
//        $this->operation = $operation;
//    }

    public function setOperaton(OperationInterface $operation)
    {
        $this->operations[] = $operation;
    }

    public function getOperations()
    {
        return $this->operations;
    }

    public function setOperatons(array $operations)
    {
        // 寫法1 判斷如果不是instance的元素要拿掉
//        foreach ($operations as $index => $operation)
//        {
//            if(!$operation instanceof OperationInterface)
//            {
//                unset($operations[$index]);
//            }
//        }

        // 寫法2
        $filteredOperations = array_filter($operations, function ($operation){
//            if(!$operation instanceof OperationInterface){
//               return false;
//            }
//            return true;
            // better,上面if可直接改為如下，會自動回傳true or false
            return $operation instanceof OperationInterface;
        });

        $this->operations = array_merge($this->operations, $filteredOperations);
    }

    public function calculate()
    {
        if(count($this->operations) > 1){
            // 寫法1
//            $result = null;
//
//            foreach ($this->operations as $operation){
//                $result[] = $operation->calculate();
//            }
//
//            return $result;

            // 寫法2 better
            return array_map(function ($operation){
                return $operation->calculate();
            }, $this->operations);
        }

        return $this->operations[0]->calculate();
    }

}
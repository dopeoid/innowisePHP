<?php

class MyCalculator
{
    private int $arg1;
    private int $arg2;
    private int $lastResult;

    public function __construct($arg1, $arg2)
    {
        $this->arg1 = $arg1;
        $this->arg2 = $arg2;
        $this->lastResult = 0;
    }

    public function add()
    {
        $this->lastResult = $this->arg1 + $this->arg2;
        return $this;
    }

    public function multiply()
    {
        $this->lastResult = $this->arg1 * $this->arg2;
        return $this->lastResult;
    }

    public function divide()
    {
        if ($this->arg2 != 0) {
            $this->lastResult = $this->arg1 / $this->arg2;
            return $this->lastResult;
        } else {
            echo 'you cant divide by 0';
            return $this->lastResult;
        }
    }

    public function substract()
    {
        $this->lastResult = $this->arg1 - $this->arg2;
        return $this->lastResult;
    }

    public function addBy($number)
    {
        $this->lastResult += $number;
        return $this->lastResult;
    }

    public function multiplyBy($number)
    {
        $this->lastResult *= $number;
        return $this->lastResult;
    }

    public function divideBy(int $number)
    {
        if ($number != 0) {
            $this->lastResult /= $number;
            return $this->lastResult;
        } else {
            echo 'you cant divide by 0';
            return $this->lastResult;
        }
    }

    public function substractBy($number)
    {
        $this->lastResult -= $number;
        return $this->lastResult;
    }

    public function __toString()
    {
        return (string)$this->lastResult;
    }
}

$mycalc = new MyCalculator(12, 6);
echo $mycalc->add(); // Displays 18
echo $mycalc->multiply(); // Displays 72
// Calculation by chain
echo $mycalc->add()->divideBy(9); // Displays 2 ( (12+6)/9=2 )

<?php

class Matrix
{
    public $matrix;
    public $rows;
    public $columns;

    public function __construct($matrix, int $rows, int $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->matrix = $matrix;
    }

    public function addMatrix(Matrix $secondMatrix): Matrix
    {
        $outputMatrix = new Matrix([[]], 0, 0);
        if ($secondMatrix->columns == $this->columns && $secondMatrix->rows == $this->rows) {
            $outputMatrix->rows = $this->rows;
            $outputMatrix->columns = $this->columns;
            for ($i = 0; $i < $this->rows; ++$i) {
                for ($j = 0; $j < $this->columns; ++$j) {
                    $outputMatrix->matrix[$i][$j] = $secondMatrix->matrix[$i][$j] + $this->matrix[$i][$j];
                }
            }
        } else {
            echo 'you cant add them, the size is not the same';
        }
        return $outputMatrix;
    }

    public function multiplyMatrices(Matrix $secondMatrix): Matrix
    {
        $outputMatrix = new Matrix([[]], 0, 0);
        if ($this->columns == $secondMatrix->rows) {
            for ($i = 0; $i < $this->rows; ++$i) {
                for ($j = 0; $j < $secondMatrix->columns; ++$j) {
                    $outputMatrix->matrix[$i][$j] = 0;
                    for ($k = 0; $k < $this->columns; ++$k) {
                        $outputMatrix->matrix[$i][$j] += $secondMatrix->matrix[$k][$j] * $this->matrix[$i][$k];
                    }
                }
            }
        } else {
            echo 'you cant multiply them, size of rows and columns are not same';
        }
        $outputMatrix->rows = $this->rows;
        $outputMatrix->columns = $secondMatrix->columns;
        return $outputMatrix;
    }

    public function multiplyByNumber(float $number): Matrix
    {
        $outputMatrix = new Matrix([[]], 0, 0);
        for ($i = 0; $i < $this->rows; ++$i) {
            for ($j = 0; $j < $this->columns; ++$j) {
                $outputMatrix->matrix[$i][$j] = $this->matrix[$i][$j] * $number;
            }
        }
        $outputMatrix->rows = $this->rows;
        $outputMatrix->columns = $this->columns;
        return $outputMatrix;
    }

    public function print()
    {
        for ($i = 0; $i < $this->rows; ++$i) {
            for ($j = 0; $j < $this->columns; ++$j) {
                echo $this->matrix[$i][$j], ' ';
            }
            echo '<br>';
        }
    }

}
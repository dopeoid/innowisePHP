<?php

class Maze
{
    public $mazeMartix = array(array());
    public int $mazeSize;
    public $startPoint = array();
    public $endPoint = array();


    public function __construct(int $mazeSize)
    {
        $this->mazeSize = $mazeSize;
        for ($i = 0; $i < $this->mazeSize; ++$i) {
            for ($j = 0; $j < $this->mazeSize; ++$j) {
                $this->mazeMartix[$i][$j] = rand(0, 1);
            }
        }
        $this->startPoint = array(rand(0, $this->mazeSize - 1), rand(0, $this->mazeSize - 1));
        var_dump($this->startPoint);
        $this->mazeMartix[$this->startPoint[0]][$this->startPoint[1]] = 0;
        $this->endPoint = array(rand(0, $this->mazeSize - 1), rand(0, $this->mazeSize - 1));
        var_dump($this->endPoint);
        $this->mazeMartix[$this->endPoint[0]][$this->endPoint[1]] = -2;
    }

    public function getMazeMatrix()
    {
        return $this->mazeMartix;
    }

    public function serializeMaze(string $name)
    {
        $packedMaze = serialize($this);
        $file = fopen($name, 'w');
        fputs($file, $packedMaze);
        fclose($file);
    }


    public function serializeMatrix(string $name)
    {
        $packedMaze = serialize($this->mazeMartix);
        $file = fopen($name, 'w');
        fputs($file, $packedMaze);
        fclose($file);
    }
}
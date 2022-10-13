<?php

include("Maze.php");
include("Queue.php");

class SolveLabyrinth
{
    private Maze $maze;
    private int $row;
    private int $column;
    private Queue $plan;
    private $visited = array(array());
    private $path = array(array());


    public function __construct()
    {
        $packedMaze = file_get_contents("D:/maze.json");
        $this->maze = unserialize($packedMaze);
        for ($i = 0; $i < $this->maze->mazeSize; ++$i) {
            for ($j = 0; $j < $this->maze->mazeSize; ++$j) {
                echo $this->maze->getMazeMatrix()[$i][$j], " ";
            }
            echo '<br>';
        }
        echo '<br>';

        for ($i = 0; $i < $this->maze->mazeSize; ++$i) {
            for ($j = 0; $j < $this->maze->mazeSize; ++$j) {
                $this->visited[$i][$j] = 0;
                $this->path[$i][$j] = -1;
            }
        }
        $this->plan = new Queue();
    }

    public function solve()
    {
        $this->plan->push($this->maze->startPoint[0]);
        $this->plan->push($this->maze->startPoint[1]);
        $this->path[$this->maze->startPoint[0]][$this->maze->startPoint[1]] = 1;
        while (!$this->plan->isEmpty()) {
            $this->row = $this->plan->front();
            $this->plan->pop();
            $this->column = $this->plan->front();
            $this->plan->pop();
            $this->findPath();
        }

        if (!$this->visited[$this->maze->endPoint[0]][$this->maze->endPoint[1]]) {
            echo "N";
        } else {
            $this->row = $this->maze->endPoint[0];
            $this->column = $this->maze->endPoint[1];
            $this->maze->mazeMartix[$this->maze->startPoint[0]][$this->maze->startPoint[1]] = 's';
            $this->maze->mazeMartix[$this->maze->endPoint[0]][$this->maze->endPoint[1]] = 'f';
            while ($this->path[$this->row][$this->column] != 2) { /* path restoration*/
                if (($this->row - 1) >= 0 && ($this->row - 1) < $this->maze->mazeSize && ($this->path[$this->row - 1][$this->column] == $this->path[$this->row][$this->column] - 1)) {
                    $this->row = $this->row - 1;
                    $this->maze->mazeMartix[$this->row][$this->column] = '?';
                } else if (($this->row + 1) >= 0 && ($this->row + 1) < $this->maze->mazeSize && ($this->path[$this->row + 1][$this->column] == $this->path[$this->row][$this->column] - 1)) {
                    $this->row = $this->row + 1;
                    $this->maze->mazeMartix[$this->row][$this->column] = '?';
                } else if (($this->column - 1) >= 0 && ($this->column - 1) < $this->maze->mazeSize && ($this->path[$this->row][$this->column - 1] == $this->path[$this->row][$this->column] - 1)) {
                    $this->column = $this->column - 1;
                    $this->maze->mazeMartix[$this->row][$this->column] = '?';
                } else if (($this->column + 1) >= 0 && ($this->column + 1) < $this->maze->mazeSize && ($this->path[$this->row][$this->column + 1] == $this->path[$this->row][$this->column] - 1)) {
                    $this->column = $this->column + 1;
                    $this->maze->mazeMartix[$this->row][$this->column] = '?';
                }
            }
            echo "Solved maze:", '<br>';
            for ($i = 0; $i < $this->maze->mazeSize; ++$i) {
                for ($j = 0; $j < $this->maze->mazeSize; ++$j) {
                    echo $this->maze->mazeMartix[$i][$j], " ";
                }
                echo '<br>';
            }
            $this->maze->serializeMatrix("D:/mazeMatrix.json");
        }
    }


    public function findPath()
    {
        if (!$this->visited[(int)$this->row][$this->column]) {
            /* we check if we have gone beyond the boundaries of the maze, if there is a cell
             in the array of visited and whether it is possible to pass through it*/
            if (($this->row + 1) < $this->maze->mazeSize && ($this->row + 1) >= 0) {
                if (!$this->visited[$this->row + 1][$this->column] &&
                    ($this->maze->getMazeMatrix()[$this->row + 1][$this->column] == 0 || $this->maze->getMazeMatrix()[$this->row + 1][$this->column] == -2)) {
                    $this->path[$this->row + 1][$this->column] = $this->path[$this->row][$this->column] + 1;
                    $this->plan->push($this->row + 1);
                    $this->plan->push($this->column);
                }
            }
            if (($this->row - 1) < $this->maze->mazeSize && ($this->row - 1) >= 0) {
                if (!$this->visited[$this->row - 1][$this->column] &&
                    ($this->maze->getMazeMatrix()[$this->row - 1][$this->column] == 0 || $this->maze->getMazeMatrix()[$this->row - 1][$this->column] == -2)) {
                    $this->path[$this->row - 1][$this->column] = $this->path[$this->row][$this->column] + 1;
                    $this->plan->push($this->row - 1);
                    $this->plan->push($this->column);
                }
            }
            if (($this->column + 1) < $this->maze->mazeSize && ($this->column + 1) >= 0) {
                if (!$this->visited[$this->row][$this->column + 1] &&
                    ($this->maze->getMazeMatrix()[$this->row][$this->column + 1] == 0 || $this->maze->getMazeMatrix()[$this->row][$this->column + 1] == -2)) {
                    $this->path[$this->row][$this->column + 1] = $this->path[$this->row][$this->column] + 1;
                    $this->plan->push($this->row);
                    $this->plan->push($this->column + 1);
                }
            }
            if (($this->column - 1) < $this->maze->mazeSize && ($this->column - 1) >= 0) {
                if (!$this->visited[$this->row][$this->column - 1] &&
                    ($this->maze->getMazeMatrix()[$this->row][$this->column - 1] == 0 || $this->maze->getMazeMatrix()[$this->row][$this->column - 1] == -2)) {
                    $this->path[$this->row][$this->column - 1] = $this->path[$this->row][$this->column] + 1;
                    $this->plan->push($this->row);
                    $this->plan->push($this->column - 1);
                }
            }
            $this->visited[$this->row][$this->column] = 1; /* We mark the cell we've been in */
        }
    }
}

$maze = new Maze(10);
$maze->serializeMaze("D:/maze.json");
$solve = new SolveLabyrinth();
$solve->solve();

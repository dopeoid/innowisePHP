<?php

class Queue
{
    private $queue = array();

    public function push(int $value)
    {
        return array_push($this->queue, $value);
    }

    public function pop()
    {
        return array_shift($this->queue);
    }

    public function front()
    {
        return $this->queue[0];
    }

    public function isEmpty(): bool
    {
        return count($this->queue) == 0;
    }
}

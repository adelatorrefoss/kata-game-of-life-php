<?php

class Cell
{
    const LIVE = true;
    const DEAD = false;
    private $status;

    public function __construct()
    {
        $this->status = self::LIVE;
    }

    public function isAlive()
    {
        return $this->status == self::LIVE;
    }

    public function dies()
    {
        $this->status = self::DEAD;
    }
}

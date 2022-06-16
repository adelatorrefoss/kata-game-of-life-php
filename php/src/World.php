<?php

class World
{

    private $grid;

    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    public function play()
    {
        for ($row = 0; $row < count($this->grid); $row++) {
            for ($col = 0; $col < count($this->grid[$row]); $col++) {

                /** @var Cell $cell */
                $cell = $this->grid[$row][$col];
                if ($cell && $this->numberOfLiveNeighboursFor($row, $col) < 2) {
                    $cell->dies();
                }

            }
        }
    }

    private function numberOfLiveNeighboursFor($row, $col)
    {
        $count = 0;
        for ($i = -1; $i <= 1; $i++) {
            for ($j = -1; $j <= 1; $j++) {
                $posX = $row + $i;
                $posY = $col + $j;
                if ($posX < 0) {
                    continue;
                }
                if ($posY < 0) {
                    continue;
                }
                if ($posX == $row && $posY == $col) {
                    continue;
                }

                $neighbour = $this->grid[$posX][$posY];
                if ($neighbour && $neighbour->isAlive()) {
                    $count++;
                }
            }
        }

//        $this->grid[$row-1][$col-1]->isAlive()
//        $this->grid[$row-1][$col]->isAlive()
//        $this->grid[$row-1][$col+1]->isAlive()
//        $this->grid[$row][$col-1]->isAlive()
//        $this->grid[$row][$col+1]->isAlive()
//        $this->grid[$row+1][$col-1]->isAlive()
//        $this->grid[$row+1][$col]->isAlive()
//        $this->grid[$row+1][$col+1]->isAlive()
    }
}
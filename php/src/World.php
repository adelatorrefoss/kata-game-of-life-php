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
                $rowSize = count($this->grid);
                $colSize = count($this->grid[$row]);
                if ($cell && $this->numberOfLiveNeighboursFor($row, $col, $rowSize, $colSize) < 2) {
                    $cell->dies();
                }
            }
        }
    }

    private function numberOfLiveNeighboursFor($row, $col, $rowSize, $colSize)
    {
        $count = 0;
        for ($i = -1; $i <= 1; $i++) {
            for ($j = -1; $j <= 1; $j++) {
                $posX = $row + $i;
                $posY = $col + $j;
                if ($posX < 0 || $posX > $rowSize - 1) {
                    continue;
                }
                if ($posY < 0 || $posY > $colSize - 1) {
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
    }
}

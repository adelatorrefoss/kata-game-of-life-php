<?php

require_once './src/Cell.php';
require_once './src/World.php';

//1. Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
//2. Any live cell with more than three live neighbours dies, as if by overcrowding.
//3. Any live cell with two or three live neighbours lives on to the next generation.
//4. Any dead cell with exactly three live neighbours becomes a live cell.


use PHPUnit\Framework\TestCase;

class GameOfLifeTest extends TestCase
{
    /** @test */
    public function any_live_cell_with_fewer_than_two_live_neighbours_dies()
    {
        /*
         *     XXX
         *     XCX
         *     XXX
         * */


        $cell = new Cell();

        $world = new World([[null, null, null],[null, $cell, null],[null, null,null]]);
        $world->play();
        $this->assertFalse($cell->isAlive());
    }
}

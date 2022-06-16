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
    public function any_live_cell_with_no_neighbours_dies()
    {
        $cell = new Cell();
        $world = new World([[null, null, null], [null, $cell, null], [null, null, null]]);
        $world->play();
        $this->assertFalse($cell->isAlive());
    }

    /** @test */
    public function any_live_cell_with_fewer_than_two_live_neighbours_dies()
    {
        $cell = new Cell();
        $neighbour = new Cell();

        $world = new World([[null, null, $neighbour], [null, $cell, null], [null, null, null]]);
        $world->play();
        $this->assertFalse($cell->isAlive());
    }

    /** @test */
    public function any_live_cell_with_more_than_three_live_neighbours_dies()
    {
        $cell = new Cell();
        $world = new World([[new Cell(), null, new Cell()], [null, $cell, null], [new Cell(), null, new Cell()]]);
        $world->play();
        $this->assertFalse($cell->isAlive());
    }

    /** @test */
    public function any_live_cell_with_two_live_neighbours_lives_on_to_the_next_generation()
    {
        $cell = new Cell();
        $world = new World([[null, null, null], [null, $cell, null], [null, new Cell(), new Cell()]]);
        $world->play();
        $this->assertTrue($cell->isAlive());
    }

    /** @test */
    public function any_live_cell_with_three_live_neighbours_lives_on_to_the_next_generation()
    {
        $cell = new Cell();
        $world = new World([[null, null, new Cell()], [null, $cell, null], [new Cell(), null, new Cell()]]);
        $world->play();
        $this->assertTrue($cell->isAlive());
    }
}

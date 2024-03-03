<?php

namespace App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Abstract_Factory;

use App\Http\Controllers\PatternsDesignGangFourPHP\Creational_Patterns\Builder\Direction;

class MazeGame
{
    public function createMaze(): Maze
    {
        echo "MazeGame::CreateMaze()\n";

        $aMaze = $this->makeMaze();

        $r1 = $this->makeRoom(1);
        $r2 = $this->makeRoom(2);
        $theDoor = $this->makeDoor($r1, $r2);

        $aMaze->addRoom($r1);
        $aMaze->addRoom($r2);

        $r1->setSide(Direction::NORTH, $this->makeWall());
        $r1->setSide(Direction::EAST, $theDoor);
        $r1->setSide(Direction::SOUTH, $this->makeWall());
        $r1->setSide(Direction::WEST, $this->makeWall());

        $r2->setSide(Direction::NORTH, $this->makeWall());
        $r2->setSide(Direction::EAST, $this->makeWall());
        $r2->setSide(Direction::SOUTH, $this->makeWall());
        $r2->setSide(Direction::WEST, $theDoor);

        return $aMaze;
    }

    public function createMazeWithFactory(MazeFactory $factory): Maze
    {
        echo "MazeGame::CreateMazeWithFactory()\n";

        $aMaze = $factory->makeMaze();
        $r1 = $factory->makeRoom(1);
        $r2 = $factory->makeRoom(2);
        $aDoor = $factory->makeDoor($r1, $r2);

        $aMaze->addRoom($r1);
        $aMaze->addRoom($r2);

        $r1->setSide(Direction::NORTH, $factory->makeWall());
        $r1->setSide(Direction::EAST, $aDoor);
        $r1->setSide(Direction::SOUTH, $factory->makeWall());
        $r1->setSide(Direction::WEST, $factory->makeWall());

        $r2->setSide(Direction::NORTH, $factory->makeWall());
        $r2->setSide(Direction::EAST, $factory->makeWall());
        $r2->setSide(Direction::SOUTH, $factory->makeWall());
        $r2->setSide(Direction::WEST, $aDoor);

        return $aMaze;
    }

    public function createMazeWithBuilder(MazeBuilder $builder): Maze
    {
        echo "MazeGame::CreateMazeWithBuilder()\n";

        $builder->buildMaze();
        $builder->buildRoom(1);
        $builder->buildRoom(2);
        $builder->buildDoor(1, 2);

        return $builder->getMaze();
    }

    public function createComplexMazeWithBuilder(MazeBuilder $builder): Maze
    {
        echo "MazeGame::CreateComplexMazeWithBuilder()\n";

        for ($i = 1; $i <= 1001; $i++) {
            $builder->buildRoom($i);
        }

        return $builder->getMaze();
    }

    protected function makeMaze(): Maze
    {
        return new Maze();
    }

    protected function makeRoom(int $n): Room
    {
        return new Room($n);
    }

    protected function makeWall(): Wall
    {
        return new Wall();
    }

    protected function makeDoor(Room $r1, Room $r2): Door
    {
        return new Door($r1, $r2);
    }
}

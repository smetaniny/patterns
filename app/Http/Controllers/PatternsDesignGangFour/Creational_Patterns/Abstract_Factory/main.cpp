#include "MazeGame.h"  // Включаем заголовочный файл для класса MazeGame
#include "BombedMazeFactory.h"  // Включаем заголовочный файл для класса BombedMazeFactory
#include "EnchantedMazeFactory.h"  // Включаем заголовочный файл для класса EnchantedMazeFactory

int main() {
    MazeGame game;  // Создаем объект игры MazeGame

    BombedMazeFactory factoryBombed;  // Создаем фабрику для создания лабиринтов с бомбами
    EnchantedMazeFactory factoryEnchanted;  // Создаем фабрику для создания зачарованных лабиринтов

    game.CreateMaze(factoryBombed);  // Создаем лабиринт с бомбами с помощью фабрики factoryBombed
    game.CreateMaze(factoryEnchanted);  // Создаем зачарованный лабиринт с помощью фабрики factoryEnchanted

    return 0;  // Возвращаем нуль, чтобы показать успешное завершение программы
}

<?php

namespace App\Http\Controllers\PHP8\P342DependencyInjection;

use ReflectionException;

class ObjectAssembler
{
    // Массив для хранения компонентов
    private array $components = [];

    public function __construct(string $conf)
    {
        $this->configure($conf);
    }

    /**
     * Конфигурирует компоненты на основе данных из XML-файла.
     *
     * @param string $conf - путь к XML-файлу конфигурации
     */
    private function configure(string $conf): void
    {
        // Загружаем конфигурацию из XML-файла
        $data = simplexml_load_file($conf);
        foreach ($data->class as $class) {
            $args = [];
            // Получаем имя класса из конфигурации
            $name = (string) $class['name'];
            $resolvedname = $name;
            foreach ($class->arg as $arg) {
                // Получаем имя зависимости из атрибута 'inst'
                $argclass = (string) $arg['inst'];
                // Сохраняем зависимости в ассоциативный массив с номерами аргументов
                $args[(int) $arg['num']] = $argclass;
            }

            if (isset($class->instance)) {
                if (isset($class->instance[0]['inst'])) {
                    // Если есть атрибут 'inst' у элемента 'instance', используем его в качестве имени класса
                    $resolvedname = (string) $class->instance[0]['inst'];
                }
            }

            // Сортируем массив зависимостей по номерам аргументов
            ksort($args);

            $this->components[$name] = function () use ($resolvedname, $args) {
                $expandedargs = [];
                foreach ($args as $arg) {
                    // Создаем массив, содержащий экземпляры зависимостей
                    $expandedargs[] = $this->getComponent($arg);
                }

                $rclass = new \ReflectionClass($resolvedname);
                // Создаем новый экземпляр класса с аргументами
                return $rclass->newInstanceArgs($expandedargs);
            };
        }
    }

    /**
     * Возвращает компонент по имени класса.
     *
     * @param string $class - имя класса компонента
     *
     * @return object - экземпляр компонента
     * @throws ReflectionException
     */
    public function getComponent(string $class): object
    {
        if (isset($this->components[$class])) {
            // Вызывает анонимную функцию для получения компонента
            $inst = $this->components[$class]();
        } else {
            $rclass = new \ReflectionClass($class);
            // Создает новый экземпляр класса, если компонент не был зарегистрирован
            $inst = $rclass->newInstance();
        }
        return $inst;
    }
}

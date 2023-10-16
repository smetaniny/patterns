<?php

namespace App\Http\Controllers\PHP8\P339ServiceLocator;

use App\Http\Controllers\PHP8\P319FactoryMethod\BloggsCommsManager;
use App\Http\Controllers\PHP8\P319FactoryMethod\CommsManager;
use App\Http\Controllers\PHP8\P319FactoryMethod\MegaCommsManager;

class AppConfig
{
    // Статическая переменная для хранения единственного экземпляра AppConfig
    private static ?AppConfig $instance = null;

    // Экземпляр CommsManager для управления связью
    private CommsManager $commsManager;

    private function __construct()
    {
        // Выполняется единожды. Вызываем метод init при создании экземпляра
        $this->init();
    }

    /**
     * Инициализирует CommsManager в зависимости от настройки COMMSTYPE.
     */
    private function init(): void
    {
        switch (Settings::$COMMSTYPE) {
            case 'Mega':
                // Создаем MegaCommsManager, если тип связи 'Mega'
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                // Создаем BloggsCommsManager по умолчанию
                $this->commsManager = new BloggsCommsManager();
        }
    }

    /**
     * Получает единственный экземпляр AppConfig (синглтон).
     * @return AppConfig
     */
    public static function getlnstance(): AppConfig
    {
        if (is_null(self::$instance));

        // Создаем единственный экземпляр AppConfig, если его еще нет
        self::$instance = new self();

        // Возвращаем существующий или только что созданный экземпляр
        return self::$instance;
    }

    /**
     * Получает экземпляр CommsManager.
     * @return CommsManager
     */
    public function getCommsManager(): CommsManager
    {
        // Возвращаем экземпляр CommsManager
        return $this->commsManager;
    }
}

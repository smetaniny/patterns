<?php

namespace App\Http\Controllers\PHP8\P339ServiceLocator;

use App\Http\Controllers\PHP8\P319FactoryMethod\BloggsCommsManager;
use App\Http\Controllers\PHP8\P319FactoryMethod\CommsManager;
use App\Http\Controllers\PHP8\P319FactoryMethod\MegaCommsManager;

class AppConfig
{
    private static ?AppConfig $instance = null;
    private CommsManager $commsManager;

    private function __construct()
    {
        // Выполняется единственный раз
        $this->init();
    }

    private function init(): void
    {
        switch (Settings::$COMMSTYPE) {
            case 'Mega':
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                $this->commsManager = new BloggsCommsManager();
        }
    }

    public static function getlnstance(): AppConfig
    {
        if (is_null(self::$instance)) ;

        self::$instance = new self();

        return self::$instance;
    }


    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }

}

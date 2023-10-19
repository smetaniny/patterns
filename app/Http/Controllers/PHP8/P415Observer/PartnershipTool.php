<?php

namespace App\Http\Controllers\PHP8\P415Observer;

class PartnershipTool extends LoginObserver
{

    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Проверка $1р-адреса
        // Установка cookie при соответствии списку
        print "Проверка iр-адреса <br />";
    }
}

<?php

namespace App\Http\Controllers\PHP8\P415Observer;

/**
 * Класс GeneralLogger наследует функциональность класса LoginObserver и используется для регистрации событий входа.
 */
class GeneralLogger extends LoginObserver
{
    /**
     * Метод doUpdate в классе GeneralLogger вызывается при обновлении состояния входа.
     *
     * @param Login $login - Метод принимает объект Login в качестве аргумента.
     */
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Добавление данных о входе в журнал
        print "Добавление данных о входе в журнал <br/>";
    }
}

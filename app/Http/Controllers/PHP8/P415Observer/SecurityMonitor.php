<?php

namespace App\Http\Controllers\PHP8\P415Observer;

/**
 * Класс SecurityMonitor наследует функциональность класса LoginObserver и служит для мониторинга безопасности входа в
 * систему.
 */
class SecurityMonitor extends LoginObserver
{
    /**
     * Метод doUpdate в классе SecurityMonitor вызывается при обновлении состояния входа.
     *
     * @param Login $login - Метод принимает объект Login в качестве аргумента.
     */
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
        // Если статус входа - неверный пароль, выполните определенные действия.
        if ($status[0] == Login::LOGIN_WRONG_PASS) {
            // Например, отправьте уведомление сисадмину.
            print "Не верный пароль, письмо сисадмину <br />";
        }
    }
}

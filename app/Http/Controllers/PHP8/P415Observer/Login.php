<?php

namespace App\Http\Controllers\PHP8\P415Observer;

use JetBrains\PhpStorm\Pure;
use SplObjectStorage;
use SplSubject;
use SplObserver;

class Login implements SplSubject
{
    private SplObjectStorage $storage;

    // Константы для разных статусов логина
    public const LOGIN_USER_UNKNOWN = 1;
    public const LOGIN_WRONG_PASS = 2;
    public const LOGIN_ACCESS = 3;

    // Массив для хранения статуса логина
    private array $status = [];

    #[Pure] public function __construct()
    {
        // Создаем новый объект SplObjectStorage для хранения наблюдателей.
        $this->storage = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        // Прикрепляем наблюдателя к наблюдаемому объекту, добавляя его в SplObjectStorage.
        $this->storage->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        // Отсоединяем (удаляем) наблюдателя от наблюдаемого объекта, если необходимо.
        $this->storage->detach($observer);
    }

    public function notify(): void
    {
        // Уведомляем всех прикрепленных наблюдателей о событии или изменениях.
        foreach ($this->storage as $obs) {
            $obs->update($this);
        }
    }


    /**
     * Метод для обработки попытки логина.
     *
     * @param string $user Имя пользователя
     * @param string $pass Пароль
     * @param string $ip IP-адрес
     *
     * @return bool Возвращает true, если логин успешен, и false, если нет.
     */
    public function handleLogin(string $user, string $pass, string $ip): bool
    {
        switch (2) {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isvalid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isvalid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isvalid = false;
                break;
        }
        $this->notify();
        return $isvalid;
    }

    /**
     * Приватный метод для установки статуса логина.
     *
     * @param int $status Статус логина
     * @param string $user Имя пользователя
     * @param string $ip IP-адрес
     */
    private function setStatus(int $status, string $user, string $ip): void
    {
        $this->status = [$status, $user, $ip];
    }

    /**
     * Метод для получения текущего статуса логина.
     *
     * @return array Возвращает массив с информацией о статусе логина.
     */
    public function getStatus(): array
    {
        return $this->status;
    }

}

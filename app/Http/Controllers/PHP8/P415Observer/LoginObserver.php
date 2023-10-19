<?php
namespace App\Http\Controllers\PHP8\P415Observer;

use SplObserver;
use SplSubject;

abstract class LoginObserver implements SplObserver
{
    /**
     * Создает новый экземпляр класса LoginObserver.
     *
     * @param Login $login Экземпляр класса Login, к которому будет присоединен наблюдатель.
     */
    public function __construct(private Login $login)
    {
        $login->attach($this);
    }

    /**
     * Метод обновления, вызывается при изменении состояния наблюдаемого объекта.
     *
     * @param SplSubject $subject Объект, который вызвал обновление (должен быть экземпляром SplSubject).
     */
    public function update(SplSubject $subject): void
    {
        if ($subject === $this->login) {
            // Если обновление вызвано объектом Login, вызовите конкретный метод обновления.
            $this->doUpdate($subject);
        }
    }

    /**
     * Метод обновления, который должен быть реализован в подклассах.
     *
     * @param Login $login Экземпляр класса Login.
     */
    abstract public function doUpdate(Login $login): void;
}

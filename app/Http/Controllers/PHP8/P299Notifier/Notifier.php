<?php

namespace App\Http\Controllers\PHP8\P299Notifier;

// Абстрактный класс "Уведомитель" с фабричным методом getNotifier().
abstract class Notifier
{
    // Фабричный метод возвращает объект "Уведомитель" в зависимости от случайного выбора.
    public static function getNotifier(): Notifier
    {
        if (rand(1, 2) === 1) {
            // Возвращает объект "Уведомитель почтой".
            return new MailNotifier();
        } else {
            // Возвращает объект "Уведомитель текстом".
            return new TextNotifier();
        }
    }

    // Абстрактный метод для информирования.
    abstract public function inform($message): void;
}

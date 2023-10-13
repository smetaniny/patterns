<?php

namespace App\Http\Controllers\PHP8\Notifier299;

// Этот класс представляет менеджера регистрации уроков.
use App\Http\Controllers\PHP8\Strategy292\Lesson;

class RegistrationMgr
{
    // Метод для регистрации урока. Он принимает объект урока, интерфейс которого реализуют конкретные уроки.
    public function register(Lesson $lesson): void
    {
        // Создаем объект "Уведомитель" с помощью фабричного метода исходя из случайного выбора.
        $notifier = Notifier::getNotifier();
        // Информируем о новом уроке и его стоимости, используя "Уведомитель".
        $notifier->inform("Стоимость урока: ({$lesson->cost()} руб.)");
    }
}





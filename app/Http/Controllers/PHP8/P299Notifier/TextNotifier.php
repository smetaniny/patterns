<?php

namespace App\Http\Controllers\PHP8\P299Notifier;

// Конкретный класс "Уведомитель текстом" с реализацией метода inform() для отправки уведомления текстовым сообщением.
class TextNotifier extends Notifier
{
    public function inform($message): void
    {
        print "Уведомление текстом: {$message}\n";
    }
}

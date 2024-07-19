<?php

namespace App\Http\Controllers\PHP8\P299Notifier;

// Конкретный класс "Уведомитель почтой" с реализацией метода inform() для отправки уведомления почтой.
class MailNotifier extends Notifier
{
    public function inform($message): void
    {
        print "Уведомление почтой: {$message}  <br/>";
    }
}

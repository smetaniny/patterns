<?php

namespace App\Http\Controllers\PHP8\P436Command;

// Класс LoginCommand (Команда входа в систему) наследуется от абстрактного класса Command
class LoginCommand extends Command
{
    // Реализация абстрактного метода execute, который выполняет команду входа в систему
    public function execute(CommandContext $context): bool
    {
        // Получаем менеджер доступа из реестра (Registry)
        $manager = Registry::getAccessManager();

        // Получаем имя пользователя (username) и пароль (pass) из контекста
        $user = $context->get('username');
        $pass = $context->get('pass');

        // Выполняем попытку входа в систему через менеджер доступа
        $user_obj = $manager->login($user, $pass);

        // Если вход не удался, устанавливаем ошибку в контексте и возвращаем false
        if (is_null($user_obj)) {
            $context->setError($manager->getError());
            return false;
        }

        // Если вход успешен, добавляем объект пользователя (user_obj) в контекст
        $context->addParam("user", $user_obj);

        // Возвращаем true, чтобы показать успешное выполнение команды
        return true;
    }
}

<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack', // Драйвер 'stack' для объединения нескольких каналов
            'channels' => ['single'], // Использует канал 'single'
            'ignore_exceptions' => false, // Не игнорировать исключения

            // Пример вызова: пишет в laravel.log
            // Log::stack(['single'])->info("Это лог с канала 'stack'");
        ],

        'single' => [
            'driver' => 'single', // Драйвер 'single' для записи логов в один файл
            'path' => storage_path('logs/laravel.log'), // Путь к файлу логов
            'level' => env('LOG_LEVEL', 'debug'), // Уровень логирования

            // Пример вызова: пишет в laravel.log
            // Log::channel('single')->info("Это лог с канала 'single'");
        ],

        'daily' => [
            'driver' => 'daily', // Драйвер 'daily' для записи логов в файлы по дням
            'path' => storage_path('logs/laravel.log'), // Путь к файлу логов
            'level' => env('LOG_LEVEL', 'debug'), // Уровень логирования
            'days' => 14, // Хранить логи в течение 14 дней

            // Пример вызова: пишет в laravel.log
            // Log::channel('daily')->info("Это лог с канала 'daily'");
        ],

        'slack' => [
            'driver' => 'slack', // Драйвер 'slack' для отправки логов в Slack
            'url' => env('LOG_SLACK_WEBHOOK_URL'), // URL вебхука Slack
            'username' => 'Laravel Log', // Имя пользователя
            'emoji' => ':boom:', // Эмоджи
            'level' => env('LOG_LEVEL', 'critical'), // Уровень логирования

            // Пример вызова: отправляет лог в Slack
            // Log::channel('slack')->critical("Это критический лог в Slack");
        ],

        'papertrail' => [
            'driver' => 'monolog', // Драйвер 'monolog' для записи логов через Monolog
            'level' => env('LOG_LEVEL', 'debug'), // Уровень логирования
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class), // Обработчик Monolog
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'), // Хост Papertrail
                'port' => env('PAPERTRAIL_PORT'), // Порт Papertrail
                'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'), // Строка подключения
            ],

            // Пример вызова: отправляет лог в Papertrail
            // Log::channel('papertrail')->info("Это лог в Papertrail");
        ],

        'stderr' => [
            'driver' => 'monolog', // Драйвер 'monolog' для записи логов в stderr
            'level' => env('LOG_LEVEL', 'debug'), // Уровень логирования
            'handler' => StreamHandler::class, // Обработчик Monolog
            'formatter' => env('LOG_STDERR_FORMATTER'), // Форматирование stderr
            'with' => [
                'stream' => 'php://stderr', // Поток stderr
            ],

            // Пример вызова: записывает лог в stderr
            // Log::channel('stderr')->info("Это лог в stderr");
        ],

        'syslog' => [
            'driver' => 'syslog', // Драйвер 'syslog' для записи логов в системный журнал
            'level' => env('LOG_LEVEL', 'debug'), // Уровень логирования

            // Пример вызова: записывает лог в системный журнал
            // Log::channel('syslog')->info("Это лог в системный журнал");
        ],

        'errorlog' => [
            'driver' => 'errorlog', // Драйвер 'errorlog' для записи ошибок в системный журнал
            'level' => env('LOG_LEVEL', 'debug'), // Уровень логирования

            // Пример вызова: запись ошибки в системный журнал
            // Log::error("Это ошибка в канале 'errorlog'");
        ],

        'null' => [
            'driver' => 'monolog', // Драйвер 'monolog' для нулевой записи
            'handler' => NullHandler::class, // Обработчик Monolog

            // Пример вызова: нулевая запись, логирование не выполняется
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'), // Путь к файлу логов

            // Пример вызова: запись экстренного сообщения логов в файл 'laravel.log' без указания канала
            // Log::emergency("Это экстренное сообщение в файл 'laravel.log' без указания канала");
        ],

        'info' => [
            'driver' => 'single', // Драйвер 'single' для записи логов информационного уровня
            'path' => storage_path('logs/info.log'), // Путь к файлу логов
            'level' => 'info', // Уровень логирования

            // Пример вызова: пишет в info.log
            // Log::channel('info')->info("Это лог с канала 'info'", [ 'user_id' => 9525,]);
        ],

        'warning' => [
            'driver' => 'single', // Драйвер 'single' для записи логов предупреждений
            'path' => storage_path('logs/warning.log'), // Путь к файлу логов
            'level' => 'warning', // Уровень логирования

            // Пример вызова: пишет в warning.log
            // Log::channel('warning')->warning("Это лог с канала 'warning'", [ 'user_id' => 9525,]);
        ],

        'error' => [
            'driver' => 'single', // Драйвер 'single' для записи логов ошибок
            'path' => storage_path('logs/error.log'), // Путь к файлу логов
            'level' => 'error', // Уровень логирования

            // Пример вызова: пишет в error.log
            // Log::channel('error')->error("Это лог с канала 'error'", [ 'user_id' => 9525,]);
        ],

        'debug' => [
            'driver' => 'single', // Драйвер 'single' для записи логов отладки
            'path' => storage_path('logs/debug.log'), // Путь к файлу логов
            'level' => 'debug', // Уровень логирования

            // Пример вызова: пишет в debug.log
            // Log::channel('debug')->debug("Это лог с канала 'debug'", [ 'user_id' => 9525,]);
        ],
    ],

];

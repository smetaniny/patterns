<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full font-sans antialiased">
    <head>
        <meta name="theme-color" content="#fff"> <!-- Устанавливает цвет темы для браузера -->
        <meta charset="utf-8"> <!-- Устанавливает кодировку документа -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Устанавливает токен CSRF для безопасности форм -->
        <meta name="viewport" content="width=device-width"/> <!-- Задает параметры просмотра на мобильных устройствах -->
        <meta name="locale" content="{{ str_replace('_', '-', app()->getLocale()) }}"/> <!-- Устанавливает локаль приложения -->

        @include('nova::partials.meta') <!-- Включает мета-теги из частичного шаблона -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}"> <!-- Подключает стили приложения -->

        @if ($styles = \Laravel\Nova\Nova::availableStyles(request()))
            <!-- Tool Styles -->
            @foreach($styles as $asset)
                <link rel="stylesheet" href="{!! $asset->url() !!}"> <!-- Подключает стили инструментов (плагинов) Nova -->
            @endforeach
        @endif

        <script>
            // Определяет, использовать ли тему "dark" в зависимости от настроек пользователя или системных настроек
            if (localStorage.novaTheme === 'dark' || (!('novaTheme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="min-w-site text-sm font-medium min-h-full text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-900">
        @inertia <!-- Интеграция Inertia.js, которая управляет клиентской частью приложения -->
        <div class="relative z-50">
            <div id="notifications" name="notifications"></div> <!-- Элемент для отображения уведомлений -->
        </div>
        <div>
            <div id="dropdowns" name="dropdowns"></div> <!-- Элемент для отображения выпадающих списков -->
            <div id="modals" name="modals"></div> <!-- Элемент для отображения модальных окон -->
        </div>

        <!-- Scripts -->
        <script src="{{ mix('manifest.js', 'vendor/nova') }}"></script> <!-- Скрипт с манифестом для оптимизации загрузки ресурсов -->
        <script src="{{ mix('vendor.js', 'vendor/nova') }}"></script> <!-- Скрипт с вендорами (зависимостями) для оптимизации загрузки ресурсов -->
        <script src="{{ mix('app.js', 'vendor/nova') }}"></script> <!-- Основной скрипт приложения Nova -->

        <!-- Build Nova Instance -->
        <script>
            // Создает экземпляр Nova и передает конфигурацию
            const config = @json(\Laravel\Nova\Nova::jsonVariables(request()));
            window.Nova = createNovaApp(config);
            Nova.countdown(); // Инициализация отсчета времени для сессии
        </script>

        @if ($scripts = \Laravel\Nova\Nova::availableScripts(request()))
            <!-- Tool Scripts -->
            @foreach ($scripts as $asset)
                <script src="{!! $asset->url() !!}"></script> <!-- Подключает скрипты инструментов (плагинов) Nova -->
            @endforeach
        @endif

        <!-- Start Nova -->
        <script defer>
            Nova.liftOff(); // Инициализация Nova
        </script>
    </body>
</html>

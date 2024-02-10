<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full font-sans antialiased">
    <head>
        <meta name="theme-color" content="#fff"> <!-- Устанавливает цвет темы для браузера -->
        <meta charset="utf-8"> <!-- Устанавливает кодировку документа -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Устанавливает токен CSRF для безопасности форм -->
        <meta name="viewport" content="width=device-width" />
        <!-- Задает параметры просмотра на мобильных устройствах -->
        <meta name="locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
        <!-- Устанавливает локаль приложения -->
        {{--        <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">--}}
        {{--        <script src="{{ mix('manifest.js', 'packages/smetaniny/sm-laravel-admin/public/manifest.js') }}" defer></script>--}}
        {{--        <script src="{{ mix('vendor.js', 'vendor/smetaniny/sm-laravel-admin') }}" defer></script>--}}
        {{--        <script src="{{ mix('app.js', 'vendor/smetaniny/sm-laravel-admin') }}" defer></script>--}}

{{--        <link rel="stylesheet" href="http://smpackages/packages/smetaniny/sm-laravel-admin/public/css/app.css">--}}
        <script src="packages/smetaniny/sm-laravel-admin/public/manifest.js" defer></script>
        <script src="packages/smetaniny/sm-laravel-admin/public/vendor.js" defer></script>
        <script src="packages/smetaniny/sm-laravel-admin/public/app.js" defer></script>
    </head>
    <body>
        @inertia
        <div id="app">ssss</div>
    </body>
</html>



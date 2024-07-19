# Команды Laravel

## Миграции

**Запуск миграций:**
```bash
php artisan migrate
# Выполняет все новые миграции в проекте

php artisan migrate --path=database/migrations/permissions
# Выполняет миграции, находящиеся в папке database/migrations/permissions

php artisan migrate --path=database/migrations/pages
# Выполняет миграции, находящиеся в папке database/migrations/pages
```

**Отмена миграций:**
```bash
php artisan migrate:rollback
# Откатывает последний пакет миграций

php artisan migrate:reset
# Откатывает все миграции

php artisan migrate:reset --path=database/migrations/permissions
# Откатывает все миграции из папки database/migrations/permissions
```

**Отмена миграций:**
```bash
php artisan make:migration create_permission_role_table --create=permission_role
# Создает новую миграцию для таблицы permission_role

php artisan make:migration CreateReturnOrdersProductsTable --create=return_orders_products
# Создает новую миграцию для таблицы return_orders_products

php artisan make:migration create_group_permissions_table --path=database/migrations/permissions
# Создает новую миграцию для таблицы group_permissions в папке database/migrations/permissions

php artisan make:migration UpdateProductsSearch --table=products
# Создает новую миграцию для обновления таблицы products

php artisan make:migration ChangeStocksTovarResultsConditionsTable --table=stocks_tovar_results
# Создает новую миграцию для изменения таблицы stocks_tovar_results
```

**Создание модели с миграцией:**
```bash
php artisan make:model ReturnOrdersProducts --migration
# Создает модель ReturnOrdersProducts и миграцию для нее
```

## Модели

**Создание модели:**
```bash
php artisan make:model Admin/GroupPermission
# Создает модель GroupPermission в пространстве имен Admin

php artisan make:model Admin/RoleModel
# Создает модель RoleModel в пространстве имен Admin

php artisan make:model Post
# Создает модель Post
```

## Запросы

**Создание запроса:**
```bash
php artisan make:request ReturnOrdersDetailedRequest
# Создает запрос ReturnOrdersDetailedRequest

php artisan make:request Application/ReturnOrdersDetailedAppRequest
# Создает запрос Application/ReturnOrdersDetailedAppRequest в пространстве имен Application

php artisan make:request Sites/ReturnOrdersDetailedAppRequest
# Создает запрос Sites/ReturnOrdersDetailedAppRequest в пространстве имен Sites
```

## Репозитории

**Создание репозитория:**
```bash
php artisan make:repository App/http/Repositories/App/TokenFirebaseRepository
# Создает репозиторий TokenFirebaseRepository в пространстве имен App/http/Repositories/App
```

## Контроллеры

**Создание контроллера:**
```bash
php artisan make:controller Sites\ReturnOrdersDetailedController
# Создает контроллер ReturnOrdersDetailedController в пространстве имен Sites

php artisan make:controller Admin\PermissionAdminController --resource
# Создает ресурсный контроллер PermissionAdminController в пространстве имен Admin
```

## Middleware и Провайдеры

**Создание middleware:**
```bash
php artisan make:middleware AndroidApp
# Создает middleware AndroidApp

php artisan make:middleware Admin/RoleAdminMiddleware
# Создает middleware RoleAdminMiddleware в пространстве имен Admin
```

**Создание провайдера:**
```bash
php artisan make:provider SlugURLServiceProvider
# Создает провайдер SlugURLServiceProvider
```

## Маршруты

**Просмотр списка маршрутов:**
```bash
php artisan route:list
# Просматривает список маршрутов
```


## Кэш и Конфигурация

**Очистка кэша и конфигурации:**
```bash
php artisan cache:clear
# Очищает кэш приложения

php artisan config:clear
# Очищает кэш конфигурации

php artisan view:clear
# Очищает кэш представлений

php artisan route:clear
# Очищает кэш маршрутов
```


**Очистка всех кэшей через маршрут:**
```bash
Route::get('/clear', function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return "All caches cleared!";
});
```


## Laravel Setup

**Установка и настройка проекта Laravel:**
```bash
composer create-project laravel/laravel platina-packages
# Создает новый проект Laravel с именем platina-packages

composer require laravel/breeze --dev
# Устанавливает Laravel Breeze для упрощенной аутентификации

php artisan breeze:install react --ssr
# Устанавливает Laravel Breeze с React и поддержкой серверного рендеринга
```


**Установка пространства имен приложения:**
```bash
php artisan app:name SKAutoPortal
# Устанавливает пространство имен приложения в SKAutoPortal
```

# Команды Composer

**Установка и обновление зависимостей:**
```bash
composer require google/apiclient --with-all-dependencies
# Устанавливает google/apiclient с зависимостями

composer install --ignore-platform-reqs
# Устанавливает зависимости, игнорируя требования к платформе

composer update --ignore-platform-reqs
# Обновляет зависимости, игнорируя требования к платформе

composer require illuminate/filesystem --ignore-platform-reqs
# Устанавливает illuminate/filesystem, игнорируя требования к платформе

composer require movemoveapp/laravel-dadata --ignore-platform-reqs
# Устанавливает movemoveapp/laravel-dadata, игнорируя требования к платформе

composer require ryangjchandler/blade-cache-directive --ignore-platform-reqs
# Устанавливает ryangjchandler/blade-cache-directive, игнорируя требования к платформе
```

**Очистка кэша и обновление автозагрузки:**
```bash
composer clearcache
# Очищает кэш Composer

composer dump-autoload
# Обновляет автозагрузку

composer self-update
# Обновляет Composer до последней версии
```

**Управление подмодулями:**
```bash
git submodule add git@github.com:platina-jewelry/image.git packages/platina/image
# Добавляет подмодуль image в packages/platina/image

git submodule add git@github.com:platina-jewelry/image.git packages/platina/admin
# Добавляет подмодуль image в packages/platina/admin

git submodule set-url packages/platina/image git@github.com:platina-jewelry/image.git
# Устанавливает новый URL для подмодуля image

git submodule deinit -f .
# Удаляет инициализацию подмодулей

git rm -f .gitmodules
# Удаляет файл .gitmodules

git submodule init
# Инициализирует подмодули

git submodule update
# Обновляет подмодули
```



**Удаление и установка пакетов:**
```bash
composer remove platina/image
# Удаляет пакет platina/image

composer require intervention/image
# Устанавливает пакет intervention/image

composer remove intervention/image
# Удаляет пакет intervention/image

composer remove laravel/passport
# Удаляет пакет laravel/passport
```




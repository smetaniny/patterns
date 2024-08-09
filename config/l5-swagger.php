<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'L5 Swagger UI', // Заголовок документации API
            ],

            'routes' => [
                /*
                 * Маршрут для доступа к интерфейсу документации API
                 */
                'api' => 'api/documentation',
            ],
            'paths' => [
                /*
                 * Измените, чтобы включить полный URL для ресурсов в UI
                 */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),

                /*
                 * Имя файла сгенерированного JSON документации
                 */
                'docs_json' => 'api-docs.json',

                /*
                 * Имя файла сгенерированной YAML документации
                 */
                'docs_yaml' => 'api-docs.yaml',

                /*
                 * Установите это значение в `json` или `yaml`, чтобы определить, какой файл документации использовать в UI
                 */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),

                /*
                 * Абсолютные пути к каталогам, содержащим аннотации swagger
                 */
                'annotations' => [
                    base_path('app'),
                ],
            ],
        ],
    ],
    'defaults' => [
        'routes' => [
            /*
             * Маршрут для доступа к разобранным аннотациям swagger
             */
            'docs' => 'docs',

            /*
             * Маршрут для обратного вызова аутентификации OAuth2
             */
            'oauth2_callback' => 'api/oauth2-callback',

            /*
             * Middleware, позволяющее предотвратить неожиданный доступ к документации API
             */
            'middleware' => [
                'api' => [],
                'asset' => [],
                'docs' => [],
                'oauth2_callback' => [],
            ],

            /*
             * Опции группы маршрутов
             */
            'group_options' => [],
        ],

        'paths' => [
            /*
             * Абсолютный путь к каталогу, где будут храниться разобранные аннотации
             */
            'docs' => storage_path('api-docs'),

            /*
             * Абсолютный путь к каталогу, куда экспортировать представления
             */
            'views' => base_path('resources/views/vendor/l5-swagger'),

            /*
             * Измените, чтобы установить базовый путь для API
             */
            'base' => env('L5_SWAGGER_BASE_PATH', null),

            /*
             * Измените путь, где должны храниться ресурсы swagger ui
             */
            'swagger_ui_assets_path' => env('L5_SWAGGER_UI_ASSETS_PATH', 'vendor/swagger-api/swagger-ui/dist/'),

            /*
             * Абсолютный путь к каталогам, которые следует исключить из сканирования
             * @deprecated Пожалуйста, используйте `scanOptions.exclude`
             * `scanOptions.exclude` переопределяет это
             */
            'excludes' => [],
        ],

        'scanOptions' => [
            /**
             * analyser: по умолчанию \OpenApi\StaticAnalyser.
             *
             * @see \OpenApi\scan
             */
            'analyser' => null,

            /**
             * analysis: по умолчанию новый \OpenApi\Analysis.
             *
             * @see \OpenApi\scan
             */
            'analysis' => null,

            /**
             * Пользовательские классы обработчиков путей запросов.
             *
             * @link https://github.com/zircote/swagger-php/tree/master/Examples/processors/schema-query-parameter
             * @see \OpenApi\scan
             */
            'processors' => [
                // new \App\SwaggerProcessors\SchemaQueryParameter(),
            ],

            /**
             * pattern: string       $pattern Шаблоны файлов для сканирования (по умолчанию: *.php).
             *
             * @see \OpenApi\scan
             */
            'pattern' => null,

            /*
             * Абсолютный путь к каталогам, которые следует исключить из сканирования
             * @note Эта опция переопределяет `paths.excludes`
             * @see \OpenApi\scan
             */
            'exclude' => [],

            /*
             * Позволяет генерировать спецификации как для OpenAPI 3.0.0, так и для OpenAPI 3.1.0.
             * По умолчанию спецификация будет версии 3.0.0
             */
            'open_api_spec_version' => env('L5_SWAGGER_OPEN_API_SPEC_VERSION', \L5Swagger\Generator::OPEN_API_DEFAULT_SPEC_VERSION),
        ],

        /*
         * Определения безопасности API. Будут сгенерированы в файл документации.
        */
        'securityDefinitions' => [
            'securitySchemes' => [
                /*
                 * Примеры схем безопасности
                 */
                /*
                'api_key_security_example' => [ // Уникальное имя схемы безопасности
                    'type' => 'apiKey', // Тип схемы безопасности. Допустимые значения: "basic", "apiKey" или "oauth2".
                    'description' => 'Краткое описание схемы безопасности',
                    'name' => 'api_key', // Имя заголовка или параметра запроса, который будет использоваться.
                    'in' => 'header', // Местоположение API ключа. Допустимые значения: "query" или "header".
                ],
                'oauth2_security_example' => [ // Уникальное имя схемы безопасности
                    'type' => 'oauth2', // Тип схемы безопасности. Допустимые значения: "basic", "apiKey" или "oauth2".
                    'description' => 'Краткое описание схемы безопасности oauth2.',
                    'flow' => 'implicit', // Поток, используемый схемой безопасности OAuth2. Допустимые значения: "implicit", "password", "application" или "accessCode".
                    'authorizationUrl' => 'http://example.com/auth', // URL авторизации, используемый для (implicit/accessCode)
                    //'tokenUrl' => 'http://example.com/auth' // URL авторизации, используемый для (password/application/accessCode)
                    'scopes' => [
                        'read:projects' => 'чтение ваших проектов',
                        'write:projects' => 'изменение проектов в вашем аккаунте',
                    ]
                ],
                */

                /* Поддержка Open API 3.0
                'passport' => [ // Уникальное имя схемы безопасности
                    'type' => 'oauth2', // Тип схемы безопасности. Допустимые значения: "basic", "apiKey" или "oauth2".
                    'description' => 'OAuth2 безопасность Laravel passport.',
                    'in' => 'header',
                    'scheme' => 'https',
                    'flows' => [
                        "password" => [
                            "authorizationUrl" => config('app.url') . '/oauth/authorize',
                            "tokenUrl" => config('app.url') . '/oauth/token',
                            "refreshUrl" => config('app.url') . '/token/refresh',
                            "scopes" => []
                        ],
                    ],
                ],
                'sanctum' => [ // Уникальное имя схемы безопасности
                    'type' => 'apiKey', // Допустимые значения: "basic", "apiKey" или "oauth2".
                    'description' => 'Введите токен в формате (Bearer <token>)',
                    'name' => 'Authorization', // Имя заголовка или параметра запроса, который будет использоваться.
                    'in' => 'header', // Местоположение API ключа. Допустимые значения: "query" или "header".
                ],
                */
            ],
            'security' => [
                /*
                 * Примеры схем безопасности
                 */
                [
                    /*
                    'oauth2_security_example' => [
                        'read',
                        'write'
                    ],

                    'passport' => []
                    */
                ],
            ],
        ],

        /*
         * Установите это значение в `true` в режиме разработки, чтобы документация обновлялась при каждом запросе
         * Установите это значение в `false`, чтобы отключить генерацию swagger в производственной среде
         */
        'generate_always' => env('L5_SWAGGER_GENERATE_ALWAYS', false),

        /*
         * Установите это значение в `true`, чтобы сгенерировать копию документации в формате yaml
         */
        'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false),

        /*
         * Измените, чтобы доверять IP-адресу прокси - необходимо для AWS Load Balancer
         * string[]
         */
        'proxy' => false,

        /*
         * Плагин configs позволяет получать внешние конфигурации вместо передачи их в SwaggerUIBundle.
         * Подробнее см. здесь: https://github.com/swagger-api/swagger-ui#configs-plugin
         */
        'additional_config_url' => null,

        /*
         * Примените сортировку к списку операций каждого API. Это может быть 'alpha' (сортировка по путям в алфавитном порядке),
         * 'method' (сортировка по HTTP методу).
         * По умолчанию порядок возвращается сервером без изменений.
         */
        'operations_sort' => env('L5_SWAGGER_OPERATIONS_SORT', null),

        /*
         * Передайте параметр validatorUrl в SwaggerUi инициализацию на стороне JS.
         * Значение null отключает валидацию.
         */
        'validator_url' => null,

        /*
         * Параметры конфигурации Swagger UI
         */
        'ui' => [
            'display' => [
                'dark_mode' => env('L5_SWAGGER_UI_DARK_MODE', false),
                /*
                 * Управляет настройками расширения по умолчанию для операций и тегов. Это может быть:
                 * 'list' (расширяет только теги),
                 * 'full' (расширяет теги и операции),
                 * 'none' (ничего не расширяет).
                 */
                'doc_expansion' => env('L5_SWAGGER_UI_DOC_EXPANSION', 'none'),

                /**
                 * Если установлено, включает фильтрацию. В верхней панели появится поле для редактирования, которое
                 * вы можете использовать для фильтрации отображаемых операций по тегам. Может быть
                 * Boolean для включения или отключения, или строка, в этом случае фильтрация
                 * будет включена с использованием этой строки в качестве выражения фильтра. Фильтрация
                 * чувствительна к регистру и сопоставляется с выражением фильтра в любом месте
                 * внутри тега.
                 */
                'filter' => env('L5_SWAGGER_UI_FILTERS', true), // true | false
            ],

            'authorization' => [
                /*
                 * Если установлено в true, данные авторизации сохраняются и не теряются при закрытии/обновлении браузера
                 */
                'persist_authorization' => env('L5_SWAGGER_UI_PERSIST_AUTHORIZATION', false),

                'oauth2' => [
                    /*
                     * Если установлено в true, добавляет PKCE к потоку AuthorizationCodeGrant
                     */
                    'use_pkce_with_authorization_code_grant' => false,
                ],
            ],
        ],

        /*
         * Константы, которые можно использовать в аннотациях
         */
        'constants' => [
            'L5_SWAGGER_CONST_HOST' => env('L5_SWAGGER_CONST_HOST', 'http://my-default-host.com'),
        ],
    ],
];

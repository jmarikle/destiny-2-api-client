<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    */

    'api_key' => env('BUNGIE_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Client ID
    |--------------------------------------------------------------------------
    */

    'client_id' => env('BUNGIE_OAUTH_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    | OAuth Client Secret
    |--------------------------------------------------------------------------
    */

    'client_secret' => env('BUNGIE_OAUTH_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Manifest Caching
    |--------------------------------------------------------------------------
    */

    'cache' => [

        /*
        |--------------------------------------------------------------------------
        | Enabled
        |--------------------------------------------------------------------------
        */

        'enabled' => true,

        /*
        |--------------------------------------------------------------------------
        | Cache driver type
        | Available drivers: filesystem, sqlite
        |--------------------------------------------------------------------------
        */

        // 'driver' => 'filesystem',
        'driver' => 'sqlite',

        /*
        |--------------------------------------------------------------------------
        | Lifetime (seconds)
        |--------------------------------------------------------------------------
        */

        'lifetime' => 604800,

        /*
        |--------------------------------------------------------------------------
        | Path
        |--------------------------------------------------------------------------
        */

        // 'path' => storage_path('destiny2manifest'),
        'path' => database_path('destiny2manifest.sqlite'),

        /*
        |--------------------------------------------------------------------------
        | Language
        | Available languages: en, fr, es, es-mx, de, it, jp, pt-br, ru, pl, ko,
        |                      zh-cht, zh-chs
        |--------------------------------------------------------------------------
        */

        'language' => 'en'
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    */

    'middleware' => [

        /*
        |--------------------------------------------------------------------------
        | Injects manifest definitions into API responses. Requires a valid cache.
        |--------------------------------------------------------------------------
        */

        \AdamDBurton\Destiny2ApiClient\Middleware\InjectDefinitions::class
    ]
];
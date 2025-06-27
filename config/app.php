<?php

return [
    /*
    |----------------------------------------------------------------------
    | Application Name
    |----------------------------------------------------------------------
    */
    'name' => env('APP_NAME', 'Laravel'),

    /*
    |----------------------------------------------------------------------
    | Application Environment
    |----------------------------------------------------------------------
    */
    'env' => env('APP_ENV', 'production'),

    /*
    |----------------------------------------------------------------------
    | Application Debug Mode
    |----------------------------------------------------------------------
    */
    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |----------------------------------------------------------------------
    | Application URL
    |----------------------------------------------------------------------
    */
    'url' => env('APP_URL', 'http://localhost'),

    /*
    |----------------------------------------------------------------------
    | Application Timezone
    |----------------------------------------------------------------------
    */
    'timezone' => 'UTC',

    /*
    |----------------------------------------------------------------------
    | Application Locale Configuration
    |----------------------------------------------------------------------
    */
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |----------------------------------------------------------------------
    | Encryption Key
    |----------------------------------------------------------------------
    */
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |----------------------------------------------------------------------
    | Maintenance Mode Driver
    |----------------------------------------------------------------------
    */
    'maintenance' => [
        'driver' => 'file',
    ],

    /*
    |----------------------------------------------------------------------
    | Service Providers
    |----------------------------------------------------------------------
    */
    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Barryvdh\DomPDF\ServiceProvider::class, // DomPDF package

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ],

    /*
    |----------------------------------------------------------------------
    | Aliases
    |----------------------------------------------------------------------
    */
    'aliases' => [
        'Session' => Illuminate\Support\Facades\Session::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
    ],
];

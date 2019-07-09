<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Data
    |--------------------------------------------------------------------------
    |
    | Here you can change the table name and the class components.
    |
    */
    'data' => [
        'config' => [
            'table'      => 'amethyst_configs',
            'comment'    => 'Persist laravel configs into the database',
            'model'      => Amethyst\Models\Config::class,
            'schema'     => Amethyst\Schemas\ConfigSchema::class,
            'repository' => Amethyst\Repositories\ConfigRepository::class,
            'serializer' => Amethyst\Serializers\ConfigSerializer::class,
            'validator'  => Amethyst\Validators\ConfigValidator::class,
            'authorizer' => Amethyst\Authorizers\ConfigAuthorizer::class,
            'faker'      => Amethyst\Fakers\ConfigFaker::class,
            'manager'    => Amethyst\Managers\ConfigManager::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Http configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the routes
    |
    */
    'http' => [
        'admin' => [
            'config' => [
                'enabled'    => true,
                'controller' => Amethyst\Http\Controllers\Admin\ConfigsController::class,
                'router'     => [
                    'as'     => 'config.',
                    'prefix' => '/configs',
                ],
            ],
        ],
        'app' => [
            'config' => [
                'enabled'    => true,
                'controller' => Amethyst\Http\Controllers\App\ConfigsController::class,
                'router'     => [
                    'as'     => 'config.',
                    'prefix' => '/configs',
                ],
            ],
        ],
    ],
];

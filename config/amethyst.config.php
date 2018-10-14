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
            'model'      => Railken\Amethyst\Models\Config::class,
            'schema'     => Railken\Amethyst\Schemas\ConfigSchema::class,
            'repository' => Railken\Amethyst\Repositories\ConfigRepository::class,
            'serializer' => Railken\Amethyst\Serializers\ConfigSerializer::class,
            'validator'  => Railken\Amethyst\Validators\ConfigValidator::class,
            'authorizer' => Railken\Amethyst\Authorizers\ConfigAuthorizer::class,
            'faker'      => Railken\Amethyst\Fakers\ConfigFaker::class,
            'manager'    => Railken\Amethyst\Managers\ConfigManager::class,
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
                'enabled'     => true,
                'controller'  => Railken\Amethyst\Http\Controllers\Admin\ConfigsController::class,
                'router'      => [
                    'as'        => 'config.',
                    'prefix'    => '/configs',
                ],
            ],
        ],
        'app' => [
            'config' => [
                'enabled'     => true,
                'controller'  => Railken\Amethyst\Http\Controllers\App\ConfigsController::class,
                'router'      => [
                    'as'        => 'config.',
                    'prefix'    => '/configs',
                ],
            ],
        ],
    ],
];

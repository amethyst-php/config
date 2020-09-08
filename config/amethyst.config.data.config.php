<?php

return [
    'table'      => 'config',
    'comment'    => 'Persist laravel configs into the database',
    'model'      => Amethyst\Models\Config::class,
    'schema'     => Amethyst\Schemas\ConfigSchema::class,
    'repository' => Amethyst\Repositories\ConfigRepository::class,
    'serializer' => Amethyst\Serializers\ConfigSerializer::class,
    'validator'  => Amethyst\Validators\ConfigValidator::class,
    'authorizer' => Amethyst\Authorizers\ConfigAuthorizer::class,
    'faker'      => Amethyst\Fakers\ConfigFaker::class,
    'manager'    => Amethyst\Managers\ConfigManager::class,
];

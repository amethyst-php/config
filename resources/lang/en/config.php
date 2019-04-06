<?php

return [
    'name' => 'Config',
    'description' => 'Configs are a pair of key and value used to customize your application',
    'attributes' => [
        'key' => [
            'label' => 'Key',
            'description' => 'A unique name to reference the key. E.g. application.url'
        ],
        'value' => [
            'label' => 'Value',
            'description' => 'The value you wish to customize'
        ],
        'visibility' => [
            'label' => 'Visibility',
            'description' => 'Indicate wheter or not this config should be visible in public. If public this key will be accessible through API and anyone will be able to see it. If private the value will be available only within the system'
        ]
    ]
];
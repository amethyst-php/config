<?php

return [
    'name' => 'Config',
    'description' => 'I config sono coppie di chiavi e valori usati per customizzare la tua applicazione',
    'attributes' => [
        'key' => [
            'label' => 'Chiave',
            'description' => 'A unique name to reference the key. E.g. application.url'
        ],
        'value' => [
            'label' => 'Valore',
            'description' => 'The value you wish to customize'
        ],
        'visibility' => [
            'label' => 'Visibilità',
            'description' => 'Indicate wheter or not this config should be visible in public. If public this key will be accessible through API and anyone will be able to see it. If private the value will be available only within the system'
        ]
    ]
];
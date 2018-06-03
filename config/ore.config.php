<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Table
    |--------------------------------------------------------------------------
    |
    | This is the table used to save configs to the database
    |
    */
    'table' => 'ore_configs',

    'editable' => [
        'mail_host' => 'mail.host', 
        'mail_port' => 'mail.port', 
        'mail_username' => 'mail.username', 
        'mail_password' => 'mail.password', 
        'mail_encryption' => 'mail.encryption', 
        'mail_from_name' => 'mail.from.name', 
        'mail_from_address' => 'mail.from.address', 
    ]
];

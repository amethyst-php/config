# lara-ore-config

[![Build Status](https://travis-ci.org/railken/lara-ore-config.svg?branch=master)](https://travis-ci.org/railken/lara-ore-config)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A laravel package save configs using the database

# Requirements

PHP 7.0.0 and later.


## Installation

You can install it via [Composer](https://getcomposer.org/) by typing the following command:

```bash
composer require railken/lara-ore-config
```

The package will automatically register itself.

You can publish the migration with:

```bash
php artisan vendor:publish --provider="Railken\LaraOre\ConfigServiceProvider" --tag="migrations"
```

After the migration has been published you can create the migration-table by running the migrations:

```bash
php artisan migrate
```
You can publish the config-file with:

```bash
php artisan vendor:publish --provider="Railken\LaraOre\ConfigServiceProvide" --tag="config"
```

## Configuration
```php

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
];
```

## Simple Usage

```php
use Railken\LaraOre\Config\ConfigManager;
use Illuminate\Support\Facades\Storage;

$dm = new ConfigManager();

// Create a new config
$result = $dm->create([
    'key' => 'my.config',
    'value' => 'uhm'
]);

// Retrieve resource 
$resource = $result->getResource(); // Instance of Railken\LaraOre\Config\Config

```

## Retrieving a config
```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$resource = $dm->getRepository()->findOneById(1);
```

## Retrieving all configs
```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$resource = $dm->getRepository()->findAll();

```

## Getting an instance of \Illuminate\DataBase\Eloquent\Builder
```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$query = $dm->getRepository()->newQuery();

$resource = $query->where('key', 'my.config')->first();

```

## Creating a config
```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$result = $dm->create([
    'key' => 'my.config',
    'value' => 'uhm'
]);

```

## Updating a config
```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$resource = $dm->getRepository()->findOneById(1);

$result = $dm->update($resource, [
    'value' => 'uhm2',
]);

```

## Removing a config
```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$resource = $dm->getRepository()->findOneById(1);

$result = $dm->remove($resource);

```

## Checking the results

```php
use Railken\LaraOre\Config\ConfigManager;

$dm = new ConfigManager();

$result = $dm->create([
    'key' => 'my.config',
    'value' => 'uhm'
]);

if ($result->ok()) {

    $resource = $result->getResource();

} else {

    // Loop through all errors
    $result->getErrors()->map(function($error) {
        return $error->toArray();
    }))

    // Retrieve an array of all errors
    $result->getSimpleErrors();

    /* The result is something like this:

        [0] => Array
            (
                [code] => CONFIG_KEY_NOT_DEFINED
                [label] => key
                [message] => The key is required
                [value] =>
            )
    */

}
```


## Attributes

| Name       | Required | Unique | Default | Validation                      | Description |
|------------|----------|--------|---------|---------------------------------|-------------|
| id         | /        | /      |         | /                               | /           |
| key        | yes      | yes    | /       | string                          |             |
| value      | yes      | no     | /       | mixed                           |             |
| created_at | /        | /      | /       |                                 |             |
| updated_at | /        | /      | /       |                                 |             |


## Errors

| Code                          | Message                                      |
|-------------------------------|----------------------------------------------|
| CONFIG_KEY_NOT_DEFINED        | This attribute is required                   |
| CONFIG_KEY_NOT_VALID          | This attribute is not valid                  |
| CONFIG_KEY_NOT_UNIQUE         | This attribute is already taken              |
| CONFIG_KEY_NOT_AUTHORIZED     | You're not authorized to edit this attribute |
| CONFIG_VALUE_NOT_DEFINED      | This attribute is required                   |
| CONFIG_VALUE_NOT_VALID        | This attribute is not valid                  |
| CONFIG_VALUE_NOT_AUTHORIZED   | You're not authorized to edit this attribute |

## Permissions

| Permission                        | Description |
|-----------------------------------|-------------|
| config.create                     |             |
| config.update                     |             |
| config.show                       |             |
| config.remove                     |             |
| config.attributes.id.show         |             |
| config.attributes.key.show        |             |
| config.attributes.key.fill        |             |
| config.attributes.value.show      |             |
| config.attributes.value.fill      |             |
| config.attributes.created_at.show |             |
| config.attributes.updated_at.show |             |
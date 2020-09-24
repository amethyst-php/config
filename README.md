# Config

[![Action Status](https://github.com/amethyst-php/config/workflows/test/badge.svg)](https://github.com/amethyst-php/config/actions)
[![Amethyst](https://img.shields.io/badge/package-Amethyst-7e57c2)](https://github.com/amethyst-php/amethyst)

Customize Laravel configuration using the database. 

# Requirements

- PHP from 7.2 to 7.4
- Laravel from 5.8 to 8.x

## Installation

You can install it via [Composer](https://getcomposer.org/) by typing the following command:

```bash
composer require amethyst/config
```

The package will automatically register itself.

## Usage

A simple usage looks like this

```php
app('amethyst')->get('config')->createOrFail([
    'key' => 'app.name',
    'value' => 'My Application'
]);
```

There are only 2 attributes (`key` and `value`) and the validation is pretty basic.
When the ServiceProvider is booted or when a new record is saved, all records will be merged with the current configuration. This means you can override the current laravel configuration or create your own.
The attribute `key` works with dot notation too, so key can be also for e.g. `app.name`.

Keep in mind that this is an [Amethyst Package](https://github.com/amethyst-php/amethyst), if you wish to see the full list of available features and customization please check [core](https://github.com/amethyst-php/core)

## Api

There are no additional routes in this package, only the default provided by the [core](https://github.com/amethyst-php/core).

## Testing

- Clone this repository
- Copy the default `phpunit.xml.dist` to `phpunit.xml`
- Change the environment variables as you see fit
- Launch `./vendor/bin/phpunit`

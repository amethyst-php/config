## Create

Define a new instance of the manager

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();
```

Create a new entity

```php
$result = $manager->create([
    "key" => "mail.host",
    "value" => "e9u>Z39DpeBn%r`aH'",
    "visibility" => "public"
]);
```

Throw an exception if the operation fails

```php
$result = $manager->createOrFail([
    "key" => "mail.host",
    "value" => "e9u>Z39DpeBn%r`aH'",
    "visibility" => "public"
]);
```

Retrieve the resource created

```php
$resource = $result->getResource();
```

Links:
* [Attributes](attributes.md)
* [Errors](errors.md)
* [Handle the result](result.md)

---
[Back](index.md)
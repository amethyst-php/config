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
    "value" => "bxz?}n",
    "visibility" => "public"
]);
```

Check the result of the operation

```php
if ($result->ok()) {
	// All ok
} else {
	// Something goes wrong
}
```

Retrieve the resource created

```php
$resource = $result->getResource();
```

Throw an exception immediately if the operation fails

```php

use Railken\Laravel\Manager\Exceptions\Exception;

try {
	$result = $manager->createOrFail([
    "key" => "mail.host",
    "value" => "bxz?}n",
    "visibility" => "public"
]);
} catch (Exception $e) {
	// ...
}
```


Links:
* [Attributes](attributes.md)
* [Errors](errors.md)
* [Handle the result](result.md)

---
[Back](index.md)
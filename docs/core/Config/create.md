## Create

Define a new instance of the [Manager](manager.md)

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();
```

Create a new [entity](model.md)

```php
$result = $manager->create([
    "key" => "mail.host",
    "value" => "`TXb9O0<t)EsR4K8@=>@",
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

Retrieve an [entity](model.md) using the [repository](repository.md)


```php
$entity = $result->getResource();
```

Throw an exception immediately if the operation fails

```php

use Railken\Laravel\Manager\Exceptions\Exception;

try {
    $result = $manager->createOrFail([
    "key" => "mail.host",
    "value" => "`TXb9O0<t)EsR4K8@=>@",
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
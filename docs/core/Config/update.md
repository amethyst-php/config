## Update 

Define a new instance of the manager

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();
```

Retrieve a resource using the repository

```php
$resource = $manager->getRepository()->findOneById(1);
```

Update an existent resource

```php
$result = $manager->update([
    "key" => "mail.host",
    "value" => "bxz?}n",
    "visibility" => "public"
]);
```

* [Attributes](attributes.md)
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)
## Serializer

[View source](https://github.com/railken/lara-ore-config/blob/master/src/Config/ConfigSerializer.php))

The serializer is used to serialize an entity, you can retrieve it from the manager.

```php
use Railken\LaraOre\Core\Config\ConfigManager;

$manager = new ConfigManager();

$serializer = $manager->getSerializer();

```

And use it so serialize an entity
Retrieving an entity

```php
$entity = $repository->findOneById(1);
$serializer->serialize($entity)->toArray(); // Returns an array

```

If you wish to update the serializer, use the config file.
---
[Back](index.md)
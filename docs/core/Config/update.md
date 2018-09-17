## Update 

Define a new instance of the [Manager](https://github.com/railken/lara-ore-config/blob/master/src/Config/ConfigManager.php)

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();
```

Retrieve an [entity](https://github.com/railken/lara-ore-config/blob/master/src/Config/Config.php) using the [repository](https://github.com/railken/lara-ore-config/blob/master/src/Config/ConfigRepository.php))


```php
$entity = $manager->getRepository()->findOneById(1);
```

Update an existent [resource](https://github.com/railken/lara-ore-config/blob/master/src/Config/Config.php))

```php
$result = $manager->update([
    "key" => "mail.host",
    "value" => "`TXb9O0<t)EsR4K8@=>@",
    "visibility" => "public"
]);
```

* [Attributes](attributes.md)
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)
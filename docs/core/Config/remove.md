## Remove 

Define a new instance of the [Manager](https://github.com/railken/lara-ore-config/blob/master/src/Config/ConfigManager.php))

```php
use Railken\LaraOre\Core\Config\ConfigManager;

$manager = new ConfigManager();
```

```php
$entity = $manager->getRepository()->findOneById(1);

$result = $manager->remove($entity);
```

Links:
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)
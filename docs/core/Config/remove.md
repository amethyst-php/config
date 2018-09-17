## Remove 

Sample code

```php

use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$resource = $manager->getRepository()->findOneById(1);

$result = $manager->remove($resource);
```

Links:
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)
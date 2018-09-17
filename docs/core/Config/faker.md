## Faker

[View source](https://github.com/railken/lara-ore-config/blob/master/src/Config/ConfigFaker.php))

The faker can be used for testing or seeding.

Create a new entity using the faker

```php

use Railken\LaraOre\Config\ConfigFaker;

$result = $manager->create(ConfigFaker::make()->parameters());
```

---
[Back](index.md)
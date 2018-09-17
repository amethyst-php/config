### Remove

```php

use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$resource = $manager->getRepository()->findOneById(1);

$result = $manager->remove($resource);
```
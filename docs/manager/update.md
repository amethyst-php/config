# Update Config

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$config = $manager->getRepository()->findOneById(1);

$result = $manager->update($config, [
    "value" => "1",
]);


```
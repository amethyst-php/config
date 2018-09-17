### Create


```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$result = $manager->create([
    "key" => "mail.host",
    "value" => "d<8sLG8B",
    "visibility" => "public"
]
);
```
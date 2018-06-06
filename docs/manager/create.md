# Create Config

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$result = $manager->create([
    "key" => "MAIL_HOST",
    "value" => "localhost"
]);

```
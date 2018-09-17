### Update

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$address = $dm->getRepository()->findOneById(1);

$result = $dm->update([
    "key" => "mail.host",
    "value" => "d<8sLG8B",
    "visibility" => "public"
]
);


```
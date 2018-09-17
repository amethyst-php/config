## Update

```php
use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$address = $dm->getRepository()->findOneById(1);

$result = $dm->update([
    "key" => "mail.host",
    "value" => "&TX\\A/.&u",
    "visibility" => "public"
]
);


```

---
[Back](index.md)
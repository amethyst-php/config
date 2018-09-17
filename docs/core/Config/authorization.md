## Permissions

If you want to handle permissions using directly the manager simply send the user as a new instance is created.

```php

use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager($user);

```

Now, when performing actions, the $result may contains permissions errors such as *_NOT_AUTHORIZED*

---
[Back](index.md)
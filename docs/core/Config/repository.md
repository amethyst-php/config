## Repository

[View source](https://github.com/railken/lara-ore-config/blob/master/src/Config/ConfigRepository.php)

The repository is the class to perform queries.

```php
use Railken\LaraOre\Core\Config\ConfigManager;

$manager = new ConfigManager();

$repository = $manager->getRepository();

```

Retrieving an entity

```php
$repository->findOneBy(['id' => 1]);
$repository->findOneById(1);

```

Retrieving all entities

```php
$repository->findAll();
```

Performing a query using \Illuminate\DataBase\Eloquent\Builder

```php
$repository->newQuery()->where('id', 1)->first();

```

---
[Back](index.md)
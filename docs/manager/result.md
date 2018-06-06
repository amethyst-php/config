# Result

Once you've got the result you should always check if an error has occurred, if not, retrieve the resource.

```php

use Railken\LaraOre\Config\ConfigManager;

$manager = new ConfigManager();

$result = $manager->create([
    "value" => "localhost"
]);

if ($result->ok()) {

    $resource = $result->getResource();

} else {

    // Loop through all errors
    $result->getErrors()->map(function($error) {
        return $error->toArray();
    }))

    // Retrieve an array of all errors
    $result->getSimpleErrors();

    /* The result is something like this:

        [0] => Array
            (
                [code] => CONFIG_KEY_NOT_DEFINED
                [label] => key
                [message] => The key is required
                [value] =>
            )
    */

}
```
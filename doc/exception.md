# Exception Reference

Konzolo defines its own exceptions, but they all:

* implement the `Gnugat\Konzolo\Exception\Exception` interface
* extend the `\Exception` class

This means that instead of catching a specific exception, you can globally catch
a Konzolo exception, or even a standard exception:

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Gnugat\Konzolo\Input;
use Gnugat\Konzolo\Exception\Exception;

$input = new Input('hello:world');
try {
    $input->getArgument('undefined');
} catch (\Exception $e) {
    echo $e->getMessage();
}
try {
    $input->getArgument('undefined');
} catch (Exception $e) {
    // caught!
}
```

Here's the list of exceptions that can be thrown:

* [UndefinedArgumentException](#undefinedargumentexception)
* [UnknownCommandException](#unknowncommandexception)

Here's the list of exception types:

* [InvalidArgumentException](#invalidargumentexception)

## UndefinedArgumentException

Thrown when an input cannot find an argument:

```php
<?php

namespace Gnugat\Konzolo\Exception;

class UndefinedArgumentException extends InvalidArgumentException
{
    public function getName();
    public function getArguments();
}
```

The exception *leaks* through the following methods:

* `Input#getArgument()`
* `Command#execute()`
* `Application#run()`

## UnknownCommandException

Thrown when an application cannot find a command:

```php
<?php

namespace Gnugat\Konzolo\Exception;

class UnknownCommandException extends InvalidArgumentException
{
    public function getInput();
    public function getCommands();
}
```

The exception *leaks* through the following methods:

* `Application#run()`

## InvalidArgumentException

Allows developers to catch either a standard InvalidArgumentException or a Konzolo one.

```php
<?php

namespace Gnugat\Konzolo\Exception;

class InvalidArgumentException extends \InvalidArgumentException implements Exception
{
}
```

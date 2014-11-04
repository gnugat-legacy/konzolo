# Konzolo

A lightweight Console library, for PHP.

## Installation

Use [Composer](http://getcomposer.org) to install Konzolo:

    composer require gnugat/konzolo:~1.0.0

## Example

Create a command:

```php
<?php

namespace Acme\Demo\Command;

use Gnugat\Konzolo\Command;
use Gnugat\Konzolo\Input;

class HelloWorldCommand implements Command
{
    /**
     * {@inheritDoc}
     */
    public function execute(Input $input)
    {
        $name = $input->getArgument('name');

        return Command::EXIT_SUCCESS;
    }
}
```

Create an application:

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Acme\Demo\Command\HelloWorldCommand;
use Gnugat\Konzolo\Application;

$input = new Input('hello:world');
$input->setArgument('name', $argv[1]);

$app = new Application();
$app->addCommand('hello:world', new HelloWorldCommand());
$exitCode = $app->run($input)

exit($exitCode);
```

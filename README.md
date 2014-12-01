# Konzolo

A lightweight Console library, for PHP.

It can be used to build minimalistic CLI applications, or to implement the
Command design pattern.

## Installation

Use [Composer](http://getcomposer.org) to install Konzolo:

    composer require gnugat/konzolo:~1.1

## Example

Create a command:

```php
<?php

namespace Acme\Demo\Command;

use Gnugat\Konzolo\Command;
use Gnugat\Konzolo\Input;

class HelloWorldCommand implements Command
{
    public function execute(Input $input)
    {
        $name = $input->getArgument('name');
        echo "Hello $name\n";

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
use Gnugat\Konzolo\Input;

$input = new Input('hello:world');
$input->setArgument('name', $argv[1]);

$app = new Application();
$app->addCommand('hello:world', new HelloWorldCommand());
$exitCode = $app->run($input)

exit($exitCode);
```

## Further documentation

You can see the current and past versions using one of the following:

* the `git tag` command
* the [releases page on Github](https://github.com/gnugat/konzolo/releases)
* the file listing the [changes between versions](CHANGELOG.md)

You can find more documentation at the following links:

* [doc/exceptions.md](Exception reference)
* [doc/input_validation.md](Input validation)

* [copyright and MIT license](LICENSE)
* [versioning and branching models](VERSIONING.md)
* [contribution instructions](CONTRIBUTING.md)

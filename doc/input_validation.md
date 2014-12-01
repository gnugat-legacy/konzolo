# Input validation

Never trust user input. This documentation provides some guideline on how to
validate the given input.

## Creating a constraint

Let's say we want to check if the input contains an argument name `line_number`,
which must be positive number. In order to do so we need to define a constraint:

```php
<?php

namespace Acme\Demo\Validation;

use Gnugat\Konsolo\Exception\InvalidInputException;
use Gnugat\Konsolo\Input;
use Gnugat\Konsolo\Validation\InputConstraint;

class PositiveIntegerConstraint implements InputConstraint
{
    public function throwIfInvalid(Input $input)
    {
        if (!$input->hasArgument('line_number')) {
            throw new InvalidInputException($input, 'Missing required "line_number" argument');
        }
        $lineNumber = $input->getArgument($lineNumber);
        if (!is_int($lineNumber) || $lineNumber < 0) {
            throw new InvalidInputException($input, 'Argument "line_number" must be a positive number');
        }
    }
}
```

## Registering the constraint in a validator

You can bundle together a collection of constraints using the validator:

```php
<?php
// File: console.php

use Acme\Demo\Validation\PositiveIntegerConstraint;
use Gnugat\Konsolo\Validation\InputValidator;

require __DIR__.'/vendor/autoload.php';

$lineValidator = new InputValidator();
$lineValidator->addConstraint(new PositiveIntegerConstraint());
```

## Validating from a command

In order to actually validate the input from a command, it needs to depend on a
validator or a constraint:

```php
<?php

namespace Acme\Demo\Command;

use Gnugat\Konsolo\Command;
use Gnugat\Konsolo\Input;
use Gnugat\Konsolo\Validation\InputValidator;

class InsertLineCommand implements Command
{
    private $validator;

    public function __construct(InputValidator $validator)
    {
        $this->validator = $validator;
    }

    public function execute(Input $input)
    {
        $this->validator->throwIfInvalid($input);
    }
}
```

You can then inject the validator or constraint in the command:

```php
<?php
// File: console.php

// ...

use Acme\Demo\Command\InsertLineCommand;
use Gnugat\Konsolo\Application;
use Gnugat\Konsolo\Input;

$insertLineCommand = new InsertLineCommand($lineValidator);

$application = new Application();
$application->addCommand($insertLineCommand);

$input = new Input('acme:insert_line');
$application->run($input); // will throw InvalidInputException, because "line_number" argument is missing.
```

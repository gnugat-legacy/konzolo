<?php

/*
 * This file is part of the Konzolo project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Konzolo\Validation;

use Gnugat\Konzolo\Exception\InvalidInputException;
use Gnugat\Konzolo\Validation\InputConstraint;
use Gnugat\Konzolo\Input;
use PhpSpec\ObjectBehavior;

class InputValidatorSpec extends ObjectBehavior
{
    const HIGH_PRIORITY = 1337;
    const MIDDLE_PRIORITY = 42;
    const LOW_PRIORITY = 23;

    const MESSAGE = 'Invalid input';

    function it_calls_input_constraints(InputConstraint $inputConstraint, Input $input)
    {
        $this->addConstraint($inputConstraint);

        $inputConstraint->throwIfInvalid($input)->shouldBeCalled();

        $this->throwIfInvalid($input);
    }

    function it_handles_priorities(
        InputConstraint $highPriority,
        InputConstraint $middlePriority,
        InputConstraint $lowPriority,
        Input $input
    )
    {
        $this->addConstraint($lowPriority, self::LOW_PRIORITY);
        $this->addConstraint($highPriority, self::HIGH_PRIORITY);
        $this->addConstraint($middlePriority, self::MIDDLE_PRIORITY);

        $invalidInputException = new InvalidInputException($input->getWrappedObject(), self::MESSAGE);

        $highPriority->throwIfInvalid($input)->shouldBeCalled();
        $middlePriority->throwIfInvalid($input)->willThrow($invalidInputException);
        $lowPriority->throwIfInvalid($input)->shouldNotBeCalled();

        $this->shouldThrow($invalidInputException)->duringThrowIfInvalid($input);
    }
}
